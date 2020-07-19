@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h4 class="mb-2 text-center">New Car</h4>
        {{ Form::open(['action'=>'CarController@newcar','method'=>'POST','class'=>'centered']) }}
            <div class="">
                <div class="col">
                    <div class="form-group">
                        {{Form::label('make', 'Make')}}
                        {{Form::text('make','',['class'=>'form-control','placeholder'=>'Make'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {{Form::label('model', 'Model')}}
                        {{Form::text('model','',['class'=>'form-control','placeholder'=>'Model'])}}
                    </div>
                </div>
            </div>

            <div class="">
                <div class="col">
                    <div class="form-group">
                        {{Form::label('produced_on', 'Produced On')}}
                        {{Form::date('produced_on','',['class'=>'form-control','placeholder'=>'Produced On'])}}
                    </div>
            </div>
            </div>
           
            <div class="">
                <div class="col">
                    <div class="form-group text-center">
                        {{Form::submit('Add Car',['class'=>'btn btn-primary btn-lg btn-block'])}}
                    </div>
                </div>
            </div>
            
        {{ Form::close() }}
        
    </div>
@endsection