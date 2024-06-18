@extends('admin.layout.master')
@section('title','Dashboard')
@section('admin.content')
    <!-- Start Widget -->

    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{getTotalSales()}}</span>
                    Total Sales
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Sales</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{getTotalVisitor()}}</span>
                    Unique Visitors
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Visitors</h5>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{getTotalEmployee()}}</span>
                    Employee
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Users</h5>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{getTotalService()}}</span>
                    Services
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Services </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="portlet"><!-- /portlet heading -->
                <div class="portlet-heading">
                    <h3 class="portlet-title text-dark text-uppercase">
                        Website Stats
                    </h3>
                    <div class="portlet-widgets">
                        <a href="javascript:;" data-toggle="reload"><i class="ion-refresh"></i></a>
                        <span class="divider"></span>
                        <a data-toggle="collapse" data-parent="#accordion1" href="#portlet1"><i class="ion-minus-round"></i></a>
                        <span class="divider"></span>
                        <a href="#" data-toggle="remove"><i class="ion-close-round"></i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div id="portlet1" class="panel-collapse collapse in">
                    <div class="portlet-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="website-stats" style="position: relative;height: 320px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- /Portlet -->
        </div> <!-- end col -->
    </div> <!-- End row -->


@endsection
