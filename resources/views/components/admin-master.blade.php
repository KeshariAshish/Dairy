<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- Custom styles for this template-->
  <link href="{{asset('css/sb-admin-2.css')}}" rel="stylesheet">
  <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">
  <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="https://code.jquery.com/jquery-2.0.2.min.js" integrity="sha256-TZWGoHXwgqBP1AF4SZxHIBKzUdtMGk0hCQegiR99itk=" crossorigin="anonymous"></script>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text">Dairy Hub</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
        @if(auth()->user()->is_Admin==0)
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.index')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{__('admin-master.Dashboard')}}</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('production.read')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{__('admin-master.Order_Histroy')}}</span></a>
            </li>
        @endif
        <!-- Divider -->
        <hr class="sidebar-divider">

        @if(auth()->user()->is_Admin==1)
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.index')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{__('admin-master.Dashboard')}}</span></a>
            </li>
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fa fa-user"></i>
                <span>{{__('admin-master.Users')}}</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="{{route('admin.create')}}">{{__('admin-master.Create_Users')}}</a>
                    <a class="collapse-item" href="{{route('admin.read')}}">{{__('admin-master.View_All_Users')}}</a>
                </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-coffee"></i>
                <span>{{__('admin-master.Products')}}</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Products:</h6>
                        <a class="collapse-item" href="{{route('product.create')}}">{{__('admin-master.Create_Product')}}</a>
                        <a class="collapse-item" href="{{route('product.read')}}">{{__('admin-master.View_Product')}}</a>
                    </div>

                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>{{__('admin-master.Subscribers')}}</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Subscribers:</h6>
                    <a class="collapse-item" href="{{route('subscriber.create')}}">{{__('admin-master.Create_Subscriber')}}</a>
                    <a class="collapse-item" href="{{route('subscriber.read')}}">{{__('admin-master.View_Subscriber')}}</a>

                </div>
                </div>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fa fa-line-chart"></i>
                <span>{{__('admin-master.Daily_Production')}}</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Subscribers:</h6>
                        <a class="collapse-item" href="{{ route('production.create')}}"> {{__('admin-master.Create_Daily_Entry')}}</a>
                        <a class="collapse-item" href="{{ route('production.read')}}"> {{__('admin-master.View_Entry')}}</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse" aria-expanded="true">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>{{__('admin-master.Stocks')}}</span></a>
                <div id="collapse" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Stock:</h6>
                    <a class="collapse-item" href="{{route('stock.create')}}">{{__('admin-master.Create_Stock')}}</a>
                    <a class="collapse-item" href="{{route('stock.read')}}">{{__('admin-master.View_Stock')}}</a>

                </div>
            </li> --}}

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#supply" aria-expanded="true">
                <i class="fa fa-truck"></i>
                <span>{{__('admin-master.Supply')}}</span></a>
                <div id="supply" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Supply:</h6>
                    <a class="collapse-item" href="{{route('supply.create')}}">{{__('admin-master.Create_Supply')}}</a>
                    <a class="collapse-item" href="{{route('supply.read')}}">{{__('admin-master.View_Supply')}}</a>
                    {{-- <a class="collapse-item" href="{{route('supply.morning')}}">{{__('admin-master.Morning_Supply')}}</a>
                    <a class="collapse-item" href="{{route('supply.evening')}}">{{__('admin-master.Evening_Supply')}}</a> --}}

                </div>
            </li>
             <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item ">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#invoice" aria-expanded="true">
                <i class="fa fa-inr"></i>
                <span>Invoice</span>
                </a>
                <div id="invoice" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Subscribers:</h6>
                    <a class="collapse-item" href="{{ route('invoice.create') }}">Create Invoice</a>
                    <a class="collapse-item" href="{{ route('invoice.read') }}">View Invoices</a>

                </div>
                </div>
            </li>

        @endif   <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

    </ul>


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar static-top" style="margin-bottom: 30px transparent;">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                {{-- <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                    </div>
                </form> --}}

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </li>
                   <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                                @if(Auth::check())

                                {{auth()->user()->name}}

                                @endif
                                </span>
                                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                                </a>
                        </div>
                    </li>

                </ul>

            </nav>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid" style="background-color: #FFFFFF;">

          <!-- Page Heading -->
         @yield('content')

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
            <form action="/logout" method="post">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    @csrf
                    <button class="btn btn-danger">Log out</button>
            </form>
            </div>
      </div>
    </div>
  </div>
  </div>

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Dairy Hub</span>
          </div>
        </div>
      </footer>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('js/sb-admin-2.min.js')}}"></script>


  @yield('scripts')

</body>

</html>
