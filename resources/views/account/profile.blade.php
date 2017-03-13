@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="text-center">{{ auth()->user()->name }}</h1>

                <p class="text-center lead">Belguim</p>
                <p class="text-center"><a href="" class="btn btn-sm btn-default">Edit profile</a></p>
            </div>
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">

                    {{-- Nav tabs --}}
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#signed" aria-controls="home" role="tab" data-toggle="tab">
                                    Signed petitions <span style="margin-left: 5px;" class="label label-danger">0</span>
                                </a>
                            </li>
                            <li role="presentation">
                                <a href="#created" aria-controls="profile" role="tab" data-toggle="tab">
                                    Created petitions <span style="margin-left: 5px;" class="label label-danger">0</span>
                                </a>
                            </li>
                        </ul>
                    {{-- /Nav tabs --}}

                </div>
            </div>
        </div>
    </div>
@endsection