@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div class="card text-white bg-light mb-3" >

                    <div class="card-header">
                        <h3>Edit Subscriber</h3>
                    </div>

                    {!! Form::open(['action' => ['SubscriberController@update' ,$subscriber->id ], 'method'=>'POST']) !!}

                    <div class="card-body bg-light text-dark">

                        <div class="form-group">

                            <h4 class="card-title">
                                {{Form::label('name', 'Subscriber name' )}}
                            </h4>
                            <p class="card-text">
                                {{ Form::text('name', $subscriber->name, ['class' => 'form-control','placeholder'=>'Subscriber name']) }}
                            </p>

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

                            {{Form::hidden('_method','PUT')}}

                            {{Form::submit('Update', ['class' => 'btn btn-primary'])}}

                        </div>

                    </div>

                    {{ Form::close() }}

                </div>
            </div>

        </div>

    </div>

@endsection




