<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <a style="margin: 10px" href="/" class="btn btn-info"><i class="fa fa-user-circle-o"></i>Home</a></td>
    <table class="table table-bordered">
        <thead>
        <tbody>
            <tr>
                <th class="bg-white px-4 py-2">Id</th>
                <th class="bg-white px-4 py-2">Full name</th>
                <th class="bg-white px-4 py-2">Gender</th>
                <th class="bg-white px-4 py-2">Phone number</th>
                <th class="bg-white px-4 py-2">Address</th>
            </tr>
            <tr>
                @foreach($client as $cli)
                    <td class="bg-white px-4 py-2">{{ $cli->client_id }}</td>
                    <td class="bg-white px-4 py-2">{{ $cli->full_name }}</td>
                    <td class="bg-white px-4 py-2">{{ $cli->gender }}</td>
                    <td class="bg-white px-4 py-2">{{ $cli->phone_num }}</td>
                    <td class="bg-white px-4 py-2">{{ $cli->address }}</td>
                    <td><a href="/client/{{$cli->client_id}}/edit" class="btn btn-warning"><i class="fa fa-user-circle-o"></i> Update</a></td>
                    <td>
                    <form action="/client/{{$cli->client_id}}" method="post">
                        <input class="btn btn-danger" type="submit" value="Delete"/>
                        @method('delete')
                        @csrf
                    </form>
                    </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
        <thead>
        <tbody>
            <tr>
                <th class="bg-white px-4 py-2">Brand</th>
                <th class="bg-white px-4 py-2">Model</th>
                <th class="bg-white px-4 py-2">Licence plate</th>
                <th class="bg-white px-4 py-2">On parking</th>
            </tr>
        @foreach ($vehicles as $veh)
            <tr>
                <td class="bg-white px-4 py-2">{{ $veh->brand }}</td>
                <td class="bg-white px-4 py-2">{{ $veh->model }}</td>
                <td class="bg-white px-4 py-2">{{ $veh->licence_plate }}</td>
                <td class="bg-white px-4 py-2">{{ $veh->is_active }}</td>
                <td>
                    <form action="/vehicle/{{$veh->vehicle_id}}/change_status" method="post">
                        <input class="btn btn-success" type="submit" value="Change status"/>
                        @csrf
                    </form>
                </td>
                <td><a href="/vehicle/{{$veh->vehicle_id}}/edit" class="btn btn-warning"><i class="fa fa-user-circle-o"></i> Update</a></td>
                <td>
                    <form action="/client/{{$veh->vehicle_id}}" method="post">
                        <input class="btn btn-danger" type="submit" value="Delete"/>
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
