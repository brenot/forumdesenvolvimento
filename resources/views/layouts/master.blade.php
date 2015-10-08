<!DOCTYPE html>
<html>
    <head>
        <title>Alô Alerj - Chat</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

        <link rel="stylesheet" href="assets/css/main.css">
    </head>
    <body>
        <div class="container">
            <div class="content">
                @yield('contents')
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.16/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>

        <script>
            var socket = io('{{ url() . ':3000' }}');

            new Vue(
            {
                el: 'body',

                data: {
                    messages: [],
                    username: ''
                },

                ready: function()
                {
                    socket.on('chat-channel:App\\Services\\Chat\\Events\\ChatMessageSent', function(data)
                    {
                        var message = {"isOperator": data.username == "Alo Alerj", "username": data.username, "message": data.message};
                        console.log(message);
                        this.messages.push(message);
                    }.bind(this));
                }
            });
        </script>
    </body>
</html>
