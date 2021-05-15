@extends('layouts.oldapp')
@section('content')
    @isset ( $title )
        <h1>{{ $title }}</h1>
    @endisset
    <div class="shadow card w-100">
        <div class="card-header">
            <a href="/challan/create" class="btn btn-primary">Add New &nbsp; <i class="fas fa-plus"></i> </a>
            <br>
            <br>
            {!! Form::open(['action'=>'ChallanController@search', 'method'=>'get', 'class'=>'form-inline bg-light  my-md-0 mr-auto mw-100 navbar-search']) !!}
            <div class="input-group">
                {{ Form::input('text', 'search', '', ['class'=>'form-control bg-gray-300 pr-5 border-0 small', 'placeholder'=>'Search', 'aria-label'=>'search']) }}
                <div class="input-group-append">
                    {{ Form::button('<i class="fas fa-search fa-sm"></i>', ['type'=>'submit','class'=>'btn btn-primary']) }}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
        <div class="p-3 card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="challans" width="100%" cellspacing="0">
                    <thead>
                        <th>Challan No.</th>
                        <th>Challan Date</th>
                        <th>Customer Name</th>
                        <th>Net Amount</th>
                        <th>Actions</th>
                    </thead>
                    @if (count($challans)>0)
                        @foreach ($challans as $challan)
                            <tr>
                                <td> <a href="/challan/{{$challan->id}}">{{$challan->name}}</a> </td>
                                <td>{{date('d M Y', strtotime($challan->date))}}</td>
                                <td>{{$challan->master->name}}</td>
                                <td>&#8377; {{$challan->amount}}</td>
                                <td class="d-flex" >
                                    <a href="/challan/{{ $challan->id }}/edit" class="mr-1 btn btn-sm btn-warning"><i class="fas fa-pen fa-sm"></i></a>
                                    <button class="mr-1 btn btn-sm btn-primary"><i class="fas fa-file-pdf fa-sm"></i></button>
                                    <button data-toggle="modal" data-target="#delete{{$challan->id}}" class="mr-1 btn btn-sm btn-danger"><i class="fas fa-trash fa-sm"></i></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="delete{{$challan->id}}" tabindex="-1" aria-labelledby="delete{{$challan->id}}Label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="delete{{$challan->id}}">Are You Sure?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete "{{$challan->name}}"?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            {{ Form::open(['action'=>['ChallanController@destroy', $challan->id], 'method'=>'POST', 'class'=>'d-inline']) }}
                                                {{ Form::hidden('_method', 'DELETE',) }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif


                </table>
            </div>

        </div>
    </div>
@endsection
