<?php

namespace App\Exceptions;

use Exception;

class NotFoundVersionException extends Exception
{
    /**
     * The path the user should be redirected to.
     *
     * @var string
     */
    protected $redirectTo;

    /**
     * Create a new authentication exception.
     *
     * @param  string      $version
     * @param  string|null $redirectTo
     */
    public function __construct(string $version, $redirectTo = null)
    {
        parent::__construct("'{$version}'은 선택될 수 없는 버전입니다.");

        $this->redirectTo = $redirectTo;
    }

    /**
     * Get the path the user should be redirected to.
     *
     * @return string
     */
    public function redirectTo()
    {
        return $this->redirectTo;
    }
}
