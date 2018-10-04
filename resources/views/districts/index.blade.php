@extends('layouts.app')

@section('content')

    <div>
        <h2 class="card mb-3">
            Districts
            <a class="btn btn-primary pull-right" href="/districts/create">
                Create new
            </a>
        </h2>


    </div>

            @if ( count($districts) > 0 )

                <div class="row">
                    @foreach( $districts as $district )

                        <div class="col-md-4" >

                                <div class="panel panel-info" >
                                    <div class="panel-body">

                                        <p>{{$district->name}}</p>

                                        <ul class="form-inline list-inline">

                                            <li>
                                                <a class="btn btn-primary btn-sm " href="/districts/{{$district->id}}/edit">
                                                 Edit
                                                </a>
                                            </li>

                                            <li>
                                                {{ Form::open(['action' => ['DistrictController@destroy', $district->id], 'method'=>'post']) }}
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
                        Sorry, there is no districts.
                    </p>
                </div>

            @endif


@endsection




