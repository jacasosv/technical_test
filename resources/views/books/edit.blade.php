@extends('layouts.app')

@section("title",__("books.title_edit"))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col text-primary h1">
                        {{ __("books.book_edit") }}
                    </div>
                    <div class="col text-end">
                        <a href="{{ route("book.index") }}" class="btn btn-primary">{{ __("buttons.goto_list") }}</a>
                    </div>
                </div>

                <form method="POST" action="{{ route('book.update',$item->id) }}" accept-charset="UTF-8" autocomplete="off">
                    @method("PUT")
                    @csrf
                    <div class="card" style="background-color: white">
                        <div class="card-header">
                            <h3 class="mb-0">{{ __("books.details") }}</h3>
                        </div>
                        <div class="card-body">

                            {!! Inputs::text(__("books.name"), "title", "title", "", ['placeholder' => __("books.placeholder_title"), 'autocompleted' => 'false'], $item, $errors) !!}

                            {!! Inputs::text(__("books.author"), "author", "author", "", ['placeholder' => __("books.placeholder_author"), 'autocompleted' => 'false'], $item, $errors) !!}
                        </div>
                    </div>
                    <input class="btn btn-primary mt-3" type="submit" value="{{ __("buttons.update_book")  }}">
                </form>

            </div>
        </div>
    </div>
@endsection
