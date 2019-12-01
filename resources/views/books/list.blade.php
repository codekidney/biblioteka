@extends('template')

@section('title')
Book list
@endsection

@section('content')
<div class='container'>
    @if (count($booksList))
        <table>
            <thead>
                <tr>
                    <td>Nazwa</td>
                    <td>Rok</td>
                    <td>Miejsce</td>
                    <td>Strony</td>
                    <td>Cena</td>
                    <td>Podgląd</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($booksList as $book)
                <tr>
                    <td>{{$book->name}}</td>
                    <td>{{$book->year}}</td>
                    <td>{{$book->publication_place}}</td>
                    <td>{{$book->pages}}</td>
                    <td>{{$book->price}}</td>
                    <td><a href="{{ url('books', [$book->id]) }}">Podgląd</a></td>
                    <td><a href="{{ url('books', [$book->id, 'edit']) }}">Edytuj</a></td>
                    <td><a href="{{ url('books', [$book->id, 'delete']) }}">Usuń</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        Brak rekordów!
    @endif
    <a class="btn btn-sm btn-primary" href="{{ url('books', ['create'])}}">Dodaj nowy</a>
</div>
@endsection