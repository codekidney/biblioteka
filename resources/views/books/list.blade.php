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
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        Brak rekordów!
    @endif
</div>
@endsection