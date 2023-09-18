<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Todo List</title>

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

        .mainList {
            border: 1px solid #dee2e6;
        }

        .todoListItem {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 5px;

            & label {
                margin-right: auto;
            }
        }

        button {
            border-radius: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>

<div class="mainList container">
    <h1> Todo List </h1>
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ Request::is("/") ? 'active' : null }}" href="{{ url('/') }}" role="tab">All</a>
        </li>
        <li class="nav-item">
            <a class="nav-link
               {{ Request::is('todoCompleted') ? 'active' : null }}" href="{{ route('todoCompleted') }}" role="tab">Completed</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('todoPending') ? 'active' : null }}" href="{{ route('todoPending') }}"
               role="tab">Pending</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="{{ url('/') }}" role="tabpanel">
            @foreach($todoItems as $todoItem)
                <div class="todoListItem">
                    <label> Todo item {{$todoItem->id}} : {{$todoItem->name}}</label>
                    <form method="post" action="{{ route('setComplete', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        <input @if($todoItem->is_complete) checked="checked" @endif name="is_complete" type="checkbox"
                               value="{{$todoItem->is_complete}}" disabled="disabled">
                        <button type="submit">Set Complete</button>
                    </form>
                    <form method="post" action="{{ route('deleteItem', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        <button type="submit">Delete</button>
                    </form>
                    <form method="post" action="{{ route('editView', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        <button class="btn-check" type="submit">Edit</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="tab-pane fade" id="{{ route('todoCompleted') }}" role="tabpanel">
            @foreach($todoItems as $todoItem)
                <div class="todoListItem">
                    <label> Todo item {{$todoItem->id}} : {{$todoItem->name}}</label>
                    <form method="post" action="{{ route('setComplete', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        <input @if($todoItem->is_complete) checked="checked" @endif name="is_complete" type="checkbox"
                               value="{{$todoItem->is_complete}}" disabled="disabled">
                        {{ Form::submit('Set Complete')}}
                    </form>
                    <form method="post" action="{{ route('deleteItem', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        <button type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="tab-pane fade" id="{{ route('todoPending') }}" role="tabpanel">
            @foreach($todoItems as $todoItem)
                <div class="todoListItem">
                    <label> Todo item {{$todoItem->id}} : {{$todoItem->name}}</label>
                    <form method="post" action="{{ route('setComplete', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        <input @if($todoItem->is_complete) checked="checked" @endif name="is_complete" type="checkbox"
                               value="{{$todoItem->is_complete}}" disabled="disabled">
                        {{ Form::submit('Set Complete')}}
                    </form>
                    <form method="post" action="{{ route('deleteItem', $todoItem->id) }}" style="">
                        {{ csrf_field() }}
                        <button type="submit">Delete</button>
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
