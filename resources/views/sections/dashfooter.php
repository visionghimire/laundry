<script src="<?php echo asset('assets/plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo asset('assets/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<!-- SlimScroll -->
<script src="<?php echo asset('js/combodate.js');?>"></script>

 <script src="<?php echo asset('js/scripts.js'); ?>" type="text/javascript"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo asset('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo asset('assets/plugins/fastclick/fastclick.js');?>"></script>
<script src="<?php echo asset('js/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo asset('js/jquery.toast.min.js');?>"></script>
<script src="<?php echo asset('js/nepdate.js'); ?>"></script>
<!-- <script src="<?php echo asset('js/select2.min.js'); ?>"></script> -->
<!-- AdminLTE App -->
<script src="<?php echo asset('js/app.min.js');?>"></script>
<script src="<?php echo asset('js/app.js');?>"></script>
<script src="<?php echo asset('js/adminlte.min.js');?>"></script>

<script src="<?php echo asset('js/inputmask.js');?>"></script>
<script src="<?php echo asset('js/pagination.js');?>"></script>
<script src="<?php echo asset('js/jquery.mask.js');?>"></script>
<script src="<?php echo asset('js/jquery.mask.min.js');?>"></script>
<script src="<?php echo asset('js/demo.js');?>"></script>
 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

 
<script type="text/javascript">
(function(){
    //work for the notifications
    if(typeof notification === "object" && notification !== null){
        if(notification.status==0){
           var icon = "error";
        }
        else if(notification.status==1){
            var icon = "success";
        }
        else if(notification.status==2){
            var icon = "warning";
        }
        else{
            var icon = "";
        }
        var tostObj = {
            heading:notification.title,
            text:notification.text,
            showHideTransition: 'slide',
            position:'top-right',
            icon:icon
        };
        $.toast(tostObj);
    }


})();
    function toast(a){
     var tostObj = {
                heading:a.title,
                text:a.text,
                showHideTransition:'slide',
                 position:'top-right',
                icon:a.title
               };

             $.toast(tostObj);


      return true;
    }

    

    <?php if("table"){?>
 if(typeof(table)=="function"){ 

  table();

 }
<?php } ?>



    
</script>