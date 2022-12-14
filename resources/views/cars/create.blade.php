@extends('layouts.main')
@section('content')


    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div  class="mb-3">
            <label class="form-label">Registracijos numeris:</label>
            <input class="form-control @error('reg_number') is-invalid @enderror" type="text" name="reg_number" value="{{ old('reg_number') }}">
            @error('reg_number')
            @if ($errors->has('reg_number'))
                @foreach($errors->get('reg_number') as $error)
                    {{ $error }} <br>
                @endforeach
                    @enderror
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Markė:</label>
            <input class="form-control @error('brand') is-invalid @enderror" type="text" name="brand" value="{{ old('brand') }}">
            @error('brand')
              @if ($errors->has('brand'))
                @foreach($errors->get('brand') as $error)
                    {{ $error }} <br>
                @endforeach
                    @enderror
            @endif
        </div>


        <div class="mb-3">
            <label class="form-label">Modelis:</label>
            <input class="form-control @error('model') is-invalid @enderror" type="text" name="model" value="{{ old('model') }}">
            @error('model')
              @if ($errors->has('model'))
                @foreach($errors->get('model') as $error)
                    {{ $error }} <br>

                @endforeach
                    @enderror
            @endif
        </div>


        <div class="mb-3">
            <label class="form-label">Savininkas:</label>
            <select name="owner_id" class="form-control">
                @foreach ($owners as $owner)
                    <option value="{{ $owner->id }}"@selected(old('$owner_id')==$owner->id)> {{$owner->name}}</option>

                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Automobilio nuotrauka:</label>
            <input type="file" class="form-control" name="image">
        </div>



        <button class="btn btn-primary">Pridėti</button>
        <a class="btn btn-success mx-3 float-end" href="{{ route('cars.index') }}">Atgal</a>
    </form>
@endsection
