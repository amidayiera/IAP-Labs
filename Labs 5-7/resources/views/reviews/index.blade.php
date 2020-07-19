@extends('layouts.app')

@section('content')
<section id="">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mx-auto">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif

            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="panel panel-default">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Cars with Reviews</div>
                    <div class="panel-body">
                        <p></p>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Car Model</th>
                                <th scope="col">Car Make</th>
                                <th scope="col">Review</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviews as $review)
                            <tr>
                                <th scope="row">{{ $review->id }}</th>
                                <td>{{ $review->cars->model }}</td>
                                <td>{{ $review->cars->make }}</td>
                                <td>{{ $review->review }}</td>
                                <td><a type="" href={{ route('cars.show', $review->car) }} class="btn btn-sm btn-primary ">Details</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection