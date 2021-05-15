@extends('layouts.oldapp')
@section('content')
    @isset ( $title )
        <h1>{{ $title }}</h1>
    @endisset
        <div class="card">
            <div class="card-header">

            </div>
            <div class="p-3 card-body">
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-striped" id="masters" width="100%" cellspacing="0">
                        <thead>
                            <th>Master Details</th>
                            <th>Address</th>
                            <th>Prefix</th>
                        </thead>
                        @if (count($masters) > 0)
                            @foreach ($masters as $master)
                                <tr>
                                    <td>{{ $master->name }}
                                        <br>
                                        <button class="btn btn-sm btn-warning"><i class="fas fa-pen fa-sm"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash fa-sm"></i></button>
                                    </td>
                                    <td>
                                        {{$master->address}}
                                    </td>
                                    <td>
                                        {{$master->prefix}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center" >No Masters Yet. Go to "Add" in Masters to add a master.</td>
                            </tr>
                        @endif
                        <tfoot>
                            <tr colspan="3">
                                {{ $masters->links() }}
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
@endsection
