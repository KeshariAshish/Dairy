<x-admin-master>

    @section('content')


        @if(auth()->user()->is_Admin==0)
            <h1>{{__('admin-master.Order_Histroy')}}</h1>
        @endif

        @if(auth()->user()->is_Admin==1)
            <h1>Productions</h1>
            @if(Session::has('message'))
                <div class="alert alert-success">{{session('message')}}</div>
            @endif
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
                {{-- <th><input type="checkbox" id="options"></th> --}}
                <th>{{__('admin-master.Id')}}</th>
                <th>{{__('admin-master.product_name')}}</th>
                <th>{{__('admin-master.date')}}</th>
                <th>{{__('admin-master.slot')}}</th>
                <th>{{__('admin-master.quantity')}}</th>
                <th>{{__('admin-master.available_quantity')}}</th>
                <th>{{__('admin-master.comment')}}</th>
                <th>{{__('admin-master.created_by')}}</th>
                {{-- <th>{{__('admin-master.updated_by')}}</th> --}}
                <th>{{__('admin-master.created_at')}}</th>
                {{-- <th>{{__('admin-master.updated_at')}}</th> --}}
                    @if(auth()->user()->is_Admin==1)
                        <th>{{__('admin-master.delete')}}</th>
                    @endif
            </tr>
            </thead>
            <tfoot>
                <tr>
                    {{-- <th><input type="checkbox" id="options"></th> --}}
                    <th>{{__('admin-master.Id')}}</th>
                    <th>{{__('admin-master.product_name')}}</th>
                    <th>{{__('admin-master.date')}}</th>
                    <th>{{__('admin-master.slot')}}</th>
                    <th>{{__('admin-master.quantity')}}</th>
                    <th>{{__('admin-master.available_quantity')}}</th>
                    <th>{{__('admin-master.comment')}}</th>
                    <th>{{__('admin-master.created_by')}}</th>
                    {{-- <th>{{__('admin-master.slot')}}</th> --}}
                    <th>{{__('admin-master.created_at')}}</th>
                    {{-- <th>{{__('admin-master.slot')}}</th> --}}
                    @if(auth()->user()->is_Admin==1)
                        <th>{{__('admin-master.delete')}}</th>
                    @endif
                </tr>
            </tfoot>
            <tbody>
                @foreach($productions as $production)

                    <tr>
                        {{-- <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" id="{{$production->id}}" value="{{$production->id}}"></td> --}}
                        @if(auth()->user()->is_Admin==1)
                            <td><a href="{{route('production.edit', $production->id)}}">{{ $production->id }}</a></td>
                        @endif
                        @if(auth()->user()->is_Admin==0)
                            <td>{{ $production->id }}</td>
                        @endif
                        <td>{{ $production->product_name }}</td>
                        <td>{{ $production->date->format(date('d-m-Y')) }}</td>
                        <td>{{ $production->slot }}</td>
                        <td>{{ $production->quantity }}</td>
                        <td>{{ $production->available_quantity }}</td>
                        <td>{{ $production->comment }}</td>
                        <td>{{ $production->created_by }}</td>
                        {{-- <td>{{ $production->updated_by}}</td> --}}
                        <td>{{ $production->created_at->format(date('d-m-Y')) }}</td>
                        {{-- <td>{{ $production->updated_at->diffForHumans() }}</td> --}}
                        <td>
                        @if(auth()->user()->is_Admin==1)
                            <form action="{{route('production.destroy', $production->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                        @endif
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
        @endsection

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

</x-admin-master>
