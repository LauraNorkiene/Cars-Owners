@extends('layouts.main')
@section('content')


    <form action="{{ route('owners.store') }}" method="post">
        @csrf

        <div  class="mb-3">
            <label class="form-label">Vardas:</label>
            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name">
            @error('name')
            @if ($errors->has('name'))
                @foreach($errors->get('name') as $error)
                    {{ $error }} <br>
                @endforeach
                @enderror
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Pavardė:</label>
            <input class="form-control @error('surname') is-invalid @enderror" type="text" name="surname">
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
            <input class="form-control @error('email') is-invalid @enderror" type="text" name="email">
            @error('email')
            @if ($errors->has('email'))
                @foreach($errors->get('email') as $error)
                    {{ $error }} <br>
                @endforeach
                @enderror
            @endif
        </div>
        <div  class="mb-3">
            <label class="form-label">Telefono numeris:</label>
            <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone">
            @error('phone')
            @if ($errors->has('phone'))
                @foreach($errors->get('phone') as $error)
                    {{ $error }} <br>
                @endforeach
                @enderror
            @endif
        </div>

        <button class="btn btn-primary">Pridėti</button>
    </form>
@endsection
