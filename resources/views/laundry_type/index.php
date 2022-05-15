<?php include(resource_path() . '/views/sections/header.php'); ?>
<?php include(resource_path() . '/views/sections/leftmenu.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Laundry Type
        </h1>
    </section>

<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #463f3f;
    }
</style>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="row">
            <div class="col-md-6">

                <form class="form-horizontal" id="form"  method="post">

                    <input type="hidden" name="id" id="id" value="">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="box col-md-4">
                        <div class="box-header with-border">
                            <h3 class="box-title">Create Laundry Type</h3>

                          
                        </div>
                        <div class="box-body">
                            <div class="form-group" style="display: none;">
                                <label for="month" class="col-sm-3 control-label">Laundry Type</label>

                                <div class="col-sm-9">
                                      <select class="form-control" id="ltype" name="ltype">
                                    <option value="">Select One</option>                              
                                         <?php foreach ($ltype as $p):?>
                                        <option value="<?php echo $p->id;?>"><?php echo $p->name;?></option>
                                      <?php endforeach;?>
                                      </select>
                                </div>
                            </div> 
                           
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Name</label>

                                <div class="col-sm-9">
                                    <input class="form-control" id="name" placeholder="name" type="text" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">Price</label>

                                <div class="col-sm-9">
                                    <input class="form-control" id="price" placeholder="price" type="text" name="price" value="">
                                </div>
                            </div>                      
                            
                        </div>
                        <div class="box-footer">
                            <button type="submit" id="submit" onclick="formSubmit(event)" class="btn btn-default">Create</button>
                            <button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6">
                <div class="box col-md-4">
                    <div class="box-header with-border">
                        <h3 class="box-title">Type List</h3>

                      
                    </div>
                    <div id="table" class="box-body">
                        <div class="mb10">
                            <div class="pull-left">
                                <form id="tableform" >
                                    <b>SHOW</b><select id="selectentry" onchange="table(event)">

                                        <option value="10">10</option>

                                        <option value="20">20</option>
                                        <option value="100">100</option>
                                    </select>
                                    <b>ENTRIES</b>
                                </form>
                            </div>
                            <div style="float:right">
                                <form id="srch" name="srch" onsubmit="searchClicked(event)" >
                                    <input  id="searchfill" placeholder="  search here" type="text" name="search">
                                    <button type="submit"  id="searchbtn" name="submit">Search</button>
                                </form>
                            </div>
                        </div>


                        <div id="showtable" class="box-body">
                            <table id="level-table" class="table table-striped table-bordered">
                                <tr><th>ID</th><th> Name</th><th>Price</th><th>ACTIONS</th></tr>

                            </table>
                        </div>
                        <div id="pagg">

                            <ul class="pagination pagination-sm">

                            </ul>

                        </div>




                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">

    var baseurl = "<?php echo url('/'); ?>";
$(document).ready(function() {

     $(":input").inputmask();

 $("#ltypes").addClass('active');
});

 

    function table() {

        var entry = $("#selectentry").val();
        var search = $("#searchfill").val();
        if (($("#searchfill").val()) != "") {
            var search = $("#searchfill").val();
        }
        var index = $("body #pagg ul li.active").text();
        if (index != null) {
            var page = index;
        }
        $.ajax({

            method: 'get',
            url: baseurl + "/laundry-type/list?entry=" + entry + "&page=" + page + "&search=" + search,
            success: function (response) {
                createTable(response);

            },
            fail: function () {
                alert("failed");
            }
        });



    }

    function searchClicked(e) {
        e.preventDefault();
        var search = $("#searchfill").val();
        var entry = $("#selectentry").val();
        $.ajax({

            method: 'get',
            url: baseurl + "/laundry-type/list?entry=" + entry + "&search=" + search,
            success: function (response) {
                createTable(response);
            },
            fail: function () {
                alert("failed");
            }
        });
    }



    function createTable(resp) {
        var t = document.getElementById("level-table");
        $("body #level-table").find("tr:gt(0)").remove();
        //}
        var rowCount = 1;
        var data = resp.data;

        for (var i in data) {
            var row = t.insertRow(rowCount);

            row.insertCell(0).innerHTML = data[i].id;
            row.insertCell(1).innerHTML = data[i].name;
            row.insertCell(2).innerHTML = data[i].price;
            // row.insertCell(2).innerHTML=resp[i].opening_date;
            row.insertCell(3).innerHTML = "<a href='javascript:void(0)' onclick='edit(" + data[i].id + ")' class='btn btn-xs btn-primary' ><i class='glyphicon glyphicon-edit'></i>Edit</a>&nbsp;&nbsp;<a href='javascript:void(0)' onclick='delt(" + data[i].id + ")' class='btn btn-xs btn-danger' ><i class='glyphicon glyphicon-trash'></i>Delete</a>";
            rowCount++;

        }
        callForPagination(resp);
        return true;
    }


    function formSubmit(e) {

        var id = $("#id").val();
        // alert(id);
        e.preventDefault();
        if ($('#id').val() == "") {

            var url = baseurl + "/laundry-type/creates";
        } else {
            var url = baseurl + "/laundry-type/updates/" + id;
        }
        $.ajax({
            method: "POST",
            url: url,
            data: $("#form").serialize(),
            success: function (resp) {
                var a = JSON.parse(resp);
                toast(a);
                if (a.status == 1) {
                    $("#id").val("");
                    $("#submit").text("Create");
                    resetForm($('#form'));
                }
                table();



            },
            fail: function () {

                alert("failed");
            }
        });
    }
    function resetForm(form) {
        $(form).trigger('reset');
        if ($('#id').length) {
            $('#id').val('');
        }
    }


    function edit(id) {

        $("#submit").text("Update");
        $.ajax({
            method: 'get',
            url: baseurl + "/laundry-type/edit/" + id,
            success: function (resp) {

                assignValues(resp);
                $('#id').val(resp.id);
                $('#ltype').val(resp.ltype);


            },
            fail: function () {

            }
        });

    }


    function delt(id) {
        var conf = confirm("Are you sure you want to delete?");
        if (conf) {
            $.ajax({
                method: 'get',
                url: baseurl + "/laundry-type/deletes/" + id,
                success: function (resp) {
                    var a = JSON.parse(resp);
                    toast(a);
                    table();

                },

                fail: function () {
                    alert("Fail");

                }
            });
        }
    }

$('input, select').on("keypress", function (e) {
        /* ENTER PRESSED*/
        var OffSet = 0;
        if (e.keyCode == 13) {
            /* FOCUS ELEMENT */
            if ($(this).is("input[type='radio']")) {
                var tblID = $(this).closest('table').attr('id');
                var radios = $('#' + tblID).find(":input");
                //alert(radios.index(this));
                OffSet = radios.length - radios.index(this) - 1;
            }
            //alert(OffSet);

            var inputs = $(this).parents("form").eq(0).find(":input");
            var idx = inputs.index(this);
            inputs[idx + OffSet].blur();

            try {
                inputs[idx + OffSet].selectionStart = inputs[idx + OffSet].selectionEnd = -1;
            } catch (e) {

            }
            if (idx == inputs.length - 1) {
                inputs[0].select();
            } else {
                inputs[idx + 1 + OffSet].focus(); //  handles submit buttons
                try {
                    inputs[idx + 1 + OffSet].select();
                } catch (e) {
                }
            }
            return false;
        }
    });

</script>
<?php
include(resource_path() . '/views/sections/footer.php');
