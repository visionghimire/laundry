<?php include(resource_path() . '/views/sections/header.php'); ?>
<?php include(resource_path() . '/views/sections/leftmenu.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Report
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

                <!-- <form class="form-horizontal" id="form"  method="post"> -->

                    <input type="hidden" name="id" id="id" value="">
                 
                    <div class="box col-md-4">
                        <div class="box-header with-border">
                            <h3 class="box-title">Employee Clock In / Out Report</h3>

                          
                        </div>
                        <div class="box-body">

                           
                            
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">From Date</label>

                                <div class="col-sm-9">
                                    <input class="form-control" id="from_date" placeholder="" type="date" name="from_date" value="">
                                </div>
                            </div> <br><br>
                            <div class="form-group">
                                <label for="name" class="col-sm-3 control-label">To Date</label>

                                <div class="col-sm-9">
                                    <input class="form-control" id="to_date" placeholder="" type="date" name="to_date" value="">
                                </div>
                            </div>  

                             

                                               
                            
                        </div>
                        <div class="box-footer">
                            <button  id="submit" onclick="getReport(event)" class="btn btn-default">View</button>
                            
                        </div>
                    </div>
                <!-- </form> -->
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

 $("#empreport").addClass('active');
});

 function getReport(){
    var fd=$("#from_date").val();
    var td=$("#to_date").val();
    window.open(baseurl+"/employee/report/getReport?fd="+fd+"&td="+td, '_blank').focus();
   
 }

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
            url: baseurl + "/employee/list?entry=" + entry + "&page=" + page + "&search=" + search,
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
            url: baseurl + "/employee/list?entry=" + entry + "&search=" + search,
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
            row.insertCell(2).innerHTML = data[i].in_qty;
             row.insertCell(3).innerHTML = data[i].price;
              row.insertCell(4).innerHTML = data[i].used_qty;
            
           
            // row.insertCell(2).innerHTML=resp[i].opening_date;
            row.insertCell(5).innerHTML = "<a href='javascript:void(0)' onclick='edit(" + data[i].id + ")' class='btn btn-xs btn-primary' ><i class='glyphicon glyphicon-edit'></i>Edit</a>&nbsp;&nbsp;<a href='javascript:void(0)' onclick='delt(" + data[i].id + ")' class='btn btn-xs btn-danger' ><i class='glyphicon glyphicon-trash'></i>Delete</a>";
            rowCount++;

        }
        callForPagination(resp);
        return true;
    }


    


    function edit(id) {

        $("#submit").text("Update");
        $.ajax({
            method: 'get',
            url: baseurl + "/booking/edit/" + id,
            success: function (resp) {
                assignValues(resp);
                $('#id').val(resp.id);


            },
            fail: function () {

            }
        });

    }


    


</script>
<?php
include(resource_path() . '/views/sections/footer.php');
