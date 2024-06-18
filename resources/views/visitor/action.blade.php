@extends('admin.layout.master')
@section('title','Add New Visitor')
@section('admin.content')
    <div class="row">
        <!-- Basic example -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Lead</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{isset($userInfo) && !empty($userInfo)? route('visitor.update',$userInfo->id) : route('visitor.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Lead Name</label>
                                    <input type="text" class="form-control" name="name" value="{{isset($userInfo) && !empty($userInfo)?$userInfo->name:''}}" id="" placeholder="Enter name">
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Location</label>
                                    <input type="email" class="form-control" value="{{isset($userInfo) && !empty($userInfo)?$userInfo->location:''}}" name="location" id="exampleInputPassword1"
                                           placeholder="Enter email">
                                    @error('location')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{isset($userInfo) && !empty($userInfo)?$userInfo->phone:''}}" id="exampleInputPassword1"
                                           placeholder="Enter phone">
                                    @error('phone')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col control-label">Source</label>

                                    <select name="source" class="form-control">
                                        <option value="">Select Lead Source</option>

                                    @foreach(sourceArray as $key => $val)
                                            <option value="{{$key}}" {{isset($userInfo) && !empty($userInfo) && $userInfo->source == $key ?'selected':''}}>{{$val}}</option>

                                        @endforeach
                                    </select>
                                    @error('source')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Data</label>
                                    <input type="date" class="form-control" name="contact_date" value="{{isset($userInfo) && !empty($userInfo)?\Illuminate\Support\Carbon::parse($userInfo->contact_date)->format('Y-m-d'):''}}" id="exampleInputPassword1"
                                           placeholder="Enter date of join">
                                </div>
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
