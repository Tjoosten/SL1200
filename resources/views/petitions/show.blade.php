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
                        | <i class="fa fa-tags" aria-hidden="true"></i> Tags:
                        <a href="#"><span class="label label-info">test</span></a>
                    </p>
                </div>
            </div>

            <hr>
            {{ $comments->links() }} {{-- Comments pagination --}}

            {{-- Comment listing --}}
                @foreach ($comments as $comment)
                    <div class="well well-sm" style="margin-bottom:10px;">
							<div class="media">
	  							<div class="media-left">
	    							<a href="#">
	      								<img style="width: 64px; height:64px;" class=" img-rounded media-object" src="" alt="...">
	    							</a>
	  							</div>

	  							<div class="media-body">
	    							<h4 class="media-heading">
                                        Tim Joosten <small>dd-mm-yyyy 10:10:10</small>

                                        @if ($this->user)
                                            <span class="pull-right">
												<small>
    	    									  	<a href="#">
    	    										   	<small class="text-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Rapporteer</small>
    	    										</a>

                                                    <a href="">
        	    										<small class="text-danger"><span class="fa fa-close"></span> Verwijder</small>
        	    									</a>
    	    									</small>
											</span>
                                        @endif
	    							</h4>

	    							Ik ben een comment
	  							</div>
							</div>
						</div>
                @endforeach

                @if ((int) count($comments) > 0)
                    <hr>
                @endif
            {{-- /Comment listing --}}

            {{-- Comment box --}}
                @if (! auth()->check())
                    <div class="alert alert-info" role="alert">
                        <strong><span class="fa fa-info-circle" aria-hidden="true"></span> Info:</strong>
                        You need to be logged in. To comment on this petition.
                    </div>
                @else
                    <form class="form-horizontal" action="" method="post">
                        {{ csrf_field() }} {{-- CSRF FIELD --}}
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="form-group">
                            <div class="col-md-12">
                                <textarea name="comment" class="form-control" rows="7" placeholder="your reaction"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <span class="fa fa-check" aria-hidden="true"></span> Comment
                                </button>

                                <button type="reset" class="btn btn-sm btn-danger">
                                    <span class="fa fa-undo"></span> Reset
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
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
