@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div class="card text-white bg-light mb-3" >

                    <div class="card-header">
                        <h3>Edit line</h3>
                    </div>

                    {!! Form::open(['action' => ['LineController@update' ,$line->id ], 'method'=>'POST']) !!}

                    <div class="card-body bg-light text-dark">

                        <div class="form-group">

                            <h4 class="card-title">
                                {{Form::label('name', 'Line name' )}}
                            </h4>
                            <p class="card-text">
                                {{ Form::text('name', $line->name, ['class' => 'form-control','placeholder'=>'name']) }}
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




