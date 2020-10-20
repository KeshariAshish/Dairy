<x-admin-master>

    @section('content')

        <h1>{{__('admin-master.Supply')}}</h1>
        @if(Session::has('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @endif

        <table class="table table-bordered mt-4" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr style="font-size: 15px">
                <th>{{__('admin-master.Id')}}</th>
                <th>{{__('admin-master.customer_name')}}</th>
                <th>{{__('admin-master.product_name')}} </th>
                <th>{{__('admin-master.date')}}</th>
                <th>{{__('admin-master.slot')}}</th>
                <th>{{__('admin-master.quantity')}}</th>
                <th>{{__('admin-master.created_by')}}</th>
                <th>{{__('admin-master.created_at')}}</th>
                <th>{{__('admin-master.updated_at')}}</th>
                <th>Action</th>
            </tr>
            </thead>

            <tfoot>
            <tr style="font-size: 15px">
                <th>{{__('admin-master.Id')}}</th>
                <th>{{__('admin-master.customer_name')}}</th>
                <th>{{__('admin-master.product_name')}} </th>
                <th>{{__('admin-master.date')}}</th>
                <th>{{__('admin-master.slot')}}</th>
                <th>{{__('admin-master.quantity')}}</th>
                <th>{{__('admin-master.created_by')}}</th>
                <th>{{__('admin-master.created_at')}}</th>
                <th>{{__('admin-master.updated_at')}}</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>

                @foreach($supplies as $supply)
                    <tr style="font-size: 13px;">
                        <td>{{ $supply->id }}</td>
                        <td>{{ $supply->name }}</td>
                        <td>{{ $supply->product_name}}</td>
                        <td>{{ $supply->date }}</td>
                        <td>{{ $supply->slot }}</td>
                        <td>{{ $supply->quantity }}</td>
                        <td>{{ $supply->created_by }}</td>
                        <td>{{ $supply->created_at->format(date('d-m-Y')) }}</td>
                        <td>{{ $supply->updated_at->format(date('d-m-Y')) }}</td>
                        <td style="width: 100px">
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('supply.destroy', $supply->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="fa fa-trash-o fa-2x" style="border: none; color: red; background: none;"></button>
                                    </form>
                                </div>


                                <div class="col">
                                    <a href="{{ route('supply.edit', $supply->id) }}">
                                        <button class="fa fa-pencil fa-2x" style="border: none; color: green; background: none;" aria-hidden="true">
                                        </button>
                                    <a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection

    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

        <!-- Page level custom scripts -->
        <script src="{{asset('js/datatables-script.js')}}"></script>

        <script>
            $(document).ready(function(){

                $('#options').click(function(){

                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                });
                    }else{
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    });
                    }

                });

            });
        </script>
    @endsection
</x-admin-master>
