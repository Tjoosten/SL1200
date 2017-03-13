@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-10"><h1>Joeuser</h1></div>
        <div class="col-sm-2">
            <a href="#" class="pull-right">
                <img title="profile image" class="img-circle img-responsive" src="{{ Gravatar::src('tim@activisme.be') }}">
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4"><!--left col-->
            <ul class="list-group">
                <li class="list-group-item text-muted">Information</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> {{ $user->name }}</li>
                <li class="list-group-item text-right">
                    <span class="pull-left">
                        <strong>Status:</strong>
                    </span>

                    @if ($user->isOnline())
                        <span class="label label-success">Online</span>
                    @elseif ($user->isBanned())
                        <span class="label label-danger">Geblokkeerd</span>
                    @else
                        <span class="label label-danger">Offline</span>
                    @endif
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> {{ $user->created_at }}</li>
            </ul>

            @if ((int) $user->id !== (int) auth()->user()->id)
                <div class="row">
                    <div class="col-md-6">
                        <a href="" class="btn btn-block btn-warning">
                            <span class="fa fa-ban" aria-hidden="true"></span> Block user
                        </a>
                    </div>

                    <div class="col-md-6">
                        <a href="" class="btn btn-block btn-danger">
                            <span class="fa fa-exclamation-triangle" aria-hidden="true"></span> Report user
                        </a>
                    </div>
                </div>
            @endif

        </div><!--/col-3-->
        <div class="col-sm-8">
            <ul class="nav nav-tabs" id="myTab">
                <li class="active"><a href="#petitions" data-toggle="tab">Petitions</a></li>
                <li><a href="#followers" data-toggle="tab">Followers</a></li>
                <li><a href="#orgs" data-toggle="tab">Organizations</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="petitions" style="margin-top: 10px;">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            petitions
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="followers" style="margin-top: 10px;">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="row">

                                @foreach ($user->followers as $follower)
                                    <div class="col-md-6">
                                        <div class="well well-sm">
                                            <div class="media">
                                                <a class="pull-left" href="#">
                                                    <img class="media-object img-responsive img-thumbnail" src="//placehold.it/80">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">{{ $follower->name }}</h4>
                                                    <p>
                                                        <span class="label label-info">10 petitions</span>
                                                        <span class="label label-primary">{{ $follower->followers()->count() }} followers</span>
                                                    </p>

                                                    <p>
                                                        <a href="#" class="btn btn-xs btn-default"><span class="fa fa-chevron-circle-right"></span> View</a>
                                                        <a href="#" class="btn btn-xs btn-danger"><span class="fa fa-heart-o"></span> Follow</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="orgs">
                    <div class="panel panel-default" style="margin-top: 10px;">
                        <div class="panel-body">
                            Organizations
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/tab-content-->

    </div><!--/col-9-->
@endsection