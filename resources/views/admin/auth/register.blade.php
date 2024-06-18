@extends('admin.auth.layout.master')
@section('title','Register')
@section('admin.auth')

    <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img">
            <div class="bg-overlay"></div>
            <h3 class="text-center m-t-10 text-white"> Create a new Account </h3>
        </div>


        <div class="panel-body">
            <form class="form-horizontal m-t-20" action="index.html">

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="name" class="form-control input-lg" type="text" required="" placeholder="Name">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="email" class="form-control input-lg" type="email" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="phone" class="form-control input-lg" type="text" required="" placeholder="Phone Number">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="password" class="form-control input-lg" type="password" required="" placeholder="Password">
                    </div>
                </div>

{{--                <div class="form-group ">--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <div class="checkbox checkbox-primary">--}}
{{--                            <input id="checkbox-signup" type="checkbox" checked="">--}}
{{--                            <label for="checkbox-signup">--}}
{{--                                I accept <a href="#">Terms and Conditions</a>--}}
{{--                            </label>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}

                <div class="form-group text-center m-t-40">
                    <div class="col-xs-12">
                        <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                    </div>
                </div>

                <div class="form-group m-t-30">
                    <div class="col-sm-12 text-center">
                        <a href="{{route('admin.auth.login')}}">Already have account?</a>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection
