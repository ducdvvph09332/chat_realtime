<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat-Realtime</title>
</head>

<body>
    <div class="" id="data">
        @foreach ($chats as $data)

        <p><strong>{{$data->author}}: </strong>{{$data->content}}</p>

        @endforeach
    </div>

    <form action="{{route('chats.store')}}" method="POST">
        @csrf

        <input type="text" name="content" id="">
        <input type="submit" name="" id="">
    </form>
    
    <script>
        var socket = io('')
    </script>
</body>


</html>