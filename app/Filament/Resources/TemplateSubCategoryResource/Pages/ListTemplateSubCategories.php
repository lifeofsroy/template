<?php

namespace App\Filament\Resources\TemplateSubCategoryResource\Pages;

use App\Filament\Resources\TemplateSubCategoryResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTemplateSubCategories extends ListRecords
{
    protected static string $resource = TemplateSubCategoryResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
