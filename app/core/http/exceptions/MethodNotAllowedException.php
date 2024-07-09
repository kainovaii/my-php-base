<?php

declare(strict_types = 1);

namespace application\core\http\exceptions;

use application\core\exceptions\HTTPException;

final class MethodNotAllowedException extends HTTPException 
{
    protected $code = 405;
    protected $message = 'Oops! 😖 The request method is not allowed for this specific resource.';
}
