<?php 

require_once('admin_init.php');

?>

<!DOCTYPE html>
<html lang="en">
<?php meta_head();?>

<body>
    <?php include_once('header.php');?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php include_once('aside.php');?>
            </div>
           <div class="col-md-9">
                <div class="clearfix"></div>

                

                <div class="row">
                    <div class="entry">
                        <?php if( isset( $_POST['save'] ) ) {

                          savedata(); 

                        }?>
                    </div>
                    <div class="col-md-12">
                        <h1>Add New Entry</h1>
                        <p>Fill all the appropriate form to successfully add new data.</p>
                        <form method="POST" enctype="multipart/form-data">
                            <input class="form-control" name="email" type="email" placeholder="Email">
                            <input class="form-control" name="firstname" type="text" placeholder="First Name">
                            <input class="form-control" name="lastname" type="text" placeholder="Last Name">
                            <fieldset id="gender">
                                <div class="radio">
                                  <input name="gender" id="smale" value="Male" type="radio" style="margin: 4px 0!important;"><label for="smale">Male</label>
                                   <input name="gender" id="sfemale" value="Female" type="radio" style="margin: 4px 0!important;""><label for="sfemale">Female</label>
                                </div>
                            </fieldset>
                            <textarea class="form-control" name="bio" placeholder="Write a short description"></textarea>
                            <input class="form-control" name="phone" type="text" placeholder="Phone No.">
                           
                            <input name="file" type="file">
                            <div class="btn-wrapper">
                                <input class="form-control" type="hidden">
                                <input class="btn btn-default" name="save" type="submit" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        </div>
    </div>
    <?php include('footer.php');?>
</body>

</html>

