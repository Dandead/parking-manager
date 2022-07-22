@extends('template')

@section('title')
    All Vehicles
@endsection

@section('body')
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Full name</th>
                <th scope="col">Licence plate</th>
                <th scope="col" style="white-space: nowrap; width: 1px"></th>
                <th scope="col" style="white-space: nowrap; width: 1px"></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td>{{ $client->client_id }}</td>
                <td>{{ $client->full_name }}</td>
                <td>{{ $client->licence_plate }}</td>
                <td><a href="/client/{{$client->client_id}}" class="btn btn-warning">Edit</a></td>
                <td>
                    <form action="/delete/vehicle/{{$client->vehicle_id}}" method="post">
                        <input class="btn btn-danger" type="submit" value="Delete"/>
                        @method('delete')
                        @csrf
                    </form>
                </td>
            </tr>
         @endforeach
        </tbody>
    </table>
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header flex-column">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>
                    <h4 class="modal-title w-100">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to delete these records? This process cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
    {{  $clients->onEachSide(2)->links('vendor/pagination/bootstrap-5')  }}
</div>
@endsection
