<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(125);
        Paginator::useBootstrap();
        View::share('LANGS', $this->getLangs());
    }

    public function getLangs(): array
    {
        return [
            [
                'name' => 'Русский',
                'code' => 'ru'
            ],
            [
                'name' => 'O\'zbek tili',
                'code' => 'uz'
            ]
        ];
    }
}
