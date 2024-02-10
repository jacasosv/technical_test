@extends('layouts.app')

@section('content')

@section("title",__("home.title"))

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>{{ __('home.home') }}</h1></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="card-text">
                        {{ __("home.text1") }}
                    </p>

                    <p class="card-text">
                        {{ __("home.text2") }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
