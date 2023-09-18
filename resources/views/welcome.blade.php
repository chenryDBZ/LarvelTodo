<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .todoListItem {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
    </style>
</head>
<body>
<div class="mainList container">
    <h1> Todo List </h1>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" {{ request()->is('') ? 'active' : null }} href="{{ url('/') }}" role="tab">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link"
               {{ request()->is('todoCompleted') ? 'active' : null }} href="{{ route('todoCompleted') }}" role="tab">Completed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" {{ request()->is('todoPending') ? 'active' : null }} href="{{ route('todoPending') }}"
               role="tab">Pending</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="{{ url('/') }}" role="tabpanel" aria-labelledby="home-tab">
            @foreach($todoItems as $todoItem)
                <div class="todoListItem">
                    <p> Todo item {{$todoItem->id}} : {{$todoItem->name}}</p>
                    <form method="post" action="{{ route('setComplete', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        {{ Form::checkbox('is_complete', 'yes', $todoItem->is_complete) }}
                        {{ Form::submit('Set Complete')}}
                    </form>
                    <form method="post" action="{{ route('deleteItem', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        {{ Form::submit('delete')}}
                    </form>
                </div>
            @endforeach
        </div>

        <div class="tab-pane fade" id="{{ route('todoCompleted') }}" role="tabpanel" aria-labelledby="profile-tab">
            @foreach($todoItems as $todoItem)
                <div class="todoListItem">
                    <p> Todo item {{$todoItem->id}} : {{$todoItem->name}}</p>
                    <form method="post" action="{{ route('setComplete', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        {{ Form::checkbox('is_complete', 'yes', $todoItem->is_complete) }}
                        {{ Form::submit('Set Complete')}}
                    </form>
                    <form method="post" action="{{ route('deleteItem', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        {{ Form::submit('delete')}}
                    </form>
                </div>
            @endforeach
        </div>

        <div class="tab-pane fade" id="{{ route('todoPending') }}" role="tabpanel" aria-labelledby="contact-tab">
            @foreach($todoItems as $todoItem)
                <div class="todoListItem">
                    <p> Todo item {{$todoItem->id}} : {{$todoItem->name}}</p>
                    <form method="post" action="{{ route('setComplete', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        {{ Form::checkbox('is_complete', 'yes', $todoItem->is_complete) }}
                        {{ Form::submit('Set Complete')}}
                    </form>
                    <form method="post" action="{{ route('deleteItem', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        {{ Form::submit('delete')}}
                    </form>
                </div>
            @endforeach
        </div>

    </div>

    <form method="post" action="{{ route('saveItem') }}">
        {{ csrf_field() }}
        <label for="todoItem"> Todo Item </label> </br>
        {{ Form::text('todoItem') }}
        <button type="submit">Save</button>
    </form>
</div>
</body>
</html>
