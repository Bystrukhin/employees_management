@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    <ul>
        @foreach($permissions as $permission)
            <li>
                <span>{{$permission->name}}</span>
                <br>
            </li>
            <form action="{{route('admin.editPermission', ['permission_id' => $permission->id])}}">
                <button class="comment-btn" type="submit">Edit</button>
            </form>
            <form action="{{route('admin.deletePermission', ['permission_id' => $permission->id])}}">
                <button class="comment-btn" type="submit">Delete</button>
            </form>
        @endforeach
    </ul>

@endsection