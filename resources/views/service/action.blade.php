@extends('admin.layout.master')
@section('title','Add New Service')
@section('admin.content')
    <div class="row">
        <!-- Basic example -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Service</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{isset($userInfo) && !empty($userInfo)? route('service.update',$userInfo->id) : route('service.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Service Name</label>
                                    <input type="text" class="form-control" name="name" value="{{isset($userInfo) && !empty($userInfo)?$userInfo->name:''}}" id="" placeholder="Enter name">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <input type="number" class="form-control" name="price" value="{{isset($userInfo) && !empty($userInfo)?$userInfo->price:''}}" id="exampleInputPassword1"
                                           placeholder="Enter price">
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col control-label">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="{{ ACTIVE_STATUS }}" {{ isset($userInfo) && !empty($userInfo) && $userInfo->status == ACTIVE_STATUS ? 'selected' : '' }}>Active</option>
                                        <option value="{{ INACTIVE_STATUS }}" {{ isset($userInfo) && !empty($userInfo) && $userInfo->status == INACTIVE_STATUS ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit <i
                                class="md-add-circle-outline"></i></button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div> <!-- col-->

    </div> <!-- End row -->
@endsection
@push('custom.js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datatable').dataTable();
        });
    </script>
@endpush
