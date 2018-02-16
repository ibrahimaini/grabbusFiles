<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="themes/css/style.css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('a[rel*=facebox]').facebox({
            loadingImage: 'src/loading.gif',
            closeImage: 'src/closelabel.png'
        })
    })
</script>

<?php
include('db.php');
$busnum=$_POST['route'];
$departure_date=$_POST['departure_date'];
$return_date=$_POST['return_date'];
$qty=$_POST['qty'];
$result = mysql_query("SELECT * FROM route WHERE id='$busnum'");
while($row = mysql_fetch_array($result))
  {
    $numofseats=$row['numseats'];
    $query = mysql_query("SELECT sum(seat_reserve) FROM reserve where departure_date = '$departure_date' AND return_date = '$return_date'");
              while($rows = mysql_fetch_array($query))
                {
                $inogbuwin=$rows['sum(seat_reserve)'];
                }
    $avail=$numofseats-$inogbuwin;
    $setnum=$inogbuwin+1;
  }
?>
    <?php
if ($avail < $qty){
echo 'Qty reserve exced the available seat of the bus';
}
else if($avail > 0)
{
?>
        <script type="text/javascript">
            function validateForm() {
                var x = document.forms["form"]["fname"].value;
                if (x == null || x == "") {
                    alert("First Name must be filled out");
                    return false;
                }
                var y = document.forms["form"]["lname"].value;
                if (y == null || y == "") {
                    alert("Last Name must be filled out");
                    return false;
                }
                var a = document.forms["form"]["address"].value;
                if (a == null || a == "") {
                    alert("Address must be filled out");
                    return false;
                }
                var b = document.forms["form"]["contact"].value;
                if (b == null || b == "") {
                    alert("Contact Number must be filled out");
                    return false;
                }

            }
        </script>
        <div id="stylized" class="myform">

            <form id="form" name="form" action="save.php" method="post" onsubmit="return validateForm()">
                <input type="hidden" value="<?php echo $busnum ?>" name="busnum" />
                <input type="hidden" value="<?php echo $departure_date ?>" name="departure_date" />
                <input type="hidden" value="<?php echo $return_date ?>" name="return_date" />
                <input type="hidden" value="<?php echo $qty ?>" name="qty" />
                <label>Seat Number
                    <span class="small">Auto Generated <a rel="facebox" href="seatlocation.php?id=<?php echo $busnum; ?>">view seat</a></span>
                </label>
                <input type="text" name="setnum" value="
<?php
$N = $qty;
for($i=0; $i < $N; $i++)
{
echo $i+$setnum.', ';
} 
 ?>
" id="name" readonly/>
                <br>
                <label>First Name
                    <span class="small">Enter first name</span>
                </label>
                <input type="text" name="fname" id="name" />
                <br>
                <label>Last Name
                    <span class="small">Enter last name</span>
                </label>
                <input type="text" name="lname" id="name" />
                <br>
                <label>Address
                    <span class="small">Enter Address</span>
                </label>
                <input type="text" name="address" id="name" />
                <br>
                <label>Contact
                    <span class="small">Enter Contact Number</span>
                </label>
                <input type="text" name="contact" id="name" />
                <br>
                <button type="submit">Confirm</button>
            </form>
        </div>
        <?php
}
else if($avail <= 0)
{
echo 'no available sets';
}
?>