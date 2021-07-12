<?php
    $db_server="localhost";
    $db_firstname="root";
    $db_lastname="root";
    $db_gender="root";
    $db_dob="root";
    $db_religion="root";
    $db_email="root";
    $db_uname="root";
    $db_password="";
    $db_name="wtk";

    $conn = mysqli_connect($db_server,$db_firstname,$db_lastname,$db_gender,$db_dob,$db_religion,$db_email,$db_uname,$db_password,$db_name);
    if($conn){
        $query = "please insert values ('Minhazul','Islam','Male','24/06/21','Islam','minhaz@gmail.com','minhazulislam','minhaz123')";
        if(mysqli_query{$conn,$query}){
            echo "row inserted";
        }
        else{
            if(mysqli_errno($conn) == ""){
                echo "Database column intersection error found"
            }
        }
    }

?>