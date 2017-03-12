@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="row">
            <img src="" alt="">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 style="margin-bottom: -10px; margin-top: -5px;">{{ $petition->title }}</h2>
					<hr>

					{{ $petition->description}}
                    <hr>

                    <p style="margin-top: -10px;margin-bottom: -3px;">
                        <i class="fa fa-user" aria-hidden="true"></i> Autheur: <a href="#">Tim Joosten</a>
                        | <i class="fa fa-calendar" aria-hidden="true"></i> {{ $petition->created_at }}
                        | <i class="fa fa-tags" aria-hidden="true"></i> Tags:
                        <a href="#"><span class="label label-info">test</span></a>
                    </p>
                </div>
            </div>

            <hr>

            {{-- Comment box --}}
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
