@extends('layouts.master')

@section('contents')
    <h1>Chat</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span class="glyphicon glyphicon-comment"></span> Chat
                        <div class="btn-group pull-right">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                            </button>
                            <ul class="dropdown-menu slidedown">
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-refresh">
                                    </span>Atualizar</a>
                                </li>
                                <li><a href="http://www.jquery2dotnet.com"><span class="glyphicon glyphicon-off"></span>
                                    Sair</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="chat">
                            <li v-repeat="message: messages" class="left clearfix">
                                @{{ message.username }}

                                <span class="chat-img pull-left" v-if="messagem.isoperator">
                                    <img src="assets/images/logo-alo-alerj-50px.png" alt="User Avatar" class="img-circle"/>
                                </span>
                            </li>


                                <span class="chat-img pull-left">
                                    <img src="assets/images/logo-alo-alerj-50px.png" alt="User Avatar" class="img-circle"/>
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <strong class="primary-font">Jack Sparrow</strong>
                                        <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span>12 mins ago
                                        </small>
                                    </div>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum
                                        ornare
                                        dolor, quis ullamcorper ligula sodales.
                                    </p>
                                </div>
                            </li>
                            <li class="right clearfix">
                                <span class="chat-img pull-right">
                                    <img src="assets/images/voce.png" alt="User Avatar" class="img-circle"/>
                                </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>13 mins
                                            ago
                                        </small>
                                        <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                    </div>
                                    <p>
                                        Message
                                    </p>
                                </div>
                            </li>


                        </ul>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <input id="btn-input" type="text" class="form-control input-sm"
                                placeholder="Digite sua mensagem aqui..."/>
                            <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                            Enviar
                            </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
