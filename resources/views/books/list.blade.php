@extends('template')

@section('title')
Book list
@endsection

@section('content')
<div class='container'>
    {{ $booksList }}
</div>
@endsection