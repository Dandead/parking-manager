<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tbody>
            <tr>
                <th class="bg-white px-4 py-2">Full name</th>
                <th class="bg-white px-4 py-2">Gender</th>
                <th class="bg-white px-4 py-2">Phone number</th>
                <th class="bg-white px-4 py-2">Address</th>
            </tr>
            <tr>
                <th class="bg-white px-4 py-2">{{ $client->full_name }}</th>
                <th class="bg-white px-4 py-2">{{ $client->gender }}</th>
                <th class="bg-white px-4 py-2">{{ $client->phone_num }}</th>
                <th class="bg-white px-4 py-2">{{ $client->address }}</th>
                <th class="bg-white px-4 py-2"><a href="/"></a></th>
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
                <th class="bg-white px-4 py-2">{{ $veh->brand }}</th>
                <th class="bg-white px-4 py-2">{{ $veh->Model }}</th>
                <th class="bg-white px-4 py-2">{{ $veh->licence_plate }}</th>
                <th class="bg-white px-4 py-2">{{ $veh->is_active }}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
