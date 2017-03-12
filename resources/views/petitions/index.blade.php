@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <img src="" alt="">
        </div>
    </div>

    <div class="row row-padding">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-body">

                    {{-- Petition section --}}
                        @foreach ($petitions as $petition)
                            <div style="margin-left: -15px;" class="col-sm-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4><strong><a href="#">{{ $petition->title }}</a></strong></h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="#" class="thumbnail">
                                            <img src="http://placehold.it/260x180" alt="">
                                        </a>
                                    </div>

                                    <div class="col-md-9">
                                        <p>{{ $petition->description }}</p>
                                        <p><a class="btn btn-sm btn-info" href="">Read more...</a></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12" style="margin-top: -25px;">
                                        <p></p>

                                        <p>
                                            <i class="fa fa-user" aria-hidden-true></i> Autheur: <a href="#">{{ $petition->author->name }}</a>
                                            | <i class="fa fa-calendar" aria-hidden="true"></i> {{ $petition->created_at }}
                                            | <i class="fa fa-pencil" aria-hidden="true"></i> {{ count($petition->signatures) }} Supporters
                                            | <i class="fa fa-tags" aria-hidden="true"></i> Tags:
                                                    <a href="#"><span class="label label-info">test</span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    {{-- /Petition section --}}

                    @if (count($petitions) > 4) {{-- Pagination initialization --}}
                        <div style="margin-bottom: -20px;">
                            {{ $petitions->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-3">
            {{-- Search field --}}
                <div class="well well-sm">
                    <form method="POST" class="form-horizontal" action="">
                        {{ csrf_field() }}

                        <div class="input-group">
                            <input type="text" name="term" class="form-control" placeholder="Search term">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <span class="fa fa-search" aria-hidden="true"></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            {{-- /Search field --}}

            {{-- Categories --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span class="fa fa-tags" aria-hidden="true"></span> Categorieen:
                    </div>

                    <div class="panel-body">
                        @if (count($categories) === 0)
                            <i><span class="text-muted">(There are no categories)</span></i>
                        @else
                            @foreach ($categories as $category)
                                <a href="" class="label label-info">{{ $category->name }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            {{-- /Categories --}}
        </div>
    </div>
@endsection
