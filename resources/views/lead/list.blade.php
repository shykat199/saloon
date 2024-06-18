@extends('admin.layout.master')
@section('title','Lead List')
@section('admin.content')
    <style>
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            height: 100%;
        }

        .btn-custom {
            white-space: nowrap;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto;">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Source</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(!empty($empList))
                                    @foreach($empList as $key => $item)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>{{$item->location}}</td>
                                            <td>{{getSource(sourceArray,$item->source)}}</td>
                                            <td>{{\Carbon\Carbon::parse($item->date)->format('Y-m-d')}}</td>
                                            <td>{{$item->status == 1 ?'Active':'Inactive'}}</td>
                                            <td>
                                                <div class="button-container">
                                                    <a href="{{route('lead.edit-page',$item->id)}}" type="button" class="btn btn-primary btn-custom waves-effect waves-light">
                                                        <i class="md md-border-color"></i>
                                                    </a>
                                                    <button onclick="deleteItem('{{route('lead.delete',$item->id)}}')" type="button" class="btn btn-danger btn-custom waves-effect waves-light">
                                                        <i class="md md-delete"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                @endif

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> <!-- End Row -->
@endsection
@push('custom.js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable({
                searching: true
            });
        } );
        function deleteItem(url){
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                   window.location.href = url
                }
            });
        }

    </script>
@endpush
