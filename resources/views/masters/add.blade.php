@extends('layouts.oldapp')
@section('content')

    <div class="shadow card w-100">
        <div class="card-header">
            @isset ( $title )
                <h1>{{ $title }}</h1>
            @endisset
        </div>
        <div class="p-4 card-body">
            {{ Form::open(['action'=>'MasterController@store','method'=>'post']) }}
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group w-100">
                            {{ Form::label('name', 'Master Name', ['class'=>'font-weight-bold',]) }} <span style="color:#cc0000;font-weight:bold;">*</span>
                            {!! Form::text('name', '', ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group w-100">
                            {{ Form::label('prefix', 'Prefix', ['class'=>'font-weight-bold',]) }} <span style="color:#cc0000;font-weight:bold;">*</span>
                            {!! Form::text('prefix', '', ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            {!! Form::label('address', 'Address', ['class'=>'font-weight-bold']) !!} <span style="color:#cc0000;font-weight:bold;">*</span>
                            {!! Form::textarea('address', '', ['class'=>'form-control', 'required']) !!}
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary px-4 py-2']) !!}
                    </div>
            </div>
        </div>
    </div>



@endsection
