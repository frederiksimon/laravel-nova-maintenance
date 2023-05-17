<?php

use Illuminate\Support\Facades\Route;

if (!app()->isDownForMaintenance()) {
    Route::fallback(function () {
        return redirect('/');
    });
}
