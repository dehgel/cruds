<?php 

session_start();

if(isset($_SESSION['user'])) { 
    $username = sha1( $_SESSION['user']) ;
    $password = $_SESSION['pass'];
    $id = session_id();

} else {
    header('Location: /index.php');
    die();
}

require_once('admin_init.php');

// Reset database Query
$sqlcom = new SQLQuery();

// Select row from data table                                   
$object = '*';

// Select data table
$table = 'contacts';

// Set row_count per page to 10
$limit = 10;


if (!isset ($_GET['page']) ) {

    $page = 1;

} else {
    
    $page = $_GET['page'];
}

$initial = ($page - 1) * $limit;

// Empty if no arguments
$args = 'LIMIT '. $initial .', '. $limit ;

$query = $sqlcom->SelectQuery( $object, $table, $args );

$num_result = $query->num_rows;

$total_page = ceil($num_result / $limit );


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
                <div class="row listcontacts">
                    <h1>List of Contacts </h1>
                    <p>Chose links under options to manage the contact.</p>
                    <?php 

                        @remove_from_data();             

                    ?>
                    <div class="table-responsive">

                        <table id="table" class="table">
                            <form method="POST">
                                <label for="search" style="float:right;">Search: <input id="search-input" onkeyup="searchFilter()" name="search" type="search" placeholder="Search for a name..." ></label>
                            </form>
                            <thead>
                                <tr>
                                    <th>ID </th>
                                    <th>FIRST NAME</th>
                                    <th>LAST NAME</th>
                                    <th>SEX</th>
                                    <th>EMAIL </th>
                                    <th>PHONE NO.</th>
                                    <th>OPTIONS </th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                <?php 
 
                                    if ($query->num_rows > 0) {

                                          // output data of each row
                                          while($row = $query->fetch_assoc()) {

                                            echo    '<tr><td>'. $row["ID"] . '</td>' .
                                                    
                                                    '<td>' . $row["FIRST_NAME"] . '</td>' .
                                                    '<td>' . $row["LAST_NAME"] . '</td>' .
                                                    '<td>' . $row["GENDER"][0] . '</td>' .
                                                    '<td>' . $row["EMAIL"] . '</td>' .
                                                    '<td>' . $row["PHONE"] . '</td>' . 
                                                    ' <td><a href="edit.php?id='.$row['ID'].'">Edit</a> | <a href="index.php?rid='.$row['ID'].'">Delete</a> | <a href="view.php?id='.$row['ID'].'">View</a></td></tr>' . PHP_EOL;
                                          }
                        
                                    }

                                ?>

                            </tbody>
                        </table>
                    </div>
                    <nav>
                        <ul class="pagination">

                            <?php 

                            if( $page <= 1 ) {

                                echo '<li><a href="index.php?page='. $page.'" aria-label="Previous"><span aria-hidden="true">«</span></a></li>'; 

                            } else { 

                                echo '<li><a href="index.php?page='. ($page - 1).'" aria-label="Previous"><span aria-hidden="true">«</span></a></li>'; 
                            } 
                              

                                for( $i = 1; $i <= $num_result; $i++ ) {

                                        echo '<li><a href = "index.php?page=' . $i . '">' . $i . ' </a></li>';

                                }

                            if( $page >= $num_result ) {

                                echo '', PHP_EOL;

                            }  else {
                                echo '<li><a href="index.php?page='. ($page + 1) .'" aria-label="Next"><span aria-hidden="true">»</span></a></li>';
                            }

                            ?>
                        </ul>
                    </nav>
                </div>
       
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <?php include('footer.php');?>
    
</body>

</html>
