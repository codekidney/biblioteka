@extends('template')

@section('title')
Lista wypożyczeń
@endsection

@section('content')
<div class='container'>
    @if (count($loansList))
        <table>
            <thead>
                <tr>
                    <td>Nazwa książki</td>
                    <td>Data wypożyczenia</td>
                    <td>Planowana data zwrotu</td>
                    <td>Data zwrotu</td>
                    <td>Dane klienta</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($loansList as $loan)
                <tr>
                    <td>{{$loan->book->name}}</td>
                    <td>{{$loan->loaned_on}}</td>
                    <td>{{$loan->estimated_on}}</td>
                    <td>
                        @if($loan->returned_on)
                        {{$loan->returned_on}}
                        @else 
                        Brak
                        @endif
                    </td>
                    <td>{{$loan->client}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        Brak rekordów!
    @endif
    <a class="btn btn-sm btn-primary" href="{{ url('loans', ['create'])}}">Dodaj nowy</a>
</div>
@endsection