@extends('template')

@section('title')
Autorzy
@endsection

@section('content')
<div class='container'>
    @if (count($authorsList))
        <table>
            <thead>
                <tr>
                    <td>Nazwisko</td>
                    <td>Imię</td>
                    <td>Data urodzenia</td>
                    <td>Gatunki</td>
                    <td>Ksiażki</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($authorsList as $author)
                <tr>
                    <td>{{$author->lastname}}</td>
                    <td>{{$author->firstname}}</td>
                    <td>{{$author->birthday}}</td>
                    <td>{{$author->genres}}</td>
                    <td>
                        @foreach($author->books as $book)
                        <a href="{{ url('books', [$book->id]) }}">{{ $book->name }}</a>
                        @endforeach
                    </td>
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