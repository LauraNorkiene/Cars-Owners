@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div> Car galery </div>
                        <div class="d-flex">
                            <form action="{{ route('images.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 d-flex">
                                    <label for="" class="form-label mx-2"></label>
                                    <input type="hidden" name="car_id" value="{{$car->id}}">
                                    <input type="file" class="form-control mx-2" name="image">
                                    <div>
                                        <button class="btn btn-success">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div> <a class="btn btn-primary float-end mx-2"
                                 href="{{ route('cars.index') }}">Back to cars</a></div>

                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Valstybiniai numeriai</th>
                            <th>Automobilio markė</th>
                            <th>Automobilio modelis</th>
                            <th>Savininkas</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>

                            <td>{{ $car->reg_number }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            <td>
                                {{ $car->owner->name }}
                                {{ $car->owner->surname }}
                            </td>
                            {{--                                <td><a class="btn btn-success" href="{{ route('cars.edit', $car->id) }}">Update</a></td>--}}
                            {{--                                <td>--}}
                            {{--                                    <form action="{{ route('cars.destroy', $car->id) }}" method="post">--}}
                            {{--                                        @csrf--}}
                            {{--                                        @method('DELETE')--}}
                            {{--                                        <button class="btn btn-danger">Delete</button>--}}
                            {{--                                    </form>--}}
                            {{--                                </td>--}}
                        </tr>


                        </tbody>
                    </table>
                    <div class="d-flex flex-wrap justify-content-between">
                        @foreach($images as $image)
                            @if ($image->car_id == $car->id)
                                <div class="d-flex flex-column position-relative ">
                                    <div class="">
                                        <img class="mb-2" src="{{ route('image.cars',$image->name) }}"
                                             style=" width: 200px; height: 200px;">
                                    </div>
                                    <div class="ms-2 position-absolute">
                                        <form action="{{ route('images.destroy', $image->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger text-dark fw-bold">X</button>
                                        </form>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
