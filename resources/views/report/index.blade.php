@extends('layouts.oldapp')
@section('content')
    @isset ( $title )
        <h1>{{ $title }}</h1>
    @endisset
    <div class="shadow card w-100">
        <div class="card-header">
            {{ Form::open(['action'=>'ReportController@index', 'method'=>'GET'])}}
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
                <div class="col-sm-3">
                    <div class="form-group w-100">
                        {{ Form::label('from', 'From', ['class'=>'font-weight-bold']) }}<span style="color:#cc0000;font-weight:bold;">*</span>
                        {{ Form::input('date', 'from', date('Y-m-d'), ['class'=>'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group w-100">
                        {{ Form::label('to', 'To', ['class'=>'font-weight-bold']) }}<span style="color:#cc0000;font-weight:bold;">*</span>
                        {{ Form::input('date', 'to', date('Y-m-d'), ['class'=>'form-control', 'required']) }}
                    </div>
                </div>
                <div class="col-sm-3">
                    {{ Form::submit('Continue', ['class' => 'btn btn-primary px-4 py-2']) }}
                </div>
                @isset($challans)
                    @if (count($challans) > 0)
                    <div class="col-sm-6">
                        <a href="/report/print" class="btn btn-primary px-4 py-2">Print <i class="fas fa-file-pdf fa-sm"></i></a>
                    </div>
                    @endif
                @endisset
            </div>



            {{ Form::close() }}

        </div>
        <div class="p-3 card-body">
            <div class="table-responsive-lg">
                <table class="table table-striped table-bordered" id="challans" width="100%" cellspacing="0">
                    <thead>
                        <th>Challan</th>
                        <th>Date</th>
                        <th>Amount</th>
                    </thead>
                    @isset($challans)
                        @if (count($challans) > 0)
                            @foreach ($challans as $challan)
                                <tr>
                                    <td>{{ $challan->name }}</td>
                                    <td>{{ date('d M Y', strtotime($challan->date)) }}</td>
                                    <td>{{ $challan->amount }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endisset
                </table>
            </div>
        </div>
    </div>
@endsection
