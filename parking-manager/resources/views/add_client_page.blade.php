<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 table-responsive">
            <form method="post" class="bg-6 md-6 sm-6" action="/create" id="ClientForm">
                @csrf
                <table class ="table table-bordered table-hover table-sortable">
                    <thead>
                    <tr >
                        <th class="text-center">
                            Full name
                        </th>
                        <th class="text-center">
                            Phone number
                        </th>
                        <th class="text-center">
                            Gender
                        </th>
                        <th class="text-center">
                            Address
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id='addr0' data-id="0" class="hidden">
                        <td data-name="full_name">
                            <input type = "text" placeholder="Format: Name Surname Patronymic" required name = "full_name" id ="full_name" class="form-control">
                        </td>
                        <td data-name="phone_num">
                            <input type = "tel" placeholder="Format: +7900000000" required name = "phone_num" id ="phone_num" class="form-control">
                        </td>
                        <td data-name="gender">
                            <select class="form-select" name="gender" id="gender">
                                <option value="0" selected>Male</option>
                                <option value="1">Female</option>
                            </select>
                        </td>
                        <td data-name="address">
                            <input type = "text" placeholder="Unnecessary" name = "address" id ="address" class="form-control">
                        </td>
                    </tr>
                    </tbody>

                </table>
                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                    <tr>
                        <th class="text-center">
                            Brand
                        </th>
                        <th class="text-center">
                            Model
                        </th>
                        <th class="text-center">
                            Color
                        </th>
                        <th class="text-center">
                            Licence Number
                        </th>
                        <th class="text-center">
                            Is parked
                        </th>
                        <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id='addr0' data-id="0" class="hidden">
                        <td data-name="brand">
                            <input type = "text" required name = "brand" id ="brand" class="form-control">
                        <td data-name="model">
                            <input type = "text" required name = "model" id ="model" class="form-control">
                        <td data-name="color">
                            <input type="text" required name='color' id ="color" class="form-control"/>
                        </td>
                        <td data-name="licence_plate">
                            <input type="text" required name="licence_plate" id ="licence_plate" placeholder="Ex: ну582ш132" class="form-control"></input>
                        </td>
                        <td data-name="is_active">
                            <select name="is_active">
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                            </select>
                        </td>
                        <td data-name="del">
                            <button name="del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'><span aria-hidden="true">×</span></button>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <button  type="submit" class="btn btn-warning">Send your form</button>
            </form>
        </div>
    </div>
    <a id="add_row" class="btn btn-primary float-right">Add Row</a>
</div>

<script>
    $(document).ready(function() {
        $("#add_row").on("click", function() {
            // Dynamic Rows Code

            // Get max row id and set new id
            var newid = 0;
            $.each($("#tab_logic tr"), function() {
                if (parseInt($(this).data("id")) > newid) {
                    newid = parseInt($(this).data("id"));
                }
            });
            newid++;

            var tr = $("<tr></tr>", {
                id: "addr"+newid,
                "data-id": newid
            });

            // loop through each td and create new elements with name of newid
            $.each($("#tab_logic tbody tr:nth(0) td"), function() {
                var td;
                var cur_td = $(this);

                var children = cur_td.children();

                // add new td and element if it has a nane
                if ($(this).data("name") !== undefined) {
                    td = $("<td></td>", {
                        "data-name": $(cur_td).data("name")
                    });

                    var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                    c.attr("id", $(cur_td).data("name") + newid);
                    c.appendTo($(td));
                    td.appendTo($(tr));
                } else {
                    td = $("<td></td>", {
                        'text': $('#tab_logic tr').length
                    }).appendTo($(tr));
                }
            });

            // add delete button and td
            /*
            $("<td></td>").append(
                $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                    .click(function() {
                        $(this).closest("tr").remove();
                    })
            ).appendTo($(tr));
            */

            // add the new row
            $(tr).appendTo($('#tab_logic'));

            $(tr).find("td button.row-remove").on("click", function() {
                $(this).closest("tr").remove();
            });
        });




        // Sortable Code
        var fixHelperModified = function(e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();

            $helper.children().each(function(index) {
                $(this).width($originals.eq(index).width())
            });

            return $helper;
        };

        $(".table-sortable tbody").sortable({
            helper: fixHelperModified
        }).disableSelection();

        $(".table-sortable thead").disableSelection();



        $("#add_row").trigger("click");
    });
</script>
