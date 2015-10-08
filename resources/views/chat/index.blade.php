@extends('layouts.master')

@section('contents')
    <h1>Chat</h1>

    <ul>
        <li v-repeat="message: messages">
            @{{ message }}
        </li>
    </ul>
@stop
