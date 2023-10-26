<?php

use App\HTTP\Controller\BizonRuEventsController;
use App\System\Route\Route;

Route::get('/task-test-two/public/', [BizonRuEventsController::class, 'show']);
Route::get('/task-test-two/public/make', [BizonRuEventsController::class, 'make']);
Route::get('/task-test-two/public/create', [BizonRuEventsController::class, 'create']);
Route::get('/task-test-two/public/read', [BizonRuEventsController::class, 'read']);

