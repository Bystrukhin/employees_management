@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    <ul>
        @foreach($locations as $location)
            <li>
                <span>{{$location->address}}</span>
                <br>
            </li>
            <form action="{{route('admin.editLocation', ['location_id' => $location->id])}}">
                <button class="comment-btn" type="submit">Edit</button>
            </form>
            <form action="{{route('admin.deleteLocation', ['location_id' => $location->id])}}">
                <button class="comment-btn" type="submit">Delete</button>
            </form>
        @endforeach
    </ul>

@endsection