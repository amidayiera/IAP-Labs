@extends('layouts.app')

@section('content')
<section id="student-form">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                {{-- <h>Write Review</h2> --}}
                <form action="/reviews" method="post">
                    @csrf
                    <input id="car_id" name="car" type="hidden" class="form-control-plaintext" value="{{ $car_id }}">
{{-- 
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ $review->cars->make}}">
                        </div>
                      </div> --}}
                    <br><br>
                    <div class="form-group">
                        <label for="review">Write Review:</label>
                        <textarea class="form-control" rows="5" id="review" name="review"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
                    <br>
                    <br>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>
                            @foreach($errors->all() as $error)
                            {{$error}}
                            @endforeach
                        </strong>
                    </div>
                    @endif

                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</section>
@endsection