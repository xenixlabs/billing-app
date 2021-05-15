@extends('layouts.oldapp')
@section('content')
    <div class="shadow card w-100">
        <div class="card-header">
            <h3>{{ $title }}</h3>
        </div>
        <div class="p-4 card-body">
            {!! Form::open(['action' => 'ChallanController@store', 'method' => 'post']) !!}
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group w-100">
                        {{ Form::label('masters', 'Select Customer Name', ['class'=>'font-weight-bold',]) }} <span style="color:#cc0000;font-weight:bold;">*</span>
                        <select name="customer_id" id="customer_id" class="form-control" required>
                            @if (count($masters)>0)
                                @foreach ($masters as $master)
                                    <option value='{{$master->id}}'>{{$master->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group w-100">
                        {{ Form::label('date', 'Challan Date', ['class'=>'font-weight-bold']) }}<span style="color:#cc0000;font-weight:bold;">*</span>
                        {{ Form::input('date', 'date', date('Y-m-d'), ['class'=>'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        {!! Form::label('remarks', 'Remarks', ['class'=>'font-weight-bold']) !!}
                        {!! Form::textarea('remarks', '', ['class'=>'form-control']) !!}
                    </div>
                </div>
                <br>
                <br>
                <div class="col-sm-12">
                    {!! Form::submit('Continue', ['class' => 'btn btn-primary px-4 py-2']) !!}
                </div>
            </div>

        {!! Form::close() !!}
        </div>

    </div>
@endsection
