@extends('admin.layout.master')
@section('title','Dashboard')
@section('admin.content')
    <!-- Start Widget -->
<style>
    .mini-stat-info-details {
        flex: 1; /* This will make both divs take equal space */
        text-align: center; /* Center the text */
    }
    .mini-stat-info-details span {
        display: block;
        font-size: 24px;
        font-weight: 600;
        color: #555;
    }
    }
</style>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{getTotalSales()}}</span>
                    Total Sales
                </div>
                <div class="row" style="display: flex; justify-content: space-between;margin-top: 15px;">
                    <div class="mini-stat-info-details text-muted">
                        <span class="counter">{{$totalDue->total}}</span>
                        Total Due
                    </div>
                    <div class="mini-stat-info-details text-muted">
                        <span class="counter">{{$totalPaid->total}}</span>
                        Total Paid
                    </div>
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
            <div style="width: 100%; margin: auto;">
                <canvas id="lineChart"></canvas>
            </div>
        </div> <!-- end col -->
    </div> <!-- End row -->


@endsection
@push('custom.js')
    <script>
        const ctx = document.getElementById('lineChart').getContext('2d');
        const lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels), // Passing data from the controller
                datasets: [{
                    label: 'Monthly Sales',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    data: @json($data) // Passing data from the controller
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

@endpush
