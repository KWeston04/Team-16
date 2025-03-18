<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum RequestStatus: string implements HasColor, HasIcon, HasLabel
{
    case New = 'New';
    case Read = 'Read';
    case Responded = 'Responded';
    case Archived = 'Archived';

    public static function casesAsArray(): array
    {
        return array_column(self::cases(), 'name', 'value');
    }

    public static function fromName(string $name): ?self
    {
        return self::tryFrom($name);
    }

    public static function fromValue(string|int|self $value): ?self
    {
        if ($value instanceof self) {
            return $value;
        }

        return self::tryFrom((string) $value);
    }

    public function getLabel(): string
    {
        return $this->value;
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::New => 'info',
            self::Read => 'success',
            self::Responded => 'warning',
            self::Archived => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::New => 'heroicon-m-envelope',
            self::Read => 'heroicon-m-envelope-open',
            self::Responded => 'heroicon-m-paper-airplane',
            self::Archived => 'heroicon-m-archive-box-arrow-down',
        };
    }
}
