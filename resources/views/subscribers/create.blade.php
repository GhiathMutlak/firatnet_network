@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-4">
                <div class="card text-white bg-light mb-3" >

                    <div class="card-header">
                       <h3>
                           Create Broadcaster
                       </h3>
                    </div>

                    {!! Form::open(['action' => 'SubscriberController@store', 'method'=>'post']) !!}

                    <div class="card-body bg-light text-dark">

                        <div class="form-group">

                            <h4 class="card-title">
                                {!! Form::label('name', 'Subscriber name' )!!}
                            </h4>
                            <p class="card-text">
                                {!! Form::text('name', '', ['class' => 'form-control','placeholder'=>'Name']) !!}
                            </p>

                            <h4 class="card-title">
                                {!! Form::label('line_name', 'Line name' )!!}
                            </h4>
                            <p class="card-text">

                                <select class="form-control js-example-basic-single" name="line_name">
                                    @foreach($lines as $line)
                                        <option value="{{ $line->name }}">{{ $line->name }}</option>
                                    @endforeach
                                </select>
                            </p>

                            <h4 class="card-title">
                                {!! Form::label('broadcaster_name', 'Broadcaster name' )!!}
                            </h4>
                            <p class="card-text">
                                <select class="form-control js-example-basic-single" name="broadcaster_name">
                                    @foreach($broadcasters as $broadcaster)
                                        <option value="{{ $broadcaster->name }}">{{ $broadcaster->name }}</option>
                                    @endforeach
                                </select>
                            </p>

                            {!! Form::hidden('_token', csrf_token()) !!}

                            {!! Form::submit('Create', [ 'class' => 'btn btn-primary ' ])!!}


                            </div>

                            </div>

                            {{ Form::close() }}

                </div>
            </div>

        </div>

    </div>

@endsection




