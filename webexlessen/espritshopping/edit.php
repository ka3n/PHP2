<?php  ?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Update A Record</title>
  
    </head>
<body>
 
<h1>PDO: Update a Record</h1>
  
<?php
//include database connection
include 'libs/db_connect.php';
?>

<?php  
if($_POST){
    try{
  
        //write query
        //in this case, it seemed like we have so many fields to pass and
        //its kinda better if we'll label them and not use question marks
        //like what we used here
        $query = "update users
                    set firstname = :firstname, lastname = :lastname, username = :username, password  = :password
                    where id = :id";
  
        //prepare query for excecution
        $stmt = $con->prepare($query);
  
        //bind the parameters
        $stmt->bindParam(':firstname', $_POST['firstname']);
        $stmt->bindParam(':lastname', $_POST['lastname']);
        $stmt->bindParam(':username', $_POST['username']);
        $stmt->bindParam(':password', $_POST['password']);
        $stmt->bindParam(':id', $_POST['id']);
  
        // Execute the query
        if($stmt->execute()){
            echo "Record was updated.";
        }else{
            die('Unable to update record.');
        }
  
    }catch(PDOException $exception){ //to handle error
        echo "Error: " . $exception->getMessage();
    }
}
?>
 
<?php
try {
  
    //prepare query
    $query = "select id, firstname, lastname, username, password from users where id = ? limit 0,1";
    $stmt = $con->prepare( $query );
  
    //this is the first question mark
    $stmt->bindParam(1, $_REQUEST['id']);
  
    //execute our query
    $stmt->execute();
  
    //store retrieved row to a variable
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    //values to fill up our form
    $id = $row['id'];
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $username = $row['username'];
    $password = $row['password'];
  
}catch(PDOException $exception){ //to handle error
    echo "Error: " . $exception->getMessage();
}
?>

<!--we have our html form here where new user information will be entered-->
<form action='#' method='post' border='0'>
    <table>
        <tr>
            <td>Firstname</td>
            <td><input type='text' name='firstname' value='<?php echo $firstname;  ?>' /></td>
        </tr>
        <tr>
            <td>Lastname</td>
            <td><input type='text' name='lastname' value='<?php echo $lastname;  ?>' /></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type='text' name='username'  value='<?php echo $username;  ?>' /></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input type='password' name='password'  value='<?php echo $password;  ?>' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <!-- so that we could identify what record is to be updated -->
                <input type='hidden' name='id' value='<?php echo $id ?>' /> 
 
                <input type='submit' value='Edit' />
  
                <a href='index.php'>Back to index</a>
            </td>
        </tr>
    </table>
</form>
 
</body>
</html>