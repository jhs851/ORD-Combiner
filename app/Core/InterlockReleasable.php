<?php

namespace App\Core;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Two\{AbstractProvider, InvalidStateException};
use SocialiteProviders\Manager\OAuth2\User;

trait InterlockReleasable
{
    /**
     * @return User
     * @throws ValidationException|InvalidStateException
     */
    public function user() : User
    {
        if ($this->hasInvalidState()) throw new InvalidStateException();

        $response = $this->getAccessTokenResponse($this->getCode());
        $data = $this->getUserByToken($token = $this->parseAccessToken($response));
        $user = $this->validate($token, $data)->mapUserToObject($data);

        $this->credentialsResponseBody = $response;

        if ($user instanceof User) $user->setAccessTokenResponseBody($this->credentialsResponseBody);

        return $user->setToken($token)
                    ->setRefreshToken($this->parseRefreshToken($response))
                    ->setExpiresIn($this->parseExpiresIn($response));
    }

    /**
     * @param array $user
     * @return bool
     */
    protected function invalid(array $user) : bool
    {
        $invalid = false;

        foreach (static::REQUIRED_FIELD as $key)
            if (! array_key_exists($key, $user))
                $invalid = true;

        return $invalid;
    }

    /**
     * @param string $token
     * @param array  $user
     * @return AbstractProvider
     * @throws ValidationException
     */
    protected function validate(string $token, array $user) : AbstractProvider
    {
        if ($this->invalid($user)) {
            $this->removeAccessTokenResponse($this->getCode(), $token);

            throw new ValidationException(Validator::make([], []));
        }

        return $this;
    }
}
