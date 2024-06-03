<?php

use App\Http\Controllers\Api\QuotesController;
use App\Http\Middleware\EnsureApiBearerToken;
use Illuminate\Support\Facades\Route;

Route::get('/v1/quotes', [QuotesController::class, 'get'])->middleware(EnsureApiBearerToken::class);
