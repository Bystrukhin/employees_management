@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')

    <form method="get" action="{{route('admin.add_request')}}">

        <div class="container">
            <div class="btn-group">
                <a href="#" class="btn btn-primary">Tell us your reason</a>
                <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                    <li><p><input type="radio" value="illness" style="margin-right: 10px;" name="reason">Illness</p></li>
                    <li><p><input type="radio" value="privacy" style="margin-right: 10px;" name="reason">Privacy</p></li>
                </ul>
            </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Next</button>
        {{ csrf_field() }}
    </form>

@endsection