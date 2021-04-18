@php
use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat-Realtime</title>
</head>

<body>
    <strong style="color:blue"> Logged: {{Auth::user()->name}}</strong>
    <input type="hidden" name="" id="current_author" value="{{Auth::user()->name}}">
    <br>

    <div class="" id="data">
        @foreach ($chats as $data)

        <p><strong>{{$data->author}}: </strong>{{$data->content}}</p>

        @endforeach
    </div>
    <form action="">
        <input type="text" name="content" id="">
        <input type="submit" name="" id="submit-btn">
    </form>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.js" integrity="sha512-q/dWJ3kcmjBLU4Qc47E4A9kTB4m3wuTY7vkFJDTZKjTs8jhyGQnaUrxa0Ytd0ssMZhbNua9hE+E7Qv1j+DyZwA==" crossorigin="anonymous"></script>
    <script crossorigin="anonymous">
        var current_author = $('#current_author').val();

        var socket = io('http://127.0.0.1:3000');

        socket.on('laravel_database_chat:message', function(data) {
            if (data.author != current_author) {
                $('#data').append('<p><strong>' + data.author + '</strong>: ' + data.content + '</p>')
            }
        })
    </script>
    <script>
        $('#submit-btn').click(function(e) {
            e.preventDefault();
            $.ajax({
                url: window.location.href + '/store',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                    content: $("input[name='content']").val()
                },
                success: function(data) {
                    console.log(data);
                    $('#data').append('<p><strong>' + data.author + '</strong>: ' + data.content + '</p>')
                },
                complete: function (){
                    $("input[name='content']").val('');
                }

            })
        })
    </script>
</body>


</html>