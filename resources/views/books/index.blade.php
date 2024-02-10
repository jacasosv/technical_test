@extends('layouts.app')

@section("title", __("books.title_index"))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <div>{{ $message }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row">
                    <div class="col text-primary h1">
                        {{ __("books.title") }}
                    </div>
                    <div class="col text-end">
                        <a href="{{ route("book.create") }}" class="btn btn-primary">{{ __("buttons.create") }}</a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __("books.name")  }}</th>
                                <th scope="col">{{ __("books.author")  }}</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($books as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->author }}</td>
                            <td class="text-end">
                                <form action="{{ route('book.destroy',$item->id) }}" method="POST">
                                    <a href="{{ route("book.edit",$item->id ) }}" class="btn btn-primary">{{ __("buttons.edit") }}</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">{{ __("buttons.delete") }}</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <th scope="row">1</th>
                                <td colspan="3">{{ __("books.no_books_created") }}</td>
                            </tr>
                        @endforelse

                        </tbody>
                    </table>

                    <div class="d-flex justify-content-center">
                        {!! $books->links() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
