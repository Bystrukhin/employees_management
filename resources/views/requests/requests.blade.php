@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')
    @include('partials.search')

    <ul>
        @foreach($requests as $request)
            <li>
                <span>{{$request->date}}</span>
                <br>
                <span>{{$request->users->name}}</span>
                <br>
                @if($request->approval !== null)
                    <span>{{$request->approval}}</span>
                    <br>
                @endif
            </li>
            @if($request->approval == null)
                <form action="{{route('admin.request_approval', ['id' => $request->id])}}">
                    <input type="hidden" name="decision" value="approved">
                    <button class="comment-btn" type="submit">Approve</button>
                </form>
                <form action="{{route('admin.request_approval', ['id' => $request->id])}}">
                    <input type="hidden" name="decision" value="declined">
                    <button class="comment-btn" type="submit">Decline</button>
                </form>
            @endif
        @endforeach
    </ul>

@endsection