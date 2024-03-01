<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .content{
            width:80%;
            margin-left:auto;
            margin-right: auto;
        }
    </style>
</head>
    <body>
        <nav class="content">
            {{ Form::open(array('url' => 'foo/bar')) }}
            {{Form::text('username')}}<br>
            {{Form::password('password')}}<br>
            {{Form::button('Click on me!')}}
            {{ Form::close() }}


        @foreach ($posts as $post)
                <h1>{{$post['title']}}</h1>
                <p>Published by{{$post['user_id']}}</p>
                <p>{{$post['body']}}</p>
                <hr>
                <h3>Comments:</h3>
                @foreach($post['comments'] as $comment)
                    <p><strong>{{$comment['user_id']}}:</strong></p>
                    <p>{{$comment['body']}}</p>
                @endforeach
                <hr>
                <br>
                <hr>
            @endforeach
        </nav>
    </body>
</html>
