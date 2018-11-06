<?php

namespace App\Exceptions;

use Exception;

class AdministrationException extends Exception
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
     * @param  string  $message
     * @param  string|null  $redirectTo
     * @return void
     */
    public function __construct($message = '권한이 없습니다.', $redirectTo = null)
    {
        parent::__construct($message);

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
