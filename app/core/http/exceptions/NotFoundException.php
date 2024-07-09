<?php

declare(strict_types = 1);

namespace application\core\http\exceptions;

use application\core\exceptions\HTTPException;

final class NotFoundException extends HTTPException 
{
    protected $code = 404;
    protected $message = 'Oops! 😖 The requested URL was not found on this server.';
}
