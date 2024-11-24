<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Hestia\Rules;

use BaseCodeOy\Hestia\Authorization\Authorization;
use Illuminate\Contracts\Validation\ValidationRule;

final class Role implements ValidationRule
{
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (!\in_array($value, \array_keys(Authorization::$roles), true)) {
            $fail(__('The :attribute must be a valid role.'));
        }
    }
}
