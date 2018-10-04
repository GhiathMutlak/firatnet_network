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

                    {!! Form::open(['action' => 'BroadcasterController@store', 'method'=>'post']) !!}

                    <div class="card-body bg-light text-dark">

                        <div class="form-group">

                            <h4 class="card-title">
                            {!! Form::label('name', 'Broadcaster name' )!!}
                            </h4>
                            <p class="card-text">
                            {!! Form::text('name', '', ['class' => 'form-control','placeholder'=>'Name']) !!}
                            </p>

                            <h4 class="card-title">
                            {!! Form::label('district_name', 'District name' )!!}
                            </h4>
                            <p class="card-text">
                            {{--{!! Form::select('district_name', $district_names, ['class' => 'form-control']) !!}--}}

                            <select class="form-control js-example-basic-single" name="district_name">
                            {{--<option value=""></option>--}}
                            @foreach($districts as $dis)
                            <option value="{{ $dis->name }}">{{ $dis->name }}</option>
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




