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

        <div class="table table-responsive">
            <table class="table table-bordered mt-3" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr style="font-size: 15px">
                        {{-- <th><input type="checkbox" id="options"></th> --}}
                        <th>{{__('admin-master.Id')}}</th>
                        <th>{{__('admin-master.product_name')}}</th>
                        <th>{{__('admin-master.date')}}</th>
                        <th>{{__('admin-master.slot')}}</th>
                        <th>{{__('admin-master.quantity')}}</th>
                        <th>{{__('admin-master.available_quantity')}}</th>
                        <th>{{__('admin-master.comment')}}</th>
                        {{-- <th>{{__('admin-master.created_by')}}</th> --}}
                        {{-- <th>{{__('admin-master.updated_by')}}</th> --}}
                        <th>{{__('admin-master.created_at')}}</th>
                        {{-- <th>{{__('admin-master.updated_at')}}</th> --}}
                            @if(auth()->user()->is_Admin==1)
                                <th>Action</th>
                            @endif
                    </tr>
                </thead>
                <tfoot>
                    <tr style="font-size: 15px;">
                        {{-- <th><input type="checkbox" id="options"></th> --}}
                        <th>{{__('admin-master.Id')}}</th>
                        <th>{{__('admin-master.product_name')}}</th>
                        <th>{{__('admin-master.date')}}</th>
                        <th>{{__('admin-master.slot')}}</th>
                        <th>{{__('admin-master.quantity')}}</th>
                        <th>{{__('admin-master.available_quantity')}}</th>
                        <th>{{__('admin-master.comment')}}</th>
                        {{-- <th>{{__('admin-master.created_by')}}</th> --}}
                        {{-- <th>{{__('admin-master.slot')}}</th> --}}
                        <th>{{__('admin-master.created_at')}}</th>
                        {{-- <th>{{__('admin-master.slot')}}</th> --}}
                        @if(auth()->user()->is_Admin==1)
                            <th>Action</th>
                        @endif
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($productions as $production)

                        <tr style="font-size: 13px">
                            <td>{{ $production->id }}</td>
                            <td>{{ $production->product_name }}</td>
                            <td>{{ $production->date->format(date('d-m-Y')) }}</td>
                            <td>{{ $production->slot }}</td>
                            <td>{{ $production->quantity }}</td>
                            <td>{{ $production->available_quantity }}</td>
                            <td>{{ $production->comment }}</td>
                            {{-- <td>{{ $production->created_by }}</td> --}}

                            <td>{{ $production->created_at->format(date('d-m-Y')) }}</td>

                            <td style="width: 100px;">
                                <div class="row">
                                    @if(auth()->user()->is_Admin==1)
                                        <div class="col">
                                            <form action="{{route('production.destroy', $production->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="fa fa-trash-o fa-2x" style="border: none; color: red; background: none;"></button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <a href="{{ route('production.edit', $production->id) }}">
                                                <button class="fa fa-pencil fa-2x" style="border: none; color: green; background: none;" aria-hidden="true">
                                                </button>
                                            <a>
                                        </div>
                                    @endif
                                </div>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
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
