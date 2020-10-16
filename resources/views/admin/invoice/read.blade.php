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
            <div class="table table-responsive">
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Total Quantity</th>
                            <th>Price </th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Due Amount</th>
                            <th>Is Paid</th>
                            <th>Payment Mode</th>
                            <th>Payment Received By</th>
                            <th>Created By</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Total Quantity</th>
                            <th>Price </th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Due Amount</th>
                            <th>Is Paid</th>
                            <th>Payment Mode</th>
                            <th>Payment Received By</th>
                            <th>Created By</th>
                            <th>Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
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
                                <td>{{ $invoice->is_paid }}</td>
                                <td>{{ $invoice->payment_mode }}</td>
                                <td>{{ auth()->user()->name }}</td>
                                <td>{{ auth()->user()->name }}</td>
                                <td>
                                    <form action="{{route('invoice.destroy', $invoice->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    <button class="btn btn-danger" type="submit">{{__('admin-master.delete')}}</button>
                                    </form>
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
