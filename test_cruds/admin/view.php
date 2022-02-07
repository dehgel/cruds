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
                <div class="row editcontact">
                    <div class="col-md-12">
                            <h1>Profile</h1>
                    </div>
                    <div class="col-md-12">
                        <div class="row entry" style="margin-top:20px;">
                                                     
                                <div class="col-md-8">

                                    <table class="table fullwidth">
                                      <tbody>
                                      <tr>
                                        <td><p class="contact-info">First Name: </p></td>
                                        <td><b><?php echo getSelectedData('FIRST_NAME'), PHP_EOL;?></b></td>
                                    
                                      </tr>
                                      <tr>
                                        <td><p class="contact-info">Last Name: </p></td>
                                        <td><b><?php echo getSelectedData('LAST_NAME'), PHP_EOL;?></b></td>
                                      </tr>
                                      <tr>
                                        <td><p class="contact-info">Gender: </p></td>
                                        <td><b><?php echo getSelectedData('GENDER'), PHP_EOL;?></b></td>
                                      </tr>
                                      <tr>
                                        <td><p class="contact-info">Email: </p></td>
                                        <td><b><?php echo getSelectedData('EMAIL'), PHP_EOL;?></b></td>
                                      </tr>
                                      <tr>
                                        <td><p class="contact-info">Phone No.: </p></td>
                                        <td><b><?php echo getSelectedData('PHONE'), PHP_EOL;?></b></td>
                                      </tr>
                                      <tr>
                                        <td><p class="contact-info">Biography: </p></td>
                                        <td><b><?php echo getSelectedData('BIO'), PHP_EOL;?></b></td>
                                      </tr>
                                      <tr>
                                        <td><p class="contact-info">Date Registered: </p></td>
                                        <td><b><?php echo getSelectedData('DATE_ENTERED'), PHP_EOL;?></b></td>
                                      </tr>
                                    </tbody>

                                </table>

                                <div class="col-md-12">

                                    <a class="btn-link" href="edit.php?id=<?php echo getSelectedData('ID');?>" style="padding: 10px 30px;background: #1c88bb;color: #fff;">Edit</a> <a class="btn-link" href="index.php?rid=<?php echo getSelectedData('ID');?>" style="padding: 10px 30px;background: #eb4949;color: #fff;">Delete</a>

                                </div>
                                    
                                </div>
                               
                                <div class="col-md-2">

                                    <div ><img src="<?php echo getSelectedData('PHOTO');?>" width="140px" style="border:1px solid #989a9b;"></div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>
 <?php include('footer.php');?>
</body>

</html>

