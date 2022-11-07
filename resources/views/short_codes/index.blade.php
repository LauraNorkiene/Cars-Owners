@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        @can('create', \App\Models\ShortCode::class)
                        <a class="btn btn-primary" href="{{ route('short_codes.create') }}">Pridėti trumpinį</a>
                        @endcan
                        <a class="btn btn-primary" href="{{ route('cars.index') }}">Mašinos</a>
                        <a class="btn btn-primary" href="{{ route('owners.index') }}">Savininkai</a>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Trumpinys</th>
                                <th>Keisti į</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($shortCode as $code)
                                <tr>

                                    <td>{{ $code->shortcode}}</td>
                                    <td>{{ $code->replace}}</td>
                                    @can('update', $shortCode)
                                    <td><a class="btn btn-success" href="{{ route('short_codes.edit', $code->id) }}">Koreguoti</a> </td>
                                    <td>
                                        @endcan
                                        @can('delete', $shortCode)
                                        <form action="{{ route('short_codes.destroy', $code->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Ištrinti</button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
