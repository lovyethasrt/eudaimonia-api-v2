<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(ResponseFactory $factory): void
    {
        $factory->macro('success', function ($message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Success',
            ], 200);
        });

        $factory->macro('successWithData', function ($data, $message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Success',
                'data' => $data,
            ], 200);
        });

        $factory->macro('created', function ($data, $message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Success',
            ], 201);
        });

        $factory->macro('createdWithData', function ($data, $message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Success',
                'data' => $data,
            ], 201);
        });

        $factory->macro('noContent', function ($message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'No Content',
            ], 204);
        });

        $factory->macro('badRequest', function ($message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Bad Request',
            ], 400);
        });

        $factory->macro('unauthorized', function ($message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Unauthorized',
            ], 401);
        });

        $factory->macro('forbidden', function ($message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Forbidden',
            ], 403);
        });

        $factory->macro('notFound', function ($message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Requested Resource Not Found',
            ], 404);
        });

        $factory->macro('invalidEntity', function ($errors, $message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Invalid Input',
                'errors' => $errors,
            ], 422);
        });

        $factory->macro('internalServerError', function ($message = null) use ($factory) {
            return $factory->json([
                'message' => $message ?? 'Internal Server Error',
            ], 500);
        });
    }
}
