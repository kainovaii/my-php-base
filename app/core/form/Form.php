<?php

declare(strict_types=1);

namespace application\core\form;

class Form
{
    private const HEADER = '<form action="%s" method="post">' . "\n\t\t\t";
    private const METHOD = '<input type="hidden" name="_method" value="%s">' . "\n\t";

    public function __construct(string $method, string $action = "")
    {
        echo sprintf(self::HEADER . self::METHOD, htmlspecialchars($action), $method);
    }

    /**
     * Ends the current form.
     * 
     * @return void
     */
    public function end(): void
    {
        echo '</form>';
    }
}
