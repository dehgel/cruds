<?php 

require_once('admin_init.php');

$pid = $_GET['id'];

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
                <div class="row editcontact">
                    <div class="col-md-12">
                        <h1>Edit Contact</h1>
                    </div>
                    
                    <div class="col-md-8">
                        <?php 

                        if( isset($_POST['update'])) {

                            @updateData();

                            echo 'View profile: <a href="/admin/view.php?id='. $pid .'""> /admin/view.php?id='. $pid .'</a>';
                        } 

                        ?>
                        <form method="POST" action="" enctype="multipart/form-data">
                            <input class="input-lg" type="text" name="firstname" required="" value="<?php echo getSelectedData('FIRST_NAME'), PHP_EOL;?>" placeholder="First Name">
                            <input class="input-lg" type="text" name="lastname" required="" value="<?php echo getSelectedData('LAST_NAME'), PHP_EOL;?>" placeholder="Last Name">
                            <fieldset> 
                                <div class="radio">
                                <label for="sex"><input type="radio" name="sex" <?php echo getSelectedData('GENDER') == 'MALE' ? 'checked' :  '' ; ?> value="Male">Male</label>
                                <label for="sex"><input type="radio" name="sex" <?php echo getSelectedData('GENDER') == 'Female' ? 'checked' :  '' ; ?> value="Female" >Female</label>
                                </div>
                            </fieldset>
                            <input class="input-lg" type="text" name="email" value="<?php echo getSelectedData('EMAIL'), PHP_EOL;?>" placeholder="Email">
                            <input class="input-lg" type="text" name="phone" value="<?php echo getSelectedData('PHONE'), PHP_EOL;?>" placeholder="Phone No.">
                            <textarea class="input-lg" wrap="hard" name="bio" placeholder="Bio"><?php echo getSelectedData('BIO'), PHP_EOL;?></textarea>
                           
                           <input name="file" type="file">
                            <div class="btn-wrapper">
                                <input class="form-control" type="hidden">
                                <input class="btn btn-default" name="update" type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php include('footer.php');?>

</html>

