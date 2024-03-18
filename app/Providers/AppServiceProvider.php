<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

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
        Response::macro('jsonFormatted', function ($message = "success", $data = [], $status = 200, $paginate = null) {
            $jsonFormatted = [
                'success' => $status < 400 ? true : false,
                'code' => $status,
                'message' => $message,
                'data' => $data,
            ];
            if ($paginate) {
                $jsonFormatted['paginate'] = $paginate;
            }
            return Response::make($jsonFormatted, $status);
        });
    }
}
