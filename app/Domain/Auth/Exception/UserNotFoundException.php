<?php

namespace App\Domain\Auth\Exception;

use App\Core\Exception\HTTPException;

final class UserNotFoundException extends HTTPException
{
    protected $code = 403;

    protected $message = 'Oops! 😖 Account does not exist';
}