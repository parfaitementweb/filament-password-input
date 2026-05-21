<?php

declare(strict_types=1);

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Livewire\Component;
use Livewire\Livewire;
use Parfaitementweb\FilamentPasswordInput\Password;

it('can be rendered', function () {
    $component = new class extends Component implements HasActions, HasForms
    {
        use InteractsWithActions;
        use InteractsWithForms;

        public function form(Schema $schema): Schema
        {
            return $schema
                ->schema([
                    Password::make('password')
                        ->copyable()
                        ->regeneratePassword(),
                ]);
        }

        public function render(): string
        {
            return <<<'HTML'
            <div>{{ $this->form }}</div>
            HTML;
        }
    };

    Livewire::test($component::class)->assertSuccessful();
});
