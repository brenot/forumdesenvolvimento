<?php

use Illuminate\Support\Facades\Redis;

Route::get('/', function () {
    return view('welcome');
});

Route::get('import', ['uses' => 'ImporterController@import']);

Route::get('redis', function ()
{
	$data = [
		'event' => 'ChatMessage',
	    'data' => [
		    'operator' => 'acr@antoniocarlosribeiro.com',
	        'message' => 'Olá! Você está no Alô Alerj, meu nome é Antonio Carlos, como posso ajudar?',
	    ],
	];

	Redis::publish('chat-channel', json_encode($data));

	return view('chat.index');
});
