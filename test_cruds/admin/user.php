<?php 

require_once('admin_init.php');

?>

<!DOCTYPE html>
<html lang="en">

<?php meta_head();?>

<body>
    <script>
        function validate(){

            var a = document.getElementById("np").value;
            var b = document.getElementById("cp").value;
            if (a!=b) {
               $(".msg").text("Passwords do not matched!");
               return false;
            }
            
        }
     </script>
    <?php include_once('header.php');?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include_once('aside.php');?>
            </div>
            <div class="col-md-9">
                <h1>Account Settings</h1>
                <p>&gt;&gt; Change Account Password</p>
                <span class="msg"> 

                <?php 

                if(  isset($_POST['submit']) )  {

                        $np = $_POST['newpass'];
                        $cp = $_POST['confirmpass'];

                        ChangeAdminPassword($np, $cp);

                }   ?>
                    

                </span>
             <form method="POST" action="" onSubmit="return validate();" >
               
                <input id="np" class="form-control" name="newpass" type="password" required placeholder="New Password">
                <input id="cp" class="form-control" name="confirmpass" type="password" required placeholder="Confirm Password">

                <button class="btn btn-primary btn-lg" name="submit" type="submit">Save Settings</button>
            </form>
        </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
<?php include('footer.php');?>
</body>
</html>

