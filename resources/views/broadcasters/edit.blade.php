@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div class="card text-white bg-light mb-3" >

                    <div class="card-header">
                        <h3>Edit Broadcaster</h3>
                    </div>

                    {!! Form::open(['action' => ['BroadcasterController@update' ,$broadcaster->id ], 'method'=>'POST']) !!}

                    <div class="card-body bg-light text-dark">

                        <div class="form-group">

                            <h4 class="card-title">
                                {{Form::label('name', 'Broadcaster name' )}}
                            </h4>
                            <p class="card-text">
                                {{ Form::text('name', $broadcaster->name, ['class' => 'form-control','placeholder'=>'Broadcaster name']) }}
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




