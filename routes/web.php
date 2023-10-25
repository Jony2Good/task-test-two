<?php

use App\HTTP\Controller\BizonRuEventsController;
use App\System\Route\Route;

Route::get('/task_two/public/', [BizonRuEventsController::class, 'show']);
Route::get('/task_two/public/make', [BizonRuEventsController::class, 'make']);
Route::get('/task_two/public/create', [BizonRuEventsController::class, 'create']);
Route::get('/task_two/public/read', [BizonRuEventsController::class, 'read']);

