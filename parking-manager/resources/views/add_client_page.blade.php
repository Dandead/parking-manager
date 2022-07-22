@extends('template')

@section('title')
    Create client
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
<div class="container-fluid">
    <div class="row clearfix">
        <form method="post" action="/create/client" id="ClientForm">
            @csrf
            <div class="container-fluid row">
                <div class="container-sm col-sm-4">
                    <h1 class="d-flex justify-content-center">Create client</h1>
                    <div class="container rounded border border-dark bg-dark">
                        <div class="form-floating mb-3 mt-3">
                            <input type = "text" value="{{old('full_name')}}" required name = "full_name" id ="full_name" class="form-control" placeholder="">
                            <label for="full_name">Full name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" value="{{old('phone_num')}}" required name = "phone_num" id ="phone_num" class="form-control" placeholder="">
                            <label for="phone_num">Phone number</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select value="{{old('gender')}}" class="form-select" name="gender" id="gender">
                                <option value="0" selected>Male</option>
                                <option value="1">Female</option>
                            </select>
                            <label for="gender">Gender</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name = "address" id ="address" class="form-control" placeholder="">
                            <label for="address">Address (optional)</label>
                        </div>
                    </div>
                </div>
                <div class="col vehicles">
                    <h1 class="d-flex justify-content-center">Add vehicles</h1>
                    <div class="container tab-logic row mt-3 mb-3 vehicle-form">
                        <div class="col">
                            <div data-name="brand" class="form-floating">
                                <input type = "text" required name = "brand" id ="brand" class="form-control" placeholder="">
                                <label for="brand">Brand</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-name="model" class="form-floating">
                                <input type="text" required name = "model" id ="model" class="form-control" placeholder="">
                                <label for="model">Model</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-name="color" class="form-floating">
                                <input type="text" required name = "color" id ="color" class="form-control" placeholder="">
                                <label for="color">Color</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-name="licence_plate" class="form-floating">
                                <input type="text" required name = "licence_plate" id ="licence_plate" class="form-control" placeholder="">
                                <label for="licence_plate">Licence plate</label>
                            </div>
                        </div>
                        <div class="col">
                            <div data-name="is_active" class="form-floating">
                                <select class="form-select" name="is_active" id="is_active">
                                    <option value="1">Yes</option>
                                    <option value="0" selected>No</option>
                                </select>
                                <label for="is_active">Is parked</label>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-flex">
                        <button type="submit" class="btn btn-warning me-auto ms-3">Send your form</button>
                        <a id="btn-add" class="btn btn-primary btn-add">Add Row</a>
                        <a id="btn-remove" class="btn btn-danger btn-remove me-4">Remove Row</a>
                    </div>
                    <input class = "forms-count" type = "hidden" value="1" name="forms-count" id="forms-count">
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    let forms = document.getElementsByClassName("vehicle-form");
    console.log(forms);
    let button_add = document.getElementById("btn-add");
    let button_remove = document.getElementById("btn-remove");
    let f_c = document.getElementById('forms-count')
    console.log(f_c)
    let forms_count = 1;
    button_add.addEventListener('click', function() {
        forms_count++;
        let clone = forms[0].cloneNode(true);
        forms[forms.length-1].after(clone);
        f_c.value = forms_count;
    });
    button_remove.addEventListener('click', function() {
        if (1 < forms.length){
            forms[forms.length-1].remove();
            forms_count--;
            f_c.value = forms_count;
        } else {}
    })

</script>
@endsection
