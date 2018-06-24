@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    <ul>
        @foreach($requests as $request)
            <li>
                <span>{{$request->date}}</span>
            </li>
            <form action="{{route('admin.delete_user_request', ['request_id' => $request->id])}}">
                <button class="comment-btn" type="submit">Delete</button>
            </form>
        @endforeach
    </ul>

@endsection