<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{Guest, User};
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    /**
     * SocialController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @param Request $request
     * @param string  $provider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function execute(Request $request, string $provider)
    {
        if ($this->hasNotToken($request)) return $this->redirectToProvider($provider);

        return $this->handleProviderCallback($provider);
    }

    /**
     * @param string $provider
     * @return mixed
     */
    protected function redirectToProvider(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    protected function handleProviderCallback(string $provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        $email = $socialUser->getEmail();

        if ($user = User::where('email', $email)->first()) {
            auth()->login($user, true);

            return $this->createdSession();
        }

        return $this->createGuest($email, $socialUser);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function hasNotToken(Request $request) : bool
    {
        return ! $request->has('code')
            && ! $request->has('oauth_token')       // for Twitter
            && ! $request->has('access_token');     // for Facebook
    }

    /**
     * @param string     $email
     * @param            $socialUser
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    protected function createGuest(string $email, $socialUser)
    {
        $avatarId = $socialUser->getAvatar() ? $this->sendAvatarUrl($socialUser) : null;

        $guest = (Guest::where('email', $email)->first()) ?: Guest::create([
            'avatar_id' => $avatarId,
            'name'      => $socialUser->getName() ?: __('auth.users.unknown'),
            'email'     => $email,
        ]);

        return redirect(route('guests.edit', $guest->id));
    }

    /**
     * @param $socialUser
     * @return int
     * @throws \Exception
     */
    protected function sendAvatarUrl($socialUser) : int
    {
        $request = new AvatarsRequest([], [
            'model' => 'Avatar',
            'src'   => $socialUser->getAvatar(),
        ]);

        return $request->createAvatar()->id;
    }
}
