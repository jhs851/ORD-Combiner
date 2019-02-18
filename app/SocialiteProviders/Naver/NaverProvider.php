<?php

namespace App\SocialiteProviders\Naver;

use App\Core\InterlockReleasable;
use SocialiteProviders\Naver\NaverProvider as BaseProvider;

class NaverProvider extends BaseProvider
{
    use InterlockReleasable;

    /**
     * @var array
     */
    const REQUIRED_FIELD = ['email', 'name'];

    /**
     * @param string $code
     * @param string $token
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function removeAccessTokenResponse(string $code, string $token) : void
    {
        $this->getHttpClient()->request('POST', $this->getTokenUrl(), [
            'headers'     => ['Accept' => 'application/json'],
            'form_params' => array_merge(parent::getTokenFields($code), [
                'grant_type'       => 'delete',
                'access_token'     => $token,
                'service_provider' => static::IDENTIFIER,
            ]),
        ]);
    }
}
