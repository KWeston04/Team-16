<?php

namespace App\Filament\Resources\ContactUsFormResource\Pages;

use App\Enums\RequestStatus;
use App\Filament\Resources\ContactUsFormResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;

class ListContactUsForms extends ListRecords
{
    protected static string $resource = ContactUsFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [];

        $tabs[] = Tab::make('All')->icon('heroicon-o-square-3-stack-3d');

        foreach(RequestStatus::cases() as $status) {
            $tabs[$status->getLabel()] = Tab::make($status->getLabel())->icon($status->getIcon())->query(fn ($query) => $query->where('status', $status->value));
        }

        return $tabs;
    }
}
