@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-offset-2 col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2 style="margin-bottom: -10px; margin-top: -5px;">Create organization</h2>
                    <hr>

                    <form class="form-horizontal" action="{{ route('org.store') }}" method="POST">
                        {{ csrf_field()  }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="" class="control-label col-md-3">
                                Naam: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <input type="text" class="form-control" name="name" placeholder="Organization name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="" class="control-label col-sm-3">
                                Description: <span class="text-danger">*</span>
                            </label>

                            <div class="col-md-9">
                                <textarea name="description" class="form-control" rows="8" placeholder="Organization description"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <span class="fa fa-check" aria-hidden="true"></span> Create organization.
                                </button>

                                <button class="btn btn-sm btn-danger" type="reset">
                                    <span class="fa fa-undo" aria-hidden="true"></span> Reset
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
