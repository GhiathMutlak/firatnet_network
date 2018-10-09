@extends('layouts.app')

@section('content')

    <div>

        <h2 class="card mb-3">
            Subscribers

            <ul class="list-inline pull-right">

                <a class="btn btn-info " href="{{route('by_line')}}">
                    Show by line
                </a>
                <a class="btn btn-primary " href="{{url('/subscribers/create')}}">
                    Create new
                </a>

            </ul>
        </h2>

    </div>

    <hr>
            @if ( count($subscribers) > 0 )

                <div class="row">
                    @foreach( $subscribers as $subscriber )

                        <div class="col-md-4" >

                                <div class="panel panel-info" >
                                    <div class="panel-heading">

                                        <p>
                                        <h5>
                                                Name : {{$subscriber->name}}
                                        </h5>
                                        <h5>
                                                Line : {{App\Line::find($subscriber->line_id)->name}}
                                        </h5>
                                        <h5 class="">
                                                Broadcaster : {{App\Broadcaster::find($subscriber->broadcaster_id)->name}}
                                        </h5>


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

                {{$subscribers->links()}}

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




