@extends('layouts.app')

@section("title", __("contact.title_form"))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="h1">{{ __("contact.title") }}</div>

                <form method="POST" action="{{ route('contact.store')}}" accept-charset="UTF-8" autocomplete="off">
                    @csrf
                    <div class="card py-2" style="background-color: white">
                        <div class="card-body">

                            {!! Inputs::text(__("contact.email"), "email", "email", "", ['placeholder' => __("contact.placeholder_email"), 'autocompleted' => 'false'], null, $errors) !!}

                            {!! Inputs::textarea(__("contact.message"), "message", "message", "", ['placeholder' => __("contact.placeholder_message")], null, $errors, 6) !!}

                        </div>
                    </div>
                    <input class="btn btn-primary mt-3" type="submit" value="{{ __("buttons.send")  }}">
                </form>

            </div>
        </div>
    </div>
@endsection
