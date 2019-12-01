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
    </table>
    @endisset
</div>
@endsection