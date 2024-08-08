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
                                        <input type="text" id="basic-default-%s" autofocus required class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-%s2">
                                        <span class="input-group-text" id="basic-default-%s2">@example.com</span>
                                    </div>
                                    <div class="form-text"></div>
                                </div>
                            </div>';
}
