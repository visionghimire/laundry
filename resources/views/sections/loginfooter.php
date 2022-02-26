<footer >



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="<?php echo asset('js/jquery.toast.min.js');?>"></script>



<script type="text/javascript">
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
</script>

</body>
</html>
