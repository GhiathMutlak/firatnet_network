@extends('layouts.app')

@section('content')

    <div>
        <h2 class="card mb-3">
            Broadcasters
            <a class="btn btn-primary pull-right" href="/broadcasters/create">
                Create new
            </a>
        </h2>

        <hr>

    </div>

            @if ( count($broadcasters) > 0 )

                <div class="row">
                    @foreach( $broadcasters as $broadcaster )

                        <div class="col-md-4" >

                                <div class="panel panel-info" >
                                    <div class="panel-heading">

                                        <p class="panel-body">
                                            <span class="  ">District : {{$broadcaster->district_id}}</span>
                                            <span class="">Name : {{$broadcaster->name}}</span>

                                        </p>

                                        <ul class="form-inline list-inline">

                                            <li>
                                                <a class="btn btn-primary btn-sm " href="/broadcasters/{{$broadcaster->id}}/edit">
                                                 Edit
                                                </a>
                                            </li>

                                            <li>
                                                {{ Form::open(['action' => ['BroadcasterController@destroy', $broadcaster->id], 'method'=>'post']) }}
                                                {{ Form::hidden( '_method', 'DELETE' ) }}
                                                {{ Form::submit('Delete', [ 'class' => 'btn btn-danger btn-sm' ])}}
                                                {{ Form::close() }}
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                        </div>
                    @endforeach
                </div>


                </div>
            @else

                <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Warning!</h4>
                    <p class="mb-0">
                        Sorry, there is no broadcasters.
                    </p>
                </div>

            @endif


@endsection




