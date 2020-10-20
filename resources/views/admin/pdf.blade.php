<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Users PDF</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="table table-responsive">
            <table class="table table-bordered mt-3" id="dataTable" width="100%"  cellspacing="0">
                <thead>
                    <tr style="font-size: 12px">
                        {{-- <th>Id</th> --}}
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Zip</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody style="font-size: 10px">
                    @foreach($users as $user)
                        <tr>
                            {{-- <td>{{ $invoice->id }}</td> --}}
                            <td>{{ $user->name }}</a></td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->city }}</td>
                            <td>{{ $user->zip_code }}</td>
                            <td>{{ $user->location }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>

