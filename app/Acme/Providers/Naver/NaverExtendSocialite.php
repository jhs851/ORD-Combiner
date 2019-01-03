<?php

namespace App\Acme\Providers\Naver;

use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Naver\NaverExtendSocialite as BaseExtendSocialite;

class NaverExtendSocialite extends BaseExtendSocialite
{
    /**
     * Register the provider.
     *
     * @param \SocialiteProviders\Manager\SocialiteWasCalled $socialiteWasCalled
     */
    public function handle(SocialiteWasCalled $socialiteWasCalled)
    {
        $socialiteWasCalled->extendSocialite('naver', NaverProvider::class);
    }
}
