<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\{Guest, User};
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use SocialiteProviders\Manager\OAuth2\User as SocialUser;

class SocialController extends Controller
{
    use AuthenticatesUsers;

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
        if ($this->hasNotCode($request)) return $this->redirectToProvider($provider);

        return $this->handleProviderCallback($provider);
    }

    /**
     * @param string $provider
     * @return mixed
     */
    protected function redirectToProvider(string $provider)
    {
        if (! array_key_exists($provider, config('services')))
            return $this->toRespond("{$provider}는 지원하지 않는 소셜 로그인입니다.", route('login'), 'error');

        return Socialite::driver($provider)->redirect();
    }

    /**
     * @param string $provider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    protected function handleProviderCallback(string $provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (ValidationException $exception) {
            return $this->toRespond('저희 서비스에는 이름과 이메일이 반드시 필요합니다. 다시 시도해주세요.', route('login'), 'error');
        }

        if ($user = User::where('email', $socialUser->getEmail())->first()) {
            auth()->login($user, true);

            return $this->sendLoginResponse(request());
        }

        return $this->createGuest($socialUser);
    }

    /**
     * @param Request $request
     * @return bool
     */
    protected function hasNotCode(Request $request) : bool
    {
        return ! $request->has('code');
    }

    /**
     * @param SocialUser $socialUser
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    protected function createGuest(SocialUser $socialUser)
    {
        $email = $socialUser->getEmail();

        $guest = (Guest::where('email', $email)->first()) ?: Guest::create([
            'name'  => $socialUser->getName(),
            'email' => $email,
        ]);

        return redirect(route('guests.edit', $guest->id));
    }
}
