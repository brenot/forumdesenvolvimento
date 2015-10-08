<?php

use App\Services\Chat\Events\ChatMessageSent;
use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('welcome');
});

Route::get('import', ['uses' => 'ImporterController@import']);

Route::get('chat', function ()
{
	return view('chat.index')->with('username', Input::get('username'));
});

Route::get('chat/send/{username}/{message}', function ($username, $message)
{
	event(new ChatMessageSent($username, $message));
});
