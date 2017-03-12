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
                        <form class="" action="index.html" method="post">
                            {{ csrf_field() }}

                            {{-- --}}
                            <div class="form-group">
                            </div>

                            {{-- --}}
                            <div class="form-group">
                            </div>

                            {{-- --}}
                            <div class="form-group">
                            </div>

                            {{-- --}}
                            <div class="form-group">
                            </div>

                            {{-- --}}
                            <div class="form-group">
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
