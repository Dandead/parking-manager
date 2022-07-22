@extends('template')

@section('title')
    Client info
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
    <div class="container-fluid mb-5">
        <div class="row clearfix">
            <form method="post" action="/client/{{ $client[0]->client_id }}" id="ClientForm">
                @method('post')
                @csrf
                <div class="container-fluid row">
                    <div class="container-sm col-sm-4">
                        <h1 class="d-flex justify-content-center">Edit client</h1>
                        <div class="container rounded border border-dark bg-dark">
                            <input type="hidden" name="client_id" value="{{ $client[0]->client_id }}">
                            <div class="form-floating mb-3 mt-3">
                                <input type = "text" value="{{ $client[0]->full_name }}" required name = "full_name" id ="full_name" class="form-control" placeholder="">
                                <label for="full_name">Full name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="tel" value="{{ $client[0]->phone_num }}" required name = "phone_num" id ="phone_num" class="form-control" placeholder="">
                                <label for="phone_num">Phone number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" name="gender" id="gender">
                                    @if ($client[0]->gender === 1)
                                        <option value="0">Male</option>
                                        <option value="1" selected>Female</option>
                                    @else
                                        <option value="0" selected>Male</option>
                                        <option value="1">Female</option>
                                    @endif
                                </select>
                                <label for="gender">Gender</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" value="{{ $client[0]->address }}" name = "address" id ="address" class="form-control" placeholder="">
                                <label for="address">Address (optional)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h1 class="d-flex justify-content-center">Edit vehicles</h1>
                        @for($i=0;$i < count($vehicles); $i++)
                            <div class="container tab-logic row mt-3 mb-3 req-forms">
                                <div class="col">
                                    <div data-name="brand" class="form-floating">
                                        <input value="{{ $vehicles[$i]->brand }}" type = "text" required name = "brand" id ="brand" class="form-control" placeholder="">
                                        <label for="brand">Brand</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-name="model" class="form-floating">
                                        <input value="{{ $vehicles[$i]->model }}" type="text" required name = "model" id ="model" class="form-control" placeholder="">
                                        <label for="model">Model</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-name="color" class="form-floating">
                                        <input value="{{ $vehicles[$i]->color }}" type="text" required name = "color" id ="color" class="form-control" placeholder="">
                                        <label for="color">Color</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-name="licence_plate" class="form-floating">
                                        <input value="{{ $vehicles[$i]->licence_plate }}" type="text" required name = "licence_plate" id ="licence_plate" class="form-control" placeholder="">
                                        <label for="licence_plate">Licence plate</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div data-name="is_active" class="form-floating">
                                        <select class="form-select" name="is_active" id="is_active">
                                            @if ($vehicles[$i]->is_active === 1)
                                                <option value="1" selected>Yes</option>
                                                <option value="0">No</option>
                                            @else
                                                <option value="1">Yes</option>
                                                <option value="0" selected>No</option>
                                            @endif
                                        </select>
                                        <label for="is_active">Is parked</label>
                                    </div>
                                </div>
                                <div style="white-space: nowrap" class="col-auto d-flex align-items-center">
                                    <form action="/delete/vehicle/{{$vehicles[$i]->vehicle_id}}" method="post">
                                        @csrf
                                        <button class="btn btn-danger align-middle" type="submit">x</button>
                                    </form>
                                </div>
                            </div>
                        @endfor
                        <div id="place_for_forms"></div>
                        <div class="d-grid gap-2 d-flex">
                            <button type="submit" class="btn btn-warning me-auto ms-3">Send your form</button>
                            <a id="btn-add" class="btn btn-primary btn-add">Add Row</a>
                            <a id="btn-remove" class="btn btn-danger btn-remove me-4">Remove Row</a>
                        </div>
                        <input class = "already-forms" type = "hidden" value="{{count($vehicles)}}" name="already-forms" id="already-forms">
                        <input class = "forms-count" type = "hidden" value="0" name="forms-count" id="forms-count">
                    </div>
                </div>
            </form>
            <div class="mt-2">
                <form action="/delete/client/{{$client[0]->client_id}}" method="post">
                    @csrf
                    <button class="btn btn-danger align-middle" type="submit">Delete client</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let req_forms = document.getElementsByClassName("req-forms")
        let button_add = document.getElementById("btn-add");
        let button_remove = document.getElementById("btn-remove");
        let a_f = document.getElementById('already-forms')
        let f_c = document.getElementById('forms-count');
        let place = document.getElementById("place_for_forms")
        let forms_count = 0;
        f_c.value = a_f.value + forms_count
        button_add.addEventListener('click', function() {
            forms_count++;
            place.insertAdjacentHTML('beforeend', Template())
            f_c.value = a_f.value + forms_count;
        });
        button_remove.addEventListener('click', function() {
            let forms = document.getElementsByClassName("vehicle-form");
            if (0 < forms.length){
                forms[forms.length-1].remove();
                forms_count--;
                f_c.value = a_f.value + forms_count;
            } else {}
        })

        function Template(){
            return '<div class="container tab-logic row mt-3 mb-3 vehicle-form" type="hide">'+
                '<div class="col">'+
                    '<div data-name="brand" class="form-floating">'+
                        '<input type = "text" required name = "brand" id ="brand" class="form-control" placeholder="">'+
                            '<label for="brand">Brand</label>'+
                    '</div>'+
                '</div>'+
                '<div class="col">'+
                    '<div data-name="model" class="form-floating">'+
                        '<input type="text" required name = "model" id ="model" class="form-control" placeholder="">'+
                            '<label for="model">Model</label>'+
                    '</div>'+
                '</div>'+
                '<div class="col">'+
                    '<div data-name="color" class="form-floating">'+
                        '<input type="text" required name = "color" id ="color" class="form-control" placeholder="">'+
                            '<label for="color">Color</label>'+
                    '</div>'+
                '</div>'+
                '<div class="col">'+
                    '<div data-name="licence_plate" class="form-floating">'+
                        '<input type="text" required name = "licence_plate" id ="licence_plate" class="form-control" placeholder="">'+
                            '<label for="licence_plate">Licence plate</label>'+
                    '</div>'+
                '</div>'+
                '<div class="col">'+
                    '<div data-name="is_active" class="form-floating">'+
                        '<select class="form-select" name="is_active" id="is_active">'+
                            '<option value="1">Yes</option>'+
                            '<option value="0" selected>No</option>'+
                        '</select>'+
                        '<label for="is_active">Is parked</label>'+
                    '</div>'+
                '</div>'+
            '</div>'
        }

    </script>
@endsection
