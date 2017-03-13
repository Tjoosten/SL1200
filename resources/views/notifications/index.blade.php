@extends('layouts.app')

@section('content')
    @if (session()->get('class') && session()->get('message'))
        <div class="row">
            <div class="col-md-12">
                <div class="alert {{ session()->get('class') }}">
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>
    @endif

    <div class="row" id="notifications">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#"><span class="fa fa-bell-o" aria-hidden="true"></span> Notifications</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row" style="padding-top: 10px;">

                        <div class="col-md-3">
                            <ul class="nav nav-pills nav-stacked">
                                <li role="presentation" class="active">
                                    <a href="#unread" aria-controls="unread" role="tab" data-toggle="tab">
                                        Unread <span class="pull-right badge"> {{ count(auth()->user()->unreadNotifications) }}</span>
                                    </a>
                                </li>

                                {{-- <li><a href="#">Read</a></li> --}}
                                {{-- <li><a href="#">All notifications <span class="pull-right badge"></span></a></li> --}}
                            </ul>
                        </div>

                        <div class="col-md-9">
                            <div class="tab-content">
                                {{-- Unread notification tab --}}
                                    <div role="tabpanel" class="tab-pane active" id="unread">
                                        @if ((int) count(auth()->user()->unreadNotifications) > 0)
                                            <ul class="list-group">
                                                @foreach (auth()->user()->unreadNotifications as $unread) {{-- Notifications listing --}}
                                                <li class="list-group-item" href="{{ $unread->data['url'] }}">
                                                    <span style="vertical-align: middle; padding-right: 5px;" class="{{ $unread->data['icon'] }}"></span>
                                                    <span style="vertical-align: middle;">{{ $unread->data['message'] }}</span>

                                                    <div class="pull-right">
                                                        <img style="width:20px; height: 20px; vertical-align: middle;" src="{{ Gravatar::src('topairy@gmail.com') }}" alt="">
                                                        <span style="padding-left: 10px; vertical-align: middle;">{{ $unread->created_at->diffForHumans() }}</span>

                                                        <a style="vertical-align: middle; padding-left: 15px;" href="{{ route('notifications.mark', ['notificationId' => $unread->id]) }}">
                                                            <span class="fa fa-check"></span>
                                                        </a>
                                                    </div>
                                                </li>
                                                @endforeach {{-- /Notifications listing --}}
                                            </ul>
                                        @else
                                            <div class="blankslate">
                                                <span class="blankslate-icon fa fa-bell-o fa-2x"></span>

                                                <h3>No new notifications</h3>
                                                <p>Looks like you read all your notifications.</p>
                                            </div>
                                        @endif
                                    </div>
                                {{-- /Unread notifications tab --}}
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection