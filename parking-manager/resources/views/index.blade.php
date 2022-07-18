<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<div style="margin: 15px" class="container">
    <table class="table table-bordered">
        <thead></thead>
        <tbody>
        @foreach ($clients as $client)
                <tr>
                    <td class="bg-white px-4 py-2">{{ $client->client_id }}</td>
                    <td class="bg-white px-4 py-2">{{ $client->full_name }}</td>
                    <td class="bg-white px-4 py-2">{{ $client->licence_plate }}</td>
                    <td><a href="/client/{{$client->client_id}}" class="btn btn-warning"><i class="fa fa-user-circle-o"></i> Update</a></td>
                    <td>
                        <form action="/vehicle/{{$client->vehicle_id}}" method="post">
                            <input class="btn btn-danger" type="submit" value="Delete"/>
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
         @endforeach
        </tbody>
    </table>
    <a style="position: sticky" href="/create" class="btn btn-info"><i class="fa fa-user-circle-o"></i>Create client</a>

</div>
{{  $clients->onEachSide(3)->links()  }}
</body>
</html>
