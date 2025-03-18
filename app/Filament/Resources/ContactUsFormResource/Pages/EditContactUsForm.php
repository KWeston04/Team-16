<?php

namespace App\Filament\Resources\ContactUsFormResource\Pages;

use App\Filament\Resources\ContactUsFormResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContactUsForm extends EditRecord
{
    protected static string $resource = ContactUsFormResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
