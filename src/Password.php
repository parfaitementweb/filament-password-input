<?php

declare(strict_types=1);

namespace Parfaitementweb\FilamentPasswordInput;

use Closure;
use Filament\Forms\Components\TextInput;
use Parfaitementweb\FilamentPasswordInput\Concerns\CanCopyToClipboard;
use Parfaitementweb\FilamentPasswordInput\Concerns\CanRegeneratePassword;

class Password extends TextInput
{
    use CanCopyToClipboard;
    use CanRegeneratePassword;

    protected bool|Closure $hidePasswordManagerIcons = false;

    protected function setUp(): void
    {
        parent::setUp();

        $this->password();

        $this->revealable();
    }

    public function getExtraInputAttributes(): array
    {
        $extraAttributes = parent::getExtraInputAttributes();

        if ($this->shouldHidePasswordManagerIcons()) {
            $extraAttributes['data-1p-ignore'] = '';
            $extraAttributes['data-lpignore'] = 'true';
        }

        return $extraAttributes;
    }

    /**
     * Prevent password managers like 1password or LastPass from injecting buttons
     * into the password field.
     */
    public function hidePasswordManagerIcons(bool|Closure $condition = true): static
    {
        $this->hidePasswordManagerIcons = $condition;

        return $this;
    }

    public function shouldHidePasswordManagerIcons(): bool
    {
        return (bool) $this->evaluate($this->hidePasswordManagerIcons);
    }
}
