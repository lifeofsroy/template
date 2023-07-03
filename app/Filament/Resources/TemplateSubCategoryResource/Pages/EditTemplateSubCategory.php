<?php

namespace App\Filament\Resources\TemplateSubCategoryResource\Pages;

use App\Filament\Resources\TemplateSubCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTemplateSubCategory extends EditRecord
{
    protected static string $resource = TemplateSubCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
