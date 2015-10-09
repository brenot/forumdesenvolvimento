<?php

use App\Services\Chat\Events\ChatMessageSent;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('welcome');
});

Route::get('import', ['uses' => 'ImporterController@import']);
