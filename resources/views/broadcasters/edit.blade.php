@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div class="card text-white bg-light mb-3" >

                    <div class="card-header">
                        <h3>Edit district</h3>
                    </div>

                    {!! Form::open(['action' => ['DistrictController@update' ,$district->id ], 'method'=>'POST']) !!}

                    <div class="card-body bg-light text-dark">

                        <div class="form-group">

                            <h4 class="card-title">
                                {{Form::label('name', 'District name' )}}
                            </h4>
                            <p class="card-text">
                                {{ Form::text('name', $district->name, ['class' => 'form-control','placeholder'=>'District name']) }}
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




