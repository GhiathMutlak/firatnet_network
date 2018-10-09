@extends('layouts.app')

@section('content')


            <h2 class="card mb-3">
                Lines
                <a class="btn btn-primary pull-right" href="/lines/create">
                    Create new
                </a>
            </h2>

            <hr>

            @if ( count($lines) > 0 )

                <div class="row">
                    @foreach( $lines as $line )

                        <div class="col-md-4" >

                                <div class="panel panel-info" >
                                    <div class="panel-heading">

                                        <p class="panel-body">{{$line->name}}</p>

                                        <ul class="form-inline list-inline">

                                            <li>
                                                <a class="btn btn-primary btn-sm float-right" href="/lines/{{$line->id}}/edit">
                                                 Edit
                                                </a>
                                            </li>

                                            <li>
                                                {{ Form::open(['action' => ['LineController@destroy', $line->id], 'method'=>'post']) }}
                                                {{ Form::hidden( '_method', 'DELETE' ) }}
                                                {{ Form::submit('Delete', [ 'class' => 'btn btn-danger btn-sm' ])}}
                                                {{ Form::close() }}
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                                    {{--<a class="pull-right btn btn-info" href="/posts/{{$post->id}}">--}}
                                        {{--Details--}}
                                    {{--</a>--}}
                        </div>
                    @endforeach
                </div>


                </div>
                {{--{{$posts->links()}}--}}
            @else

                <div class="alert alert-dismissible alert-warning">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Warning!</h4>
                    <p class="mb-0">
                        Sorry, there is no lines.
                    </p>
                </div>

            @endif


@endsection




