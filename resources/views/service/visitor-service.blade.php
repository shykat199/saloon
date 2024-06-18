@extends('admin.layout.master')
@section('title','Visitor Service')
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
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                    data-target="#custom-width-modal">Add New <i class="md-add-circle-outline"></i></button>
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="overflow-x:auto;">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Visitor Name</th>
                                    <th>Service Name</th>
                                    <th>Total Amount</th>
                                    <th>Amount Paid</th>
                                    <th>Amount Due</th>
                                </tr>
                                </thead>

                                <tbody>
                                @if(!empty($empList))
                                    @foreach($empList as $key => $item)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$item->visitor->name}}</td>
                                            <td>{!! getServiceName(explode('<||>',$item->service_id)) !!}</td>
                                            <td>{{$item->total_amt}}</td>
                                            <td>{{$item->paid_amt}}</td>
                                            <td>{{$item->due_amt}}</td>
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

    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog"
         aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" style="width:55%;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="custom-width-modalLabel">Create Visitor Service</h4>
                </div>
                <form role="form" method="post" action="{{route('service.visitor.store')}}">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label class="col control-label">Visitor Name</label>
                            <select name="visitor" class="form-control" required>
                                <option value="">Select Visitor</option>
                            @foreach($visitors as $key => $visitor)
                                    <option value="{{ $visitor->id }}">{{$visitor->name}}</option>

                                @endforeach
                            </select>
                            @error('visitor')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <label class="col control-label">Service List</label>

                        @foreach($chunks as $chunk)
                            <div class="row">
                                @foreach($chunk as $service)
                                    <div class="col-md-2">
                                        <div class="checkbox checkbox-primary">
                                            <input class="serviceId" name="serviceId[]" value="{{ $service->id }}" id="checkbox{{ $service->id }}" type="checkbox" data-servicePrice="{{ $service->price }}">
                                            <label for="checkbox{{ $service->id }}">{{ $service->name }} - Price:{{ $service->price }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach


                        <div class="form-group">
                            <label for="exampleInputEmail1">Total Price</label>
                            <input type="text" class="form-control" name="totalPrice" id="totalPrice" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Paid Amount</label>
                            <input type="number" class="form-control" name="paidAmt" id="paidAmt">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Due Amount</label>
                            <input type="number" class="form-control" name="dueAmt" id="dueAmt" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@push('custom.js')
    <script type="text/javascript">

        $(document).ready(function () {
            $('#datatable').dataTable({
                searching: true
            });
        });

        function deleteItem(url) {
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
