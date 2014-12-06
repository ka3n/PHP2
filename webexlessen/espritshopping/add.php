<?php  ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>PDO Create New Record</title>
    </head>
<body>
 
<!-- just a header -->
<h1>PDO: Add a Record</h1>
 
<?php
 if($_POST){
    //include database connection
    include 'includes/config.inc.php';
  
    try{
  
        //write query
        $query = "INSERT INTO producten SET naam = ?, beschrijving = ?, afbeelding = ?, prijs = ?";
  
        //prepare query for excecution
        $stmt = $con->prepare($query);
  
        //bind the parameters
        //this is the first question mark
        $stmt->bindParam(1, $_POST['naam']);
  
        //this is the second question mark
        $stmt->bindParam(2, $_POST['beschrijving']);
  
        //this is the third question mark
        $stmt->bindParam(3, $_POST['afbeelding']);
  
        //this is the fourth question mark
        $stmt->bindParam(4, $_POST['prijs']);
  
        // Execute the query
        if($stmt->execute()){
            echo "Record was saved.";
        }else{
            die('Unable to save record.');
        }
  
    }catch(PDOException $exception){ //to handle error
        echo "Error: " . $exception->getMessage();
    }
}
?>

<!--we have our html form here where user information will be entered-->
<form action='#' method='post' border='0'>
    <table>
        <tr>
            <td>naam</td>
            <td><input type='text' name='naam' required /></td>
        </tr>
        <tr>
            <td>beschrijving</td>
            <td><input type='text' name='beschrijving' required /></td>
        </tr>
        <tr>
            <td>afbeelding</td>
            <td><input type='text' name='afbeelding' required /></td>
        </tr>
        <tr>
            <td>prijs</td>
            <td><input type='text' name='prijs' required /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type='submit' value='Voeg toe' />
  
                <a href='index.php'>Back to index</a>
            </td>
        </tr>
    </table>
</form>
 
</body>
</html>