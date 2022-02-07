<footer style="padding-top: 50px;">
    <div class="container">
         <div class="col-md-12">
            <p>This was built under PHP version 7.3.27. Current PHP version is <?php echo phpversion();?></p>
        </div>
    </div>
</footer>
<script>

//Search filter 
function searchFilter() {

   	var filter = event.target.value.toUpperCase();
   	
    var rows = document.querySelector("#table tbody").rows;
    
    for (var i = 0; i < rows.length; i++) {

        var fname = rows[i].cells[1].textContent.toUpperCase();

        var lname = rows[i].cells[2].textContent.toUpperCase();

        if (fname.indexOf(filter) > -1 || lname.indexOf(filter) > -1) {

            rows[i].style.display = "";

        } else {

            rows[i].style.display = "none";

        }      
    }
}
</script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>