@extends('admin.layout.master')
@section('title','Add New Visitor')
@section('admin.content')
    <div class="row">
        <!-- Basic example -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Add New Visitor</h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="{{isset($userInfo) && !empty($userInfo)? route('visitor.update',$userInfo->id) : route('visitor.store')}}">
                        @csrf
                        @if(isset($userInfo) && !empty($userInfo))
                            <input type="hidden" class="form-control" name="visitorServiceId" value="{{isset($serviceData) && !empty($serviceData)? $serviceData->id:''}}">
                        @endif
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
                                    <input type="text" class="form-control" value="{{isset($userInfo) && !empty($userInfo)?$userInfo->location:''}}" name="location" id="exampleInputPassword1"
                                           placeholder="Enter location">
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
                        <div class="row">
                            <div class="form-group">
                                <label class="col control-label">Service List</label>

                                @foreach($chunks as $chunk)
                                    <div class="row">
                                        @foreach($chunk as $service)
                                            <div class="col-md-2">
                                                <div class="checkbox checkbox-primary">
                                                    <input class="serviceId" name="serviceId[]" {{isset($serviceList) && !empty($serviceList) && in_array($service->id,$serviceList)?'checked':''}} value="{{ $service->id }}" id="checkbox{{ $service->id }}" type="checkbox" data-servicePrice="{{ $service->price }}">
                                                    <label for="checkbox{{ $service->id }}">{{ $service->name }} - Price:{{ $service->price }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Price</label>
                                    <input type="text" class="form-control" name="totalPrice" value="{{!empty($serviceData) ? $serviceData->total_amt:''}}" id="totalPrice" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Due Amount</label>
                                    <input type="number" class="form-control" value="{{!empty($serviceData)?$serviceData->due_amt:''}}" name="dueAmt" id="dueAmt" readonly>
                                    @error('dueAmt')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Paid Amount</label>
                                    <input type="number" class="form-control" value="{{!empty($serviceData)? $serviceData->paid_amt:''}}" name="paidAmt" id="paidAmt">
                                    @error('paidAmt')
                                    <span class="text-danger">{{$message}}</span>
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
    <script src="{{asset('admin/assets/select2/select2.min.js')}}"></script>
    <script>
        $(".select2").select2({
            width:'100%'
        });
        $(document).ready(function() {

            $('input[name="serviceId[]"]').change(function() {
                var totalPrice = 0;
                var maxPrice = 0;
                var price;

                $('input[name="serviceId[]"]:checked').each(function() {
                    price = parseFloat($(this).attr('data-servicePrice'));
                    totalPrice += price;
                    if (price > maxPrice) {
                        maxPrice = price;
                    }
                });
                $('#totalPrice').val(totalPrice.toFixed(2));


            });

            $('#paidAmt').keyup(function() {
                let paidAmt = $(this).val();
                var totalPrice = parseFloat($('#totalPrice').val());

                if (!isNaN(totalPrice) && !isNaN(paidAmt)) {
                    if (paidAmt > totalPrice) {
                        paidAmt = totalPrice;
                        $(this).val(paidAmt.toFixed(2));
                    }
                    var dueAmount = totalPrice - paidAmt;
                    if(dueAmount > 0){
                        $('#dueAmt').val(dueAmount.toFixed(2));
                    }else{
                        $('#dueAmt').val(0);
                    }
                }

            });
        });
    </script>
@endpush
