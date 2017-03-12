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

                        @endforeach
                    {{-- /Petition section --}}

                </div>
            </div>
        </div>

        <div class="col-md-3">

        </div>
    </div>
@endsection
