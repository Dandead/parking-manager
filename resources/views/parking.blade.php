@extends('template')

@section('title')
    Parking
@endsection

@section('body')
    @if($errors->all())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>
                        {{$err}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="container-fluid ms-2 row">
    <div class="container-sm col-sm-4">
        <h1 class="d-flex justify-content-center">Park a vehicle</h1>
        <form method="post" action="/parking">
            @csrf
            <div class="form-group">
                <div class="form-floating mb-3 mt-3">
                    <select class="form-select dynamic" data-dependent="vehicle_id" name="client_id" id="client_id">
                        <option value="" selected>Select client</option>
                        @foreach($clients as $client)
                            <option value="{{$client->client_id}}">{{$client->full_name}}</option>
                        @endforeach
                    </select>
                    <label for="client_id">Select client</label>
                </div>
            </div>
            <div class="form-floating mb-3 mt-3">
                <select class="form-select" name="vehicle_id" id="vehicle_id">
                    <option value="">Select vehicle</option>
                </select>
                <label for="vehicle_id">Select vehicle</label>
            </div>
            <br>
            <button type="submit" class="btn btn-warning">Change car status</button>
        </form>
    </div>
    <div class="container col">
        <h1 class="d-flex justify-content-center">Parking</h1>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Client ID</th>
                <th scope="col">Full name</th>
                <th scope="col">Licence plate</th>
                <th scope="col" style="white-space: nowrap; width: 1px"></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $vehicle->client_id }}</td>
                    <td>{{ $vehicle->full_name }}</td>
                    <td>{{ $vehicle->licence_plate }}</td>
                    <td>
                        <form action="/parking/{{$vehicle->vehicle_id}}" method="post">
                            <input class="btn btn-info" type="submit" value="Unpark"/>
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    {{  $vehicles->onEachSide(2)->links('vendor/pagination/bootstrap-5')  }}
    </div>
</div>
<script>
    $(document).ready(function()
    {
        $('.dynamic').change(function(){
            if($(this).val()!='')
            {
                let client_id = $(this).attr("id");
                let value = $(this).val();
                let dependent = $(this).data('dependent');
                let _token = $('input[name="_token"]').val();
                console.log("Dependent:"+dependent);
                console.log("Select:"+client_id);
                console.log("Value:"+value);
                $.ajax({
                    url:"{{route('MainController.GetClientCars')}}",
                    method: "POST",
                    data:{client_id:client_id, value:value, _token:_token,
                        dependent:dependent},
                    success: function(result)
                    {
                        $('#vehicle_id').html(result.html);
                    }
                })
            }
        })
    })
</script>
@endsection
