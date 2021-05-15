@extends('layouts.oldapp')
@section('content')
    <h1>{{ $challan->name }}</h1>

    <div class="card">
        <div class="card-header">
            <div class="flex-row d-block d-md-flex justify-content-between">
                <div>
                    <h5><span class="font-weight-bold">Customer:</span> {{$challan->master->name}}</h5>
                    <p><span class="font-weight-bold">Date:</span> {{ date('d M Y', strtotime($challan->date))}}</p>
                </div>
                <div>
                    {{ Form::open(['action'=>['ChallanController@destroy', $challan->id], 'method'=>'post', 'class'=>'d-inline']) }}
                        {{ Form::hidden('_method', 'DELETE',) }}
                        <button type="submit" class="btn btn-danger">Delete <i class="fas fa-trash fa-sm"></i></button>
                    {{ Form::close() }}

                    <a href="/challan/print/{{$challan->id}}" class="btn btn-primary">Print <i class="fas fa-file-pdf fa-sm"></i></a>
                </div>
            </div>

            <div class="mt-3" >
                {{ Form::open(['action'=>'ChallanController@storeItems', 'method'=>'post']) }}
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group w-100">
                                {{ Form::label('name', 'Item Name', ['class'=>'font-weight-bold']) }}
                                {{ Form::input('text', 'name', null,  ['class'=>'form-control', 'required']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group w-100">
                                {{ Form::label('quantity', 'Quantity', ['class'=>'font-weight-bold']) }}
                                {{ Form::input('number', 'quantity', null,  ['class'=>'form-control', 'required', 'id'=>'qty']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group w-100">
                                {{ Form::label('unit', 'Unit', ['class'=>'font-weight-bold']) }}
                                {{ Form::input('text', 'unit', null,  ['class'=>'form-control', 'required']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group w-100">
                                {{ Form::label('price', 'Rate(Rs.)', ['class'=>'font-weight-bold']) }}
                                {{ Form::input('number', 'price', '',  ['class'=>'form-control', 'required', 'id'=>'rate']) }}
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group w-100">
                                {{ Form::label('amount', 'Total(Rs.)', ['class'=>'font-weight-bold']) }}
                                {{ Form::input('number', 'amount', '',  ['class'=>'form-control', 'required','readonly','id'=>'amount']) }}
                            </div>
                        </div>
                        {{ Form::hidden('challan_id', $challan->id) }}
                        <div class="col-sm-12">
                            {!! Form::submit('Add', ['class' => 'btn btn-primary px-4 py-2']) !!}
                        </div>
                    </div>

                {{ Form::close() }}
            </div>

        </div>
        <div class="p-3 card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="challans" width="100%" cellspacing="0">
                    <thead>
                        <th>Sr No.</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Rate(Rs.)</th>
                        <th>Amount(Rs.)</th>
                    </thead>
                    @if (count($items)>0)
                    <?php
                        $srno=1;
                    ?>
                        @foreach ($items as $item)
                            <tr>
                                <td><?php echo $srno;?></td>
                                <td>{{$item->name}}
                                    <br>
                                    <div class="d-flex" >
                                        <button data-toggle="modal" data-target="#delete{{$item->id}}" class="mr-1 btn btn-sm btn-danger"><i class="fas fa-trash fa-sm"></i></button>
                                    </div>

                                </td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->unit}}</td>
                                <td>{{$item->price}}</td>
                                <td>{{$item->amount}}</td>
                            </tr>
                            <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="delete{{$item->id}}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete{{$item->id}}">Are You Sure</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete the item "{{$item->name}}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            {{ Form::open(['action'=>['ChallanController@deleteItems', $item->id], 'method'=>'POST', 'class'=>'d-inline']) }}
                                                {{ Form::hidden('challan_id', $challan->id) }}
                                                <button type="submit" class="btn btn-danger">Delete</button>

                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php $srno++; ?>
                        @endforeach
                    @endif
                    <tfoot style="background-color:#f2f2f2f2;" >
                        <th colspan="5" >Total Amount (INR)</th>
                        <th>{{$challan->amount}}</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('jscripts')
    <script>
        $('#rate').on('change',function(e){
            $('#amount').val(parseInt($('#rate').val())*parseInt($('#qty').val()))
        })
        $('#qty').on('change',function(e){
            $('#amount').val(parseInt($('#rate').val())*parseInt($('#qty').val()))
        })
</script>
@endsection
