@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            {{-- <a type="" href={{ 'reviews.cars' }}
                class="btn btn btn-primary ">Back</a> --}}
                {{-- <br><br> --}}
            <div class="panel-heading">CAR REVIEWS</div>
            <div class="panel-body">
                <p></p>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Review</th>
                        <th scope="col">Car Make</th>
                        <th scope="col">Car Model</th>
                        <th scope="col">Produced On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reviews as $review)
                    <tr>
                        <td>{{$review->review}}</td>
                        <td>{{$review->cars->make}}</td>
                        <td>{{$review->cars->model}}</td>
                        <td>{{$review->created_at}}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
            <a type="" href={{ route('reviews.create', $review->cars->id) }}
                class="btn btn btn-primary btn-lg btn-block">Write new review</a>
        
        </div>
    </div>
</div>
@endsection