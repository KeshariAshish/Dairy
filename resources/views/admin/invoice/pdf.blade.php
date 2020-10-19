<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Invoice PDF</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="table table-responsive">
            <table class="table table-bordered mt-3" id="dataTable" width="100%"  cellspacing="0">
                <thead>
                    <tr style="font-size: 12px">
                        {{-- <th>Id</th> --}}
                        <th style="width: 95px;">Customer Name</th>
                        <th style="width: 90px;">Product Name</th>
                        <th style="width: 90px;">Total Quantity</th>
                        <th>Price </th>
                        <th style="width: 80px;">Total Amount</th>
                        <th style="width: 80px;">Paid Amount</th>
                        <th style="width: 80px;">Due Amount</th>
                    </tr>
                </thead>
                <tbody style="font-size: 10px">
                    @foreach($invoices as $invoice)
                        <tr>
                            {{-- <td>{{ $invoice->id }}</td> --}}
                            <td>{{ $invoice->name }}</a></td>
                            <td>{{ $invoice->product_name }}</td>
                            <td>{{ $invoice->total_quantity }}</td>
                            <td>{{ $invoice->price }}</td>
                            <td>{{ $invoice->total_amount }}</td>
                            <td>{{ $invoice->paid_amount }}</td>
                            <td>{{ $invoice->due_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>

