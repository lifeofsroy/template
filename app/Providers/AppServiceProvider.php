<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Field;
use Filament\Navigation\UserMenuItem;
use Filament\Tables\Columns\IconColumn;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Filament::serving(function () {
            Filament::registerUserMenuItems([
                UserMenuItem::make()
                    ->label('Edit Profile')
                    ->url(route('profile.show'))
                    ->icon('heroicon-o-arrow-left'),
            ]);
            
            IconColumn::macro('toggle', function () {
                $this->action(function ($record, $column) {
                    $name = $column->getName();
                    $record->update([
                        $name => !$record->$name
                    ]);
                });
                return $this;
            });
        });

        Field::macro("tooltip", function(string $tooltip) {
            return $this->hintAction(
                Action::make('help')
                    ->icon('heroicon-o-question-mark-circle')
                    ->extraAttributes(["class" => "text-gray-500"])
                    ->label("")
                    ->tooltip($tooltip)
            );
        });
    }
}
