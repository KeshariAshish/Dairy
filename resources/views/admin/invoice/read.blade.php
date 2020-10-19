<x-admin-master>

    @section('content')

        <h1>Customers Invoice</h1>
        @if(Session::has('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @endif
        {{-- <form action="#" method="post" class="form-inline">
            @csrf
            @method('DELETE')
            <div class="form-group mr-2">
                <select class="checkBoxArray[]" id="" class="form-control">
                <option value="delete">Delete</option>
                </select>
            </div> --}}

            {{-- <div class="form-group">
                <input type="submit" class="btn-primary">
            </div> --}}
            <div class="d-flex justify-content-end mb-4">
                <a class="btn btn-primary" href="{{ route('invoice.pdf') }}">Export to PDF</a>
            </div>
            <div class="table table-responsive">
                <table class="table table-bordered mt-3" id="dataTable" width="100%"  cellspacing="0">
                    <thead>
                        <tr style="font-size: 15px">
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Total Quantity</th>
                            <th>Price </th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Due Amount</th>
                            {{-- <th>Is Paid</th>
                            <th>Payment Mode</th>
                            <th>Payment Received By</th>
                            <th>Created By</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr style="font-size: 15px;">
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Total Quantity</th>
                            <th>Price </th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Due Amount</th>
                            {{-- <th>Is Paid</th>
                            <th>Payment Mode</th>
                            <th>Payment Received By</th>
                            <th>Created By</th> --}}
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody style="font-size: 13px">
                        @foreach($invoices as $invoice)
                            <tr>
                                <td>{{ $invoice->id }}</td>
                                <td>{{ $invoice->name }}</a></td>
                                <td>{{ $invoice->product_name }}</td>
                                <td>{{ $invoice->total_quantity }}</td>
                                <td>{{ $invoice->price }}</td>
                                <td>{{ $invoice->total_amount }}</td>
                                <td>{{ $invoice->paid_amount }}</td>
                                <td>{{ $invoice->due_amount }}</td>
                                {{-- <td>{{ $invoice->is_paid }}</td>
                                <td>{{ $invoice->payment_mode }}</td>
                                <td>{{ auth()->user()->name }}</td>
                                <td>{{ auth()->user()->name }}</td> --}}
                                <td style="width: 90px">
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{route('invoice.destroy', $invoice->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="fa fa-trash-o" style="border: none; color: red; background: none;"></button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('invoice.edit', $invoice->id) }}">
                                                <button class="fa fa-pencil" style="border: none; color: green; background: none;" aria-hidden="true">
                                                </button>
                                            <a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        {{-- </form> --}}
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/datatables-script.js')}}"></script>

    @endsection
</x-admin-master>
