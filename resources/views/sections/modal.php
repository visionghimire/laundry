<style>
  .modal-footer{
    border-top-color:#ffffff !important;
  }
</style>
<div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 id="modal-heading" class="modal-title">Assign Barcode</h4>
                </div>   
              <div id="modal-body" class="modal-body">
              
                <form id="form" action="" method="post" onsubmit="save(event)">
                 <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                          <!--  <label for="code" class="col-sm-12 ">Staff ID<b style="color:red">*</b></label> -->
                                <input type="hidden" name="user_id" id="user_id" value="">
                               <div class="form-group">
                              <label for="code" class="col-sm-3 control-label">Member Name</label>

                              <div class="col-sm-9">
                                  <input class="form-control" id="mem_name" type="text" name="mem_name" value="" readonly><br>
                              </div>
                          </div>

                                 <div class="form-group">
                              <label for="code" class="col-sm-3 control-label">Barcode</label>

                              <div class="col-sm-9">
                                  <input class="form-control" id="barcode" placeholder="Scan Barcode here.." type="text" name="barcode" value="" onkeyup="keypresss(event)"><br>
                              </div>
                          </div>


                  <div class="modal-footer">
               
                <!-- <div id="foot"> -->
                <button type="button" class="btn btn-default pull-left" onclick="hello()" data-dismiss="modal">Close</button>
                <button id="modal-save" type="submit" class="btn btn-primary">Save</button>


                <!-- </div> -->
              </div>
              
              </form>
              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

         <script type="text/javascript">
    var baseurl = "<?php echo url('/'); ?>";
   
function keypresss(e){
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
}
</script>