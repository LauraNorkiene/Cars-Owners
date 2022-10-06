@extends('layouts.main')
@section('content')


    <form action="{{ route('short_codes.store') }}" method="post">
        @csrf
        <div  class="mb-3">
            <label class="form-label">Trumpinys:</label>
            <input class="form-control" type="text" name="shortcode">

        </div>
        <div class="mb-3">
            <label class="form-label">Pakeisti į:</label>
            <input class="form-control" type="text" name="replace">

        </div>



        <button class="btn btn-primary">Pridėti</button>
    </form>
@endsection

