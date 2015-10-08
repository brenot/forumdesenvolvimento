<!DOCTYPE html>
<html>
    <head>
        <title>Alô Alerj - Chat</title>
    </head>
    <body>
        <div class="container">
            <div class="content">
                @yield('contents')
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/0.12.16/vue.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.3.7/socket.io.min.js"></script>

        <script>
            var socket = io('{{ url() . ':3000' }}');

            new Vue(
            {
                el: 'body',

                data: {
                    messages: []
                },

                ready: function()
                {
                    socket.on('chat-channel:ChatMessage', function(data)
                    {
                        this.messages.push(data.message);
                    }.bind(this));
                }
            });
        </script>
    </body>
</html>
