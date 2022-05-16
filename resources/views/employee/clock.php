<?php include(resource_path() . '/views/sections/header.php'); ?>
<?php include(resource_path() . '/views/sections/leftmenu.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee Time in/ Time out
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
            
            <div class="col-md-12">
                <div class="box col-md-4">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee List</h3>

                      
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
                                <tr><th>ID</th><th>Name</th><th>Address</th><th>Contact Number</th>
                                    <th>Last Check in</th>
                                    <th>Last Check out</th>
                               
                            <th>Action</th>
                        </tr>

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

 $("#clock").addClass('active');
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
            url: baseurl + "/clock/list?entry=" + entry + "&page=" + page + "&search=" + search,
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
            url: baseurl + "/clock/list?entry=" + entry + "&search=" + search,
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
             row.insertCell(2).innerHTML = data[i].address;
              row.insertCell(3).innerHTML = data[i].contact_number;
              row.insertCell(4).innerHTML = data[i].in;
              row.insertCell(5).innerHTML = data[i].out;
              
            row.insertCell(6).innerHTML = "<a href='javascript:void(0)' onclick='clockin(" + data[i].id + ")' class='btn btn-xs btn-primary' ><i class='glyphicon glyphicon-log-in'></i> &nbsp; Time In </a>&nbsp;&nbsp;<a href='javascript:void(0)' onclick='clockout(" + data[i].id + ")' class='btn btn-xs btn-danger' ><i class='glyphicon glyphicon-log-out'></i> &nbsp; Time Out</a>";
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

            var url = baseurl + "/employee/creates";
        } else {
            var url = baseurl + "/employee/updates/" + id;
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
    


    function clockin(id) {
        var conf = confirm("Are you sure you want to clock in?");
        if (conf) {
        $.ajax({
            method: 'get',
            url: baseurl + "/clock/clockin/" + id,
            success: function (resp) {
                var a = JSON.parse(resp);
               toast(a);
               table(); 
            },
            fail: function () {

            }
        });
    }

    }

    function clockout(id) {
        var conf = confirm("Are you sure you want to clock out?");
        if (conf) {
        $.ajax({
            method: 'get',
            url: baseurl + "/clock/clockout/" + id,
            success: function (resp) {
                var a = JSON.parse(resp);
               toast(a);
               table(); 
            },
            fail: function () {

            }
        });
    }

    }


    function delt(id) {
        var conf = confirm("Are you sure you want to delete?");
        if (conf) {
            $.ajax({
                method: 'get',
                url: baseurl + "/employee/deletes/" + id,
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

</script>
<?php
include(resource_path() . '/views/sections/footer.php');
