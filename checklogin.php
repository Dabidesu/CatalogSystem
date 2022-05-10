<?php
session_start();
$username = ($_POST['username']);
$password = ($_POST['password']);
//Debug Form Input
echo $username. " and ". $password;

$db_name = "catalogdb";
$db_username = "root";
$db_pass = "";
$db_host = "localhost";
$con = mysqli_connect("$db_host","$db_username","$db_pass", "$db_name") or die(mysqli_error()); //Connect to server
$query = "SELECT * from users WHERE username='$username'";
$results = mysqli_query($con, $query); //Query the users table if there are matching rows equal to $username
$exists = mysqli_num_rows($con, $query); //Having a Fatal Error, could be PHP version error or other hidden error. [possible fix: rollback to PHP-Package 7.4.27, or comment out this line:12]
$table_users = "";
$table_password = "";

if($results != "") //IF there are no returning rows or no existing username
{
    while($row = mysqli_fetch_assoc($results)) //display all rows from query
    {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    $table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
    }
    //echo $table_users. " & ". $table_password;
    
    if(($table_users == "admin") && ($password == $table_password)) {
        if($password == $table_password) {
            {
            $_SESSION['admin'] = $username; //set the admin in a session. This serves as a global variable
            header("location: home.php"); // redirects the user to the authenticated home page
            }
        }
        else
        {
        Print '<script>alert("Incorrect input!");</script>'; //Prompts the user
        Print '<script>window.location.assign("AdminLogin.php");</script>'; // redirects to AdminLogin.php
        } 
    }
    else {
        if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
        {
            if($password == $table_password)
            {
            $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
            header("location: home.php"); // redirects the user to the authenticated home page
            }
        }
        else
        {
        Print '<script>alert("Incorrect input!");</script>'; //Prompts the user
        Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
        }
    }
}
else
{
    Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
    Print '<script>window.location.assign("login.php");</script>'; // redirects to login.php
}
?>
