<?php

namespace App\Exceptions;

use Exception;

class UnableDeleteAdmin extends Exception
{
    /**
     * Create a new authentication exception.
     *
     * @param string $message
     * @param int    $code
     */
    public function __construct(string $message = '관리자는 삭제할 수 없습니다.', int $code = 403)
    {
        parent::__construct($message, $code);
    }
}
