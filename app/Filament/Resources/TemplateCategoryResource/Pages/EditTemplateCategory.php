<?php

namespace App\Filament\Resources\TemplateCategoryResource\Pages;

use App\Filament\Resources\TemplateCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTemplateCategory extends EditRecord
{
    protected static string $resource = TemplateCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
