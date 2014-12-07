<?php
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>PDO Read Records - code from codeofaninja.com</title>
  
    </head>
<body>



<?php
$action = isset($_GET['action']) ? $_GET['action'] : "";
  
// if it was redirected from delete.php
if($action=='deleted'){
    echo "<div>Record was deleted.</div>";
}

?>
 
<!-- dynamic content will be here -->

<!-- just a header label -->
<h1>PDO: Read Records</h1>
  
<?php
//include database connection
include 'conn.inc.php';
  
//select all data
$query = "SELECT productNaam, productBeschrijving, productCat, productAfbeelding, productPrijs FROM producten";
$stmt = $con->prepare( $query );
$stmt->execute();
  
//this is how to get number of rows returned
$num = $stmt->rowCount();
  
//check if more than 0 record found
if($num>0){
  
    //start table
    echo "<table border='1'>";
  
        //creating our table heading
        echo "<tr>";
            echo "<th>productNaam</th>";
            echo "<th>productBeschrijving</th>";
            echo "<th>productCat</th>";
            echo "<th>productAfbeelding</th>";
            echo "<th>productPrijs</th>";
        echo "</tr>";
  
        //retrieve our table contents
        //fetch() is faster than fetchAll()
        //http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            //extract row
            //this will make $row['firstname'] to
            //just $firstname only
            extract($row);
  
            //creating new table row per record
            echo "<tr>";
                echo "<th>productNaam</th>";
                echo "<th>productBeschrijving</th>";
                echo "<th>productCat</th>";
                echo "<th>productAfbeelding</th>";
                echo "<th>productPrijs</th>";
            //         //we will use this links on next part of this post
            //         echo "<a href='edit.php?id={$id}'>Edit</a>";
            //         echo " / ";
            //         //we will use this links on next part of this post
            //         echo "<a href='#' onclick='delete_user( {$id} );'>Delete</a>";
            //     echo "</td>";
            // echo "</tr>";
        }
  
    //end table
    echo "</table>";
  
}
  
//if no records found
else{
    echo "No records found.";
}
?>



 
</body>
</html>