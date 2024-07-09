<?php

declare(strict_types = 1);

namespace application\core\http\exceptions;

use application\core\exceptions\HTTPException;

final class NotImplementedException extends HTTPException 
{
    protected $code = 501;
    protected $message = 'Oops! 😖 Request method not supported.';
}
