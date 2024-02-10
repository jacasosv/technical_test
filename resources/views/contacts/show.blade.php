@extends('layouts.app')

@section("title", __("contact.title_show"))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="h1">{{ __("contact.title") }}</div>
                    <div class="card py-2" style="background-color: white">
                        <div class="card-header">
                            <h3 class="mb-0">{{ __("contact.details") }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __("contact.email") }}: </strong>
                                    <p class="h3">{{ $item["email"] }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>{{ __("contact.message")  }}:</strong>
                                    <p>{!! nl2br($item["message"], false) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route("contact.index") }}" class="btn btn-primary mt-3" > {{ __("buttons.new_form_contact") }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
