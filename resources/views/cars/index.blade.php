@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        @can('create', \App\Models\Car::class)
   <a class="btn btn-primary" href="{{ route('cars.create') }}">{{__('Prideti mašiną')}}</a>
                        @endcan
                            <a class="btn btn-primary" href="{{ route('owners.index') }}">{{__('Savininkai')}}</a>
                        <a class="btn btn-primary" href="{{ route('short_codes.index') }}">{{__('Trumpiniai')}}</a>
    <table class="table">
        <thead>
        <tr>
            <th>{{__('Automobilio nuotrauka')}}</th>
            <th>{{__('Nuotraukų galerija')}}</th>
            <th>{{__('Registracijos numeris')}}</th>
            <th>{{__('Markė')}}</th>
            <th>{{__('Modelis')}}</th>
            <th>{{__('Savininkas')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cars as $car)
            <tr>
                    <td>
                        @foreach($images as $image)
                            @if ($image->car_id == $car->id)
                                <img src="{{ route('image.cars',$image->name) }}" style=" width: 150px; height: 150px;">
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td> <a class="btn btn-primary " href="{{ route('cars.show', $car->id) }}">{{__('Galerija')}}</a></td>
                <td>{{ $car->reg_number }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->owner->name }}</td>
                <td>{{ $car->owner->surname }}</td>
                @can('update', $car)
                <td><a class="btn btn-success" href="{{ route('cars.edit', $car->id) }}">{{__('Koreguoti')}}</a> </td>
                <td>
                    @endcan
                    @can('delete', $car)
                    <form action="{{ route('cars.destroy', $car->id) }}" method="post">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">{{__('Ištrinti')}}</button>
                        @endcan
                    </form>
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
