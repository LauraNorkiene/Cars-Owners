@extends('layouts.main')
@section('content')


    <form action="{{ route('owners.update', $owner->id) }}" method="post">
        @csrf
        @method('PUT')

        <div  class="mb-3">
            <label class="form-label">Vardas:</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"  value="{{ $owner->name }}">
            @error('name')
            @if ($errors->has('name'))
                @foreach($errors->get('name') as $error)
                    {{ $error }} <br>
                @endforeach
                @enderror
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Pavardė:</label>
            <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname" value="{{ $owner->surname }}">
            @error('surname')
            @if ($errors->has('surname'))
                @foreach($errors->get('surname') as $error)
                    {{ $error }} <br>
                @endforeach
                @enderror
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Elektroninis paštas:</label>
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email"  value="{{ $owner->email }}">
            @error('email')
            @if ($errors->has('email'))
                @foreach($errors->get('email') as $error)
                    {{ $error }} <br>
                @endforeach
                @enderror
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Telefono numeris:</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ $owner->phone }}">
            @error('phone')
            @if ($errors->has('phone'))
                @foreach($errors->get('phone') as $error)
                    {{ $error }} <br>
                @endforeach
                @enderror
            @endif
        </div>


        <button class="btn btn-primary">Atnaujinti</button>
    </form>
    <table class="table">

{{--        @foreach($owner->cars as $car)--}}
{{--            <tr>--}}
{{--                <td>{{$car->reg_number}}</td>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
    </table>
    <h5>Pridėti mašiną:</h5>
    <form action="{{route('owners.addCar', $owner->id)}}" method="post">
        @csrf
        <div class="mb-3">
            <label class="form-labale">Mašinos registracijos numeris</label>
            <input type="text" class="form-control" name="reg_number">
        </div>
        <button class="btn btn-primary">Atnaujinti</button>

    </form>
@endsection
