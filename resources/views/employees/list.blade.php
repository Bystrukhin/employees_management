@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')
    <ul>
        @foreach($users as $user)
            <li>
                <span>{{$user->name}}</span>
                <ul>
                    @foreach($user->permissions as $permission)
                        <li>{{$permission->name}}</li>
                    @endforeach
                </ul>
            </li>
            <form action="{{route('admin.editUser', ['user_id' => $user->id])}}">
                <button class="comment-btn" type="submit">Edit</button>
            </form>
            <form action="{{route('admin.deleteUser', ['user_id' => $user->id])}}">
                <button class="comment-btn" type="submit">Delete</button>
            </form>
        @endforeach
    </ul>

@endsection