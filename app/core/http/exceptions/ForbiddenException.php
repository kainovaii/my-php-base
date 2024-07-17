<?php

declare(strict_types = 1);

namespace application\core\http\exceptions;

use application\core\exceptions\HTTPException;

final class ForbiddenException extends HTTPException 
{
        /**
     * The HTTP status code for this exception.
     *
     * @var int
     */
    protected $code = 403;

    /**
     * The error message for this exception.
     *
     * @var string
     */
    protected $message = 'Oops! 😖 You don\'t have permission to access this page.';
}
