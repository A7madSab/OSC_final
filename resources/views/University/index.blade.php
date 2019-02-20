@extends('layouts.app')

@section('content')

<div class="container"  style="padding-top: 50px;">


    <ul class="list-unstyled">
        @foreach($universities as $uni )

        <div class="row">
            <div class="col-5">

                <a class="btn btn-light" href="/university/{{ $uni->University_id }}">
                    <div style="width: 100%">
                        <h3>
                            <li>
                                <small><i class="fa fa-university" aria-hidden="true"></i></small>
                                <svg-icon><src href="sprite.svg#si-glyph-city" /></svg-icon>
                                {{ $uni->University_name }}
                            </li>
                        </h3>
                    </div>
                </a>
            </div>

            <div class="col-7"  style="display:flex; align-items: center;">
                {{ $uni->intro }}
            </div>

        </div>

        <hr>
        @endforeach
    </ul>
    
</div>

@endsection
