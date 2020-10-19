<x-admin-master>

    @section('content')

        <h1>{{__('admin-master.see_products')}}</h1>
        @if(Session::has('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @endif

        {{-- <form action="{{route('product.delete')}}" method="post" class="form-inline">
            @csrf
            @method('DELETE')
            <div class="form-group mr-2">
                <select class="checkBoxArray[]" id="" class="form-control">
                <option value="delete">{{__('admin-master.delete')}}</option>
                </select>
            </div>

            <div class="form-group">
                <input type="submit" class="btn-primary" value="{{__('admin-master.delete')}}">
            </div> --}}

            <div class="table table-responsive">
                <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr style="font-size: 15px">
                        {{-- <th><input type="checkbox" id="options"></th> --}}
                        <th>{{__('admin-master.Id')}}</th>
                        <th>{{__('admin-master.name')}}</th>
                        <th>{{__('admin-master.price')}}</th>
                        <th>{{__('admin-master.product_unit')}}</th>
                        <th>{{__('admin-master.active_customer')}}</th>
                        <th>{{__('admin-master.customer_name')}}</th>
                        <th>{{__('admin-master.created_at')}}</th>
                        <th>{{__('admin-master.updated_at')}}</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr style="font-size: 15px">
                        {{-- <th><input type="checkbox" id="options"></th> --}}
                        <th>{{__('admin-master.Id')}}</th>
                        <th>{{__('admin-master.name')}}</th>
                        <th>{{__('admin-master.price')}}</th>
                        <th>{{__('admin-master.product_unit')}}</th>
                        <th>{{__('admin-master.active_customer')}}</th>
                        <th>{{__('admin-master.customer_name')}}</th>
                        <th>{{__('admin-master.created_at')}}</th>
                        <th>{{__('admin-master.updated_at')}}</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @foreach($products as $product)
                            <tr style="font-size: 13px">
                                {{-- <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{ $product->id }}" value="{{ $product->id }}"></td> --}}
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</a></td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->unit }}</td>
                                <td>{{ $product->is_active }}</td>
                                <td>{{ $product->user_name}}</td>
                                <td>{{ $product->created_at->format(date('d-m-Y')) }}</td>
                                <td>{{ $product->updated_at->format(date('d-m-Y')) }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{route('product.destroy', $product->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="fa fa-trash-o" style="border: none; color: red; background: none;"></button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('product.edit', $product->id) }}">
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
