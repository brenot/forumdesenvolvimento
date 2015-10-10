@extends('layouts.master')

@section('contents')
    <h4>Chat</h4>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> {{ $chatterUsername }}
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li>
                                    <a href="#">
                                        <span class="glyphicon glyphicon-refresh"></span>Atualizar
                                    </a>
                                </li>
                                <li><a href="#"><span class="glyphicon glyphicon-off"></span>
                                    Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="chat">
                            <li v-repeat="message: messages" class="@{{ message.pull }} clearfix">
                                <span class="chat-img pull-@{{ message.pull }}">
                                    <img src="assets/images/@{{ message.photo }}" alt="User Avatar" class="img-circle"/>
                                </span>

                                <div class="chat-body clearfix" v-if="message.isOperator">
                                    <div class="header">
                                        <strong class="primary-font">@{{ message.username }}</strong>
                                        <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>12 mins ago
                                        </small>
                                    </div>

                                    <p>
                                        @{{ message.message }}
                                    </p>
                                </div>

                                <div class="chat-body clearfix" v-if="!message.isOperator">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                                        <strong class="pull-right primary-font">@{{ message.username }}</strong>
                                    </div>

                                    <p>
                                        @{{ message.message }}
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="panel-footer" class="panel-footer" v-if="!connected">
                        <p>Aguardando conexão com servidor...</p>
                    </div>

                    <div class="panel-footer" v-if="connected">
                        <div class="input-group">
                            <input
                                id="btn-input"
                                type="text"
                                class="form-control input-sm"
                                placeholder="Digite sua mensagem aqui..."
                                v-on="keyup:__sendMessage | key 13"
                                v-model="currentMessage"
                            />

                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-sm" id="btn-chat" v-on="click: __sendMessage">
                                    Enviar
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('pragmarx/sdk::chat.code')
@stop
