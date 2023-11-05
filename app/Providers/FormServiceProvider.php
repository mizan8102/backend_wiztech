<?php

namespace App\Providers;


use App\Http\Interfaces\DynamicForm\DynamicFormInterface;
use App\Http\Services\DynamicForm\DynamicFormService;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DynamicFormInterface::class, DynamicFormService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
