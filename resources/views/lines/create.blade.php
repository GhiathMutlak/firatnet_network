@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div class="card text-white bg-light mb-3" >

                    <div class="card-header">
                       <h3>
                           Create Line
                       </h3>
                    </div>

                    {{ Form::open(['action' => 'LineController@store', 'method'=>'post']) }}

                    <div class="card-body bg-light text-dark">

                        <div class="form-group">

                            <h4 class="card-title">
                                {{Form::label('name', 'Line name' )}}
                            </h4>
                            <p class="card-text">
                                {{ Form::text('name', '', ['class' => 'form-control','placeholder'=>'Name']) }}
                            </p>

                            {!! Form::hidden('_token', csrf_token()) !!}

                            {{Form::submit('Create', [ 'class' => 'btn btn-primary ' ])}}


                        </div>

                    </div>

                    {{ Form::close() }}

                </div>
            </div>

        </div>

    </div>

@endsection




