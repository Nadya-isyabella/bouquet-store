<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\KategoriBouquet;
use App\Models\Aksesoris;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Relation::morphMap([
            'bouquet' => KategoriBouquet::class,
            'aksesoris' => Aksesoris::class,
        ]);
    }
}