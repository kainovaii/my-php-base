<?php

declare(strict_types=1);

namespace application\core\form;

final class Field
{
    public const INPUT_TEXT = 'text';
    public const INPUT_EMAIL = 'email';
    public const INPUT_PASSWORD = 'password';

    private const INPUT = '<div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-%s">%s</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="%s" name="%s" id="basic-default-%s" autofocus required class="form-control" placeholder="%s" aria-label="%s" aria-describedby="basic-default-%s2">
                                        <span class="input-group-text" id="basic-default-%s2">%s</span>
                                    </div>
                                    <div class="form-text">%s</div>
                                </div>
                            </div>';

    private const TEXTAREA = '<div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-%s">%s</label>
                                    <div class="col-sm-10">
                                        <textarea id="basic-default-%s" name="%s" required class="form-control" placeholder="%s" aria-label="%s" aria-describedby="%s"></textarea>
                                    </div>
                                </div>';

    public function __construct(private string $attribute, private string $type = "", private bool $is_input_field = true)
    {
    }

    private function label_params(): array
    {
        return [$this->attribute, $this->attribute];
    }

    private function input_params(): array
    {
        return ($this->is_input_field ?
            [$this->type, $this->type, $this->attribute] :
            [$this->attribute, $this->attribute]);
    }

    private function placeholder(): array
    {
        return [$this->attribute];
    }

    private function aria_params(): array
    {
        return [$this->attribute, $this->attribute];
    }

    private function span_params(): array
    {
        return [$this->attribute, $this->type];
    }

    private function text(): array
    {
        return [""];
    }

    private function input_parameters(): array
    {
        $label = $this->label_params();
        $input = $this->input_params();

        $placeholder = $this->placeholder();

        $aria = $this->aria_params();
        $span = $this->span_params();

        $text = $this->text();

        return array_merge($label, $input, $placeholder, $aria, $span, $text);
    }

    private function textarea_parameters(): array
    {
        $label = $this->label_params();
        $input = $this->input_params();

        $placeholder = $this->placeholder();

        $aria = $this->aria_params();

        return array_merge($label, $input, $placeholder, $aria);
    }

    private function field(): string
    {
        return $this->is_input_field ?
            sprintf(self::INPUT, ...($this->input_parameters())) :
            sprintf(self::TEXTAREA, ...($this->textarea_parameters()));
    }

    public function __toString(): string
    {
        return $this->field();
    }
}
