<?php

use App\Services\Chat\Events\ChatMessageSent;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('welcome');
});

Route::get('import', ['uses' => 'ImporterController@import']);

Route::get('redis', function ()
{
	event(new ChatMessageSent(Input::get('username'), Input::get('message')));

	return view('chat.index');
});
