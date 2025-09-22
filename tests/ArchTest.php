<?php

declare(strict_types=1);

it('will not use debugging functions')
    ->expect(['dd', 'dump', 'ray', 'var_dump', 'ddd'])
    ->each->not->toBeUsed();

test('strict types are used')
    ->expect('Parfaitementweb\FilamentPasswordInput')
    ->toUseStrictTypes();

test('strict types are used in tests')
    ->expect('Parfaitementweb\FilamentPasswordInput\Tests')
    ->toUseStrictTypes();

test('only traits are put in the Concerns directory')
    ->expect('Parfaitementweb\FilamentPasswordInput\Concerns')
    ->toBeTraits();

test('actions are configured correctly')
    ->expect('Parfaitementweb\FilamentPasswordInput\Actions')
    ->toBeClasses()
    ->toHaveSuffix('Action');
