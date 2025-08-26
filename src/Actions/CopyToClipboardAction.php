<?php

declare(strict_types=1);

namespace Rawilk\FilamentPasswordInput\Actions;

use Filament\Actions\Action;
use Filament\Schemas\Components\Component;
use Filament\Support\Facades\FilamentIcon;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Js;

class CopyToClipboardAction extends Action
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('filament-password-input::password.actions.copy.tooltip'));

        $this->icon(FilamentIcon::resolve('filament-password-input::copy') ?? Heroicon::OutlinedClipboardDocument);

        $this->color('gray');

        $this->alpineClickHandler(function (Component $component) {
            $copyDuration = Js::from(
                rescue(
                    callback: fn () => $component->getCopyMessageDuration(),
                    rescue: fn () => 2000,
                    report: false,
                )
            );

            $copyMessage = Js::from(
                rescue(
                    callback: fn () => $component->getCopyMessage(),
                    rescue: fn () => __('filament::components/copyable.messages.copied'),
                    report: false,
                )
            );

            return <<<JS
            const text = \$wire.get('{$component->getStatePath()}');
            window.navigator.clipboard.writeText(text);
            \$tooltip({$copyMessage}, { theme: \$store.theme, timeout: {$copyDuration} });
            JS;
        });
    }

    public static function getDefaultName(): ?string
    {
        return 'copyToClipboard';
    }

    public function isHidden(): bool
    {
        $isHidden = parent::isHidden();

        if ($isHidden) {
            return true;
        }

        return $this->getSchemaComponent()->isDisabled() ||
            $this->getSchemaComponent()->isReadOnly();
    }
}
