@extends('adminlte::page')
@section('title', 'Blexr employees')
@section('content')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <form method="post" action="{{route('admin.post_add_request')}}">

        <input type="hidden" value="{{$reason}}" name="reason">
        <div class="container">

            <div style="position: relative">
                <label for="datetimes">Choose dates you need
                    <input type="text" name="datetimes" required/>
                </label>

            </div>
        </div>
        <br>
        <br>
        <div class="btn-group">
            <a href="#" class="btn btn-primary">Locations</a>
            <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
            <ul class="dropdown-menu" style="padding: 10px" id="myDiv">
                @foreach($locations as $location)
                    <li><p><input type="radio" value="{{$location->id}}" style="margin-right: 10px;" name="location" required>{{$location->address}}</p></li>
                @endforeach
            </ul>
        </div>
        <br>
        <br>
        <button type="submit" class="btn btn-primary">Send request</button>
        {{ csrf_field() }}
    </form>

        <script type="text/javascript">

            var date = new Date();
            date.setDate(date.getDate() + 1);
            date.setHours(0);
            date.setMinutes(0);
            date.setMilliseconds(0);

            var minDate = moment(date);

            if(new Date().getHours() >= 16) {
                    minDate = moment(date).add(1,'days');
            }


                if($('input[name="reason"]').val() === 'illness') {
                    var date = new Date();
                    date.setDate(date.getDate());
                    date.setHours(8);
                    date.setMinutes(0);
                    date.setMilliseconds(0);

                    minDate = moment(date);
                }

                $('input[name="datetimes"]').daterangepicker({
                    timePicker: true,
                    minDate: minDate,
                    locale: {
                        format: 'M/DD hh:mm A'
                    }
                });

        </script>

@endsection