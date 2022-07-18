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
        @foreach ($clients as $client)
                <tr>
                    <th class="bg-white px-4 py-2">{{ $client->full_name }}</th>
                    <th class="bg-white px-4 py-2">{{ "$client->brand $client->model" }}</th>
                    <th class="bg-white px-4 py-2">{{ $client->licence_plate }}</th>
                    <th class="bg-white px-4 py-2"><a href="/"></a></th>
                </tr>
         @endforeach
        </tbody>
    </table>
</div>
{{ $clients->onEachSide(5)->links() }}
</body>
</html>
