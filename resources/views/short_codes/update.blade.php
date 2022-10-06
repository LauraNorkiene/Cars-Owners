@extends('layouts.main')
@section('content')


    <form action="{{ route('short_codes.update', $shortCode->id) }}" method="post">
        @csrf
        @method('PUT')

        <div  class="mb-3">
            <label class="form-label">Trumpinys:</label>
            <input class="form-control" type="text" name="shortcode"  value="{{ $shortCode->shortcode }}">

        </div>
        <div class="mb-3">
            <label class="form-label">Pakeisti į:</label>
            <input class="form-control" type="text" name="replace" value="{{ $shortCode->replace}}">

        </div>

        <button class="btn btn-primary">Atnaujinti</button>
    </form>
@endsection

