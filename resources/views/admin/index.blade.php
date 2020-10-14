<x-admin-master>

    @section('content')

        @if(auth()->user()->is_Admin==0)
            {{-- <h1>Welcome {{auth()->user()->name}}</h1>
            {{-- <h4 class="h3 mb-4 text-gray-800">{{__('admin-master.You_do_not_have_permission_to_perform_operations')}}</h4> --}}
            {{-- <p>{{__('admin-master.We_provide_best_quality_products_to_our_customers_we_are_going_to_start_subscription_for_our_daily_customers_soon_which_will_help_us_to_maintain_a_good_relationship_between_us')}}</p> --}}

            <div class="row mb-3">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row bg-primary text-white">
                                <div class="col-xs-3">
                                    <i class="fas fa-shopping-cart fa-4x mt-2 ml-1"></i>
                                </div>
                                <div class="col-xs-9">
                                <div class='huge text-center'>{{$supplies->sum('quantity')}}</div>
                                    <div>Current Month Purchase</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-rupee-sign fa-4x mt-2 ml-3"></i>
                                </div>
                                <div class="col-xs-9">
                                <div class='huge text-center'>{{$invoices->sum('price')}}</div>
                                <div class="ml-2">Current Month Amount</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-rupee-sign fa-4x mt-2 ml-3"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class='huge text-center'>{{$invoices->sum('due_amount')}}</div>
                                    <div class="ml-2"> Due Amount</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-shopping-cart fa-4x mt-2 ml-3"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class='huge text-center'>{{$supplies->sum('quantity')}}</div>
                                    <div class="ml-2">Total Purchases</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Day', 'Quanity'],
                        @php
                            foreach($supplies as $supply) {
                                echo "['".$supply->created_at->format('M')."', ".$supply->quantity."],";
                            }
                        @endphp
                    ]);


                    var options = {
                        chart: {
                        title: 'My Purchases Flow',
                        subtitle: 'Products, Expenses',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <table class="table">
                        <h1>Recent Supplies</h1>
                        <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Slot</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplies as $supply)
                                <tr>
                                    <th scope="row">{{ $supply->id }}</th>
                                    <td>{{ $supply->product_name }}</td>
                                    <td>{{ $supply->date }}</td>
                                    <td>{{ $supply->slot }}</td>
                                    <td>{{ $supply->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        @if(auth()->user()->is_Admin==1)
            {{-- <h1>Welcome {{auth()->user()->name}}</h1>
            {{-- <h4 class="h3 mb-4 text-gray-800">{{__('admin-master.You_have_permission_to_perform_operations')}}</h4> --}}
            {{-- <p>{{__('admin-master.We_provide_best_quality_products_to_our_customers_we_are_going_to_start_subscription_for_our_daily_customers_soon_which_will_help_us_to_maintain_a_good_relationship_between_us')}}</p>
            --}}


            <!-- /.row -->

            <div class="row mb-3">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row bg-primary text-white">
                                <div class="col-xs-3">
                                    <i class="fas fa-blender fa-4x mt-2 ml-1"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class='huge text-center'>{{ $productions->sum('quantity')}}</div>
                                    <div>Current Month Production</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-rupee-sign fa-4x mt-2 ml-3"></i>
                                </div>
                                <div class="col-xs-9">
                                <div class='huge text-center'>{{ $invoices->sum('due_amount')}}</div>
                                <div class="ml-2">Last Month Due</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x px-3"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class='huge text-center'>{{auth()->user()->count()}}</div>
                                    <div class="ml-2"> Total Customers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fas fa-blender fa-4x mt-2 ml-3"></i>
                                </div>
                                <div class="col-xs-9">
                                    <div class='huge text-center'>{{ $productions->sum('quantity')}}</div>
                                    <div class="ml-2">Total Production</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Supply Slot', 'User Id', 'Quanity'],
                        @php
                            foreach($supplies as $supply) {
                                echo "['".$supply->slot."', ".$supply->user_id.", ".$supply->quantity."],";
                            }
                        @endphp
                    ]);

                    var options = {
                        chart: {
                        title: 'Supply Flow',
                        subtitle: 'Slots, Users, and Quanity',
                        }
                    };

                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
            </div>
            <div class="row mt-3">
                <div class="col">
                    <table class="table">
                        <h1>Recent Orders</h1>
                        <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Slot</th>
                                <th scope="col">Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplies as $supply)
                                <tr>
                                    <th scope="row">{{ $supply->id }}</th>
                                    <td>{{ $supply->product_name }}</td>
                                    <td>{{ $supply->name}}</td>
                                    <td>{{ $supply->date }}</td>
                                    <td>{{ $supply->slot }}</td>
                                    <td>{{ $supply->quantity }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col">
                    <table class="table">
                        <h1>Latest Customers</h1>
                        <thead>
                            <tr>
                                <th scope="col">Sr#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->address}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->created_at->format('d-m-Y')}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    @endsection
</x-admin-master>
