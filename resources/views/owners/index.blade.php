@extends('layouts.main')
@section('content')
    <a class="btn btn-primary" href="{{ route('owners.create') }}">Prideti savininką</a>
    <a class="btn btn-primary" href="{{ route('cars.index') }}">Mašinos</a>
    <table class="table">
        <thead>
        <tr>
            <th>Vardas</th>
            <th>Pavardė</th>
        </tr>
        </thead>
        <tbody>
        @foreach($owners as $owner)
            <tr>
                <td>{{ $owner->name }}</td>
                <td>{{ $owner->surname }}</td>
                <td><a class="btn btn-success" href="{{ route('owners.edit', $owner->id) }}">Koreguoti</a> </td>
                <td>
                    <form action="{{ route('owners.destroy', $owner->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Ištrinti</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

