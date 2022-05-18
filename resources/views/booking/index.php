<?php include(resource_path() . '/views/sections/header.php'); ?>
<?php include(resource_path() . '/views/sections/leftmenu.php'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Order List
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
                        <h3 class="box-title">Order List</h3>

                      
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
                            <div id='loader1' style='display: none; text-align: center;'>
                            <img src="<?php echo url("/");?>/images/loader.gif" width='32px' height='32px'> Please wait...
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
                                <tr><th> ID</th><th>Pick Up Date</th><th>Time Slot</th><th>Customer Name</th><th>Address</th><th>Phone</th><th>Tracking ID</th><th>Email</th><th>Unit in Kg</th><th>Price</th><th>Total</th><th>ACTIONS</th><th>Invoice</th></tr>

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


<div id="approve-modal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
      <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="col-md-6 pull-left"><i class="fa fa-edit"></i> Udpate Few Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeAModal();">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <div class="col-md-12" id="form-div">
                    <form id="form" name="form" onsubmit ="updateApprovedData(event)" class="form-horizental">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id" id="id" />
                        <div class="form-group col-md-6">
                            <label for="presspassid">Garment Types </label>
                            <select class="form-control form-control-lg" id="type" name ="type"  required="required" data-error="Please select atleast one item">
                               <option id="select" value="">Select one..</option>
                                       <?php foreach ($type as $p):?>
                                        <option value=<?php echo $p->id;?>><?php echo $p->name;?></option>
                                      <?php endforeach;?>
                               </select> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="presspassdate">Services</label>
                            <select class="form-control form-control-lg" id ="service_type" name ="service_type"  required="required" data-error="Please select atleast one item">
                               <option value="Wash and Fold">Wash and Fold</option>
                               <option value="Wash and Iron">Wash and Iron</option>
                               </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="presspasstype">Total Kg of clothes</label>
                           <input  type="text" id="unit" name="unit" class="form-control" placeholder="in kg*" required="required" data-error="unit is required.">
                        </div>
                        <div id='loader' style='display: none;'>
  <img src="<?php echo url("/");?>/images/loader.gif" width='32px' height='32px'>Please wait...
</div>
                       
                       
                        <div class="col-md-6" style="width: 55%;margin-top: 14px;">
                            <button type="submit" class="col-md-1" style="float:right;width:19%;padding:5px;"><i class="fa fa-refresh"></i>
                            </button>
                        </div>     
                    </form>
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModal();">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
 
<script type="text/javascript">

    var baseurl = "<?php echo url('/'); ?>";
$(document).ready(function() {

     $(":input").inputmask();

 $("#booking").addClass('active');
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
            url: baseurl + "/booking/list?entry=" + entry + "&page=" + page + "&search=" + search,
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
            url: baseurl + "/booking/list?entry=" + entry + "&search=" + search,
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
            row.insertCell(1).innerHTML = data[i].pickupdate;
            row.insertCell(2).innerHTML = data[i].slot;
            row.insertCell(3).innerHTML = data[i].fullname;
            row.insertCell(4).innerHTML = data[i].address;
            row.insertCell(5).innerHTML = data[i].phone;
            row.insertCell(6).innerHTML = data[i].trackingcode;
            row.insertCell(7).innerHTML = data[i].email;
            row.insertCell(8).innerHTML = data[i].unit;
            row.insertCell(9).innerHTML = data[i].price;
            row.insertCell(10).innerHTML = data[i].total;
            if(data[i].status==0){
                var ht="";
            }
            if(data[i].status==1){
                var ht="<a href='javascript:void(0)' class='btn  btn-danger' disabled>Confirmed</a>";
            }
            if(data[i].status==2){
                var ht="<a href='javascript:void(0)' class='btn  btn-danger' disabled>Canceled</a>";
            }

             if(data[i].status==3){
                var ht="<a href='javascript:void(0)' class='btn  btn-danger' disabled>Pickup</a>";
            }
            if(data[i].status==4){
                var ht="<a href='javascript:void(0)' class='btn  btn-info' disabled>Received</a>";
            }
            if(data[i].status==5){
                var ht="<a href='javascript:void(0)' class='btn  btn-warning' disabled>Washing</a>";
            }
            if(data[i].status==6){
                var ht="<a href='javascript:void(0)' class='btn  btn-success' disabled>Sent</a>";
            }

           var htm='<div class="dropdown"><button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action<span class="caret"></span></button>';

    htm += '<ul class="dropdown-menu">';
    htm +='<li><a  href="javascript:void(0)" onclick="changeStatus(1,'+data[i].id+')">Confirmed</a></li>';
    htm +='<li><a  href="javascript:void(0)" onclick="changeStatus(2,'+data[i].id+')">Canceled</a></li>';
    htm +='<li><a  href="javascript:void(0)" onclick="changeStatus(3,'+data[i].id+')">Pickup</a></li>';
    htm += '<li><a  href="javascript:void(0)" onclick="changeStatus(4,'+data[i].id+')">Received</a></li>';
    htm += '<li><a  href="javascript:void(0)" onclick="changeStatus(5,'+data[i].id+')">Washing</a></li>';
    htm += '<li><a  href="javascript:void(0)" onclick="changeStatus(6,'+data[i].id+')">Sent</a></li></ul>';
    htm += '</div>&nbsp;';
           var inv='<a href="javascript:void(0)" class="btn btn-primary" onclick="payment('+data[i].id+')">Receipt</a>&nbsp;&nbsp;<a href="javascript:void(0)" class="btn btn-success" onclick="edits('+data[i].unit+','+data[i].type+','+data[i].id+')">Edit</a>';
            row.insertCell(11).innerHTML = htm+ht;
            row.insertCell(12).innerHTML = inv;
            rowCount++;

        }
        callForPagination(resp);
        return true;
    }

    function payment(id){
      window.open(baseurl + '/booking/viewPayment/' + id, '_blank');
    }

    function edits(unit,type,id){
    $('#id').val(id);
    $('#unit').val(unit);
    $('#type').val(type);
    jQuery.noConflict();
    $('#approve-modal').modal('show');
    
}

  function updateApprovedData(e){
    e.preventDefault();
    var id = $("#id").val();
        if ($('#id').val() == "") {

            var url = baseurl + "/booking/creates";
        } else {
            var url = baseurl + "/booking/updates/" + id;
        }
        $.ajax({
            method: "POST",
            url: url,
            data: $("#form").serialize(),
            beforeSend: function(){
    // Show image container
    $("#loader").show();
   },
    
            success: function (resp) {
                var a = JSON.parse(resp);
                // jQuery.noConflict();
                // toast(a);
                if (a.status == 1) {
                    $("#id").val("");
                    $("#submit").text("Create");
                    resetForm($('#form'));
                    alert("Successfully updated");
                    $('#approve-modal').modal('hide');
                }
                table();



            },
   complete:function(data){
    // Hide image container
    $("#loader").hide();
   },


            fail: function () {

                alert("failed");
            }
        });
  }

    function changeStatus(sid,id){
       $.ajax({
                method: 'get',
                url: baseurl + "/booking/changeStatus?status=" + sid +"&id="+id,
                beforeSend: function(){
    // Show image container
    $("#loader1").show();
   },
   success: function (resp) {
                    var a = JSON.parse(resp);
                     jQuery.noConflict();
                    // toast(a);
                    alert("Operation Successfull");
                    table();

                },
   complete:function(data){
    // Hide image container
    $("#loader1").hide();
   },
                
                fail: function () {
                    alert("Fail");

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
            url: baseurl + "/booking/edit/" + id,
            success: function (resp) {
                assignValues(resp);
                $('#id').val(resp.id);


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
                url: baseurl + "/booking/deletes/" + id,
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
