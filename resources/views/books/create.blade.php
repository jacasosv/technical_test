@extends('layouts.app')

@section("title", __("books.title_create") )

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col text-primary h1">
                        {{ __("books.book_record") }}
                    </div>
                    <div class="col text-end">
                        <a href="{{ route("book.index") }}" class="btn btn-primary">{{ __("buttons.goto_list") }}</a>
                    </div>
                </div>

                <form method="POST" action="{{ url('book')}}" accept-charset="UTF-8" autocomplete="off">
                    @csrf
                    <div class="card" style="background-color: white">
                        <div class="card-header">
                            <h3 class="mb-0">{{ __("books.details") }}</h3>
                        </div>
                        <div class="card-body">

                            {!! Inputs::text(__("books.name"), "title", "title", "", ['placeholder' => __("books.placeholder_title"), 'autocompleted' => 'false'], null, $errors) !!}

                            {!! Inputs::text(__("books.author"), "author", "author", "", ['placeholder' => __("books.placeholder_author"), 'autocompleted' => 'false'], null, $errors) !!}
                        </div>
                    </div>
                    <input class="btn btn-primary mt-3" type="submit" value="{{ __("buttons.create_book")  }}">
                </form>

            </div>
        </div>
    </div>
@endsection