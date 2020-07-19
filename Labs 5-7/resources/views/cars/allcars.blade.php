@extends('layouts.app')

@section('content')
<main role="main" class="container">
    <div class="text-center mb-4">
        <h4>ALL CARS</h4>
    </div>
    <div class="float-left">
    </div>
    <div>
        <table id="cars" class="table">
                <tr>
                    <th scope="col">Car ID</th>
                    <th scope="col">Make</th>
                    <th scope="col">Model</th>
                    <th scope="col">Date of Production</th>
                    <th scope="col">Review</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['cars']) > 0)
                @foreach ($data['cars'] as $car)
                <tr>
                    <td>{{$car->id}}</td>
                    <td>{{$car->make}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->produced_on}}</td>
                    <td><a type="" href={{ route('reviews.create', $car->id) }} class="btn btn-sm btn-primary">Review</a></td>
                </tr>

                @endforeach
                @else

                @endif

            </tbody>
        </table>
    </div>
</main>
@endsection