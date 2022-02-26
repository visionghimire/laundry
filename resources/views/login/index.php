<link rel="stylesheet" type="text/css" href="css/login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js" ></script>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            
            <div class="card">
                <form method="post" action="<?php echo url('/login');?>" class="box">
                    <h1>Admin Login</h1>
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <p class="text-muted"> Please enter your username and password!</p> 
                    <input id="username" name="username" type="text"  placeholder="Username"> 
                    <input type="password" id="password" name="password"  placeholder="Password"> 
                    <input type="submit" name="" value="Login" href="#">
                    <?php if(Session::has('msgerror')):?>

<h3 style="color:red">Login Failed.</h3><p style="color:red"><?php echo Session::get('msgerror'); ?></p>
<?php endif;?>
                </form>
            </div>
        </div>
    </div>
</div>