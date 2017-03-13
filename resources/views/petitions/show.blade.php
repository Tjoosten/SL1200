@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="row">
            <img src="" alt="">
        </div>
    </div>

    @if (! Auth::check())
        <div class="row row-padding">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissable" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong>
                    If you sign this petition an user account will be created.
                </div>
            </div>
        </div>
    @endif

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div style="margin-top: -20px;" class="page-header">
                        <div class="pull-right">
                            <div class="dropdown">
                                <button class='btn btn-xs btn-info dropdown-toggle' data-toggle="dropdown" type="button">
                                    <span class="fa fa-info-circle" aria-hidden="true"></span> Info <span class="caret"></span>
                                </button>

                                <ul class="dropdown-menu">
                                    <li><a href="#" data-toggle="modal" data-target="#update"><span class="fa fa-plus" aria-hidden="true"></span> Schrijf een update</a></li>
                                    <li><a href=""><span class="fa fa-info-circle" aria-hidden="true"></span> Updates</a></li>
                                    <li><a href=""><span class="fa fa-file-text-o" aria-hidden="true"></span> Handtekeneningen</a></li>
                                    <li><a href="mailto:"><span class="fa fa-envelope" aria-hidden="true"></span> Contacteer verantwoordelijke</a></li>
                                </ul>
                            </div>
                        </div>

                        <h2 style="margin-bottom: -5px;">{{ $petition->title }}</h2>
                    </div>

					{{ $petition->description}}
                    <hr>

                    <p style="margin-top: -10px;margin-bottom: -3px;">
                        <i class="fa fa-user" aria-hidden="true"></i> Autheur: <a href="#">{{ $petition->author->name }}</a>
                        | <i class="fa fa-calendar" aria-hidden="true"></i> {{ $petition->created_at }}
                        | <i class="fa fa-pencil" aria-hidden="true"></i> 000.000 / <strong>150.000</strong>
                    </p>
                </div>
            </div>

            <hr>
            {{ $comments->links('petitions.partials.pagination') }} {{-- Comments pagination --}}

            {{-- Comment listing --}}
                @foreach ($comments as $comment)
                    <div class="well well-sm" style="margin-bottom:10px;">
                        <div class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img style="width: 64px; height:64px;" class=" img-rounded media-object" src="{{ Gravatar::src($comment->author->email) }}" alt="{{ $comment->author->name }}">
                                </a>
                            </div>

                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{ $comment->author->name }} <small>{{ $comment->created_at }}</small>

                                    <span class="pull-right">
                                        <small>
                                            <a href="#">
                                                <small class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Rapporteer</small>
                                            </a>

                                            @if (auth()->user()->id == $comment->user_id)
                                                <a href="{{ route('comment.delete', ['id' => $comment->id, 'petitionId' => $petition->id]) }}">
                                                    <small class="text-danger"><span class="fa fa-close"></span> Verwijder</small>
                                                </a>
                                            @endif
                                        </small>
                                    </span>
                                </h4>

                                <style>
                                    .emoji {
                                        height: 14px;
                                        width: 14px;
                                        vertical-align: middle;
                                        line-height: 1.6;
                                    }
                                </style>

                                {!! Markdown::convertToHtml($comment->comment) !!}
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ((int) count($comments) > 0)
                    <hr>
                @endif
            {{-- /Comment listing --}}

            {{-- Comment box --}}
                <form class="form-horizontal" action="{{ route('comment.store') }}" method="post">
                    {{ csrf_field() }} {{-- CSRF FIELD --}}
                    <input type="hidden" name="user_id" value="@if (auth()->check()) {{ auth()->user()->id }} @endif">
                    <input type="hidden" name="petition" value="{{ $petition->id }}">

                    <div class="form-group">
                        <div class="col-md-12">
                            <textarea @if (auth()->guest()) disabled @endif name="comment" class="form-control" rows="7" placeholder="@if (auth()->guest())You need to login for a comment @else Your reaction @endif"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button @if (auth()->guest()) disabled @endif type="submit" class="btn btn-sm btn-success">
                                <span class="fa fa-check" aria-hidden="true"></span> Comment
                            </button>

                            <button @if (auth()->guest()) disabled @endif type="reset" class="btn btn-sm btn-danger">
                                <span class="fa fa-undo"></span> Reset
                            </button>
                        </div>
                    </div>
                </form>
            {{-- /Comment box --}}
        </div>

        {{-- Sidebar --}}
            <div class="col-sm-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Tekenen:</div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="index.html" method="post">
                            {{ csrf_field() }}

                            {{-- --}}
                            <div class="form-group form-group-sm">
                                <div class="col-sm-12">
                                    <input type="type" class="form-control" value="" placeholder="Firstname">
                                </div>
                            </div>

                            {{-- --}}
                            <div class="form-group form-group-sm">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="" placeholder="Lastname">
                                </div>
                            </div>

                            {{-- --}}
                            <div class="form-group form-group-sm">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="" placeholder="Email">
                                </div>
                            </div>

                            {{-- --}}
                            <div class="form-group form-group-sm">
                                <div class="col-sm-12">
                                    <select name="" id="" class="form-control">
                                        <option value="">-- Select country --</option>
                                    </select>
                                </div>
                            </div>

                            {{-- --}}
                            <div class="form-group form-group-sm">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" value="" placeholder="City">
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="panel-footer">
                        <button type="submit" class="btn btn-xs btn-primary">Tekenen</button>
                        <button type="reset" class="btn btn-xs btn-danger">Reset</button>
                    </div>
                </div>
            </div>
        {{-- /Sidebar --}}
    </div>
@endsection
