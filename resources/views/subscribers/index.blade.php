@extends('layouts.app')

@section('content')

    <div>
        <h2 class="card mb-3">
            Subscribers
            <a class="btn btn-primary pull-right" href="/subscribers/create">
                Create new
            </a>
        </h2>


    </div>

            @if ( count($subscribers) > 0 )

                <div class="row">
                    @foreach( $subscribers as $subscriber )

                        <div class="col-md-4" >

                                <div class="panel panel-info" >
                                    <div class="panel-heading">

                                        <p>
                                            <span class="panel-body">Name : {{$subscriber->name}}</span>
                                            <span class="panel-body">Line : {{$subscriber->line_id}}</span>
                                            <span class="panel-body">Broadcaster : {{$subscriber->broadcaster_id}}</span>


                                        </p>

                                        <ul class="form-inline list-inline">

                                            <li>
                                                <a class="btn btn-primary btn-sm " href="/subscribers/{{$subscriber->id}}/edit">
                                                 Edit
                                                </a>
                                            </li>

                                            <li>
                                                {{ Form::open(['action' => ['SubscriberController@destroy', $subscriber->id], 'method'=>'post']) }}
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
                        Sorry, there is no subscribers.
                    </p>
                </div>

            @endif


@endsection




