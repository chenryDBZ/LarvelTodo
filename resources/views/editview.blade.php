<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="todoItemView">
    <form method="post" action="{{ route('editItem', $todoItem->id) }}">
        {{ csrf_field() }}
        {{ Form::text('name', $todoItem->name) }}
        {{ Form::checkbox('is_complete', 'yes', $todoItem->is_complete) }}
        {{ Form::submit('Save')}}
    </form>
</div>
</body>
</html>
