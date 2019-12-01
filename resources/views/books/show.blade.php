@extends('template')

@section('title')
"{{ $book->name }}"
@endsection

@section('content')
<div class="container">
    @isset($book)
    <table>
        <tr>
            <td>Nazwa</td>
            <td>{{$book->name}}</td>
        </tr>
        <tr>
            <td>Rok</td>
            <td>{{$book->year}}</td>
        </tr>
        <tr>
            <td>Cena</td>
            <td>{{$book->price}}</td>
        </tr>
        <tr>
            <td>Miejsce</td>
            <td>{{$book->publication_place}}</td>
        </tr>
        @isset($book->isbn)
        <tr>
            <td>Numer ISBN</td>
            <td>{{$book->isbn->number}}</td>
        </tr>
        <tr>
            <td>Numer ISBN wydany przez</td>
            <td>{{$book->isbn->issued_by}}</td>
        </tr>
        <tr>
            <td>Numer ISBN wydany (data)</td>
            <td>{{$book->isbn->issued_on}}</td>
        </tr>
        @endisset
        <tr>
            <td>Autorzy</td>
            <td>
                @forelse($book->authors as $author)
                    {{$author->firstname}} {{$author->lastname}}, 
                @empty 
                Brak informacji o autorach
                @endif
            </td>
        </tr>
        
    </table>
    @endisset
</div>
@endsection