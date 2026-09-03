<?php

$host = "localhost";
$username = "root";
$password = "";


// Receive form data

$name = $_POST['name'];
$age = $_POST['age'];
$gmail = $_POST['gmail'];
$gender = $_POST['gender'];
$user_type = $_POST['user_type'];



// BUYER INSERT

if($user_type == "buyer")
{

    $database = "web buy table";


    $conn = mysqli_connect(
        $host,
        $username,
        $password,
        $database
    );


    if(!$conn)
    {
        die("Database connection failed");
    }



    $sql = "INSERT INTO login
    (name, age, gmail, gender, type)

    VALUES

    ('$name','$age','$gmail','$gender','buyer')";



    if(mysqli_query($conn,$sql))
    {
        header("Location: buyer.html");
        exit();
    }

    else
    {
        echo "Insert Error: ".mysqli_error($conn);
    }


}




// SELLER INSERT


if($user_type == "seller")
{


    $database = "web sell table";


    $conn = mysqli_connect(
        $host,
        $username,
        $password,
        $database
    );



    if(!$conn)
    {
        die("Database connection failed");
    }



    $sql = "INSERT INTO login
    (name, age, gmail, gender, type)

    VALUES

    ('$name','$age','$gmail','$gender','seller')";



    if(mysqli_query($conn,$sql))
    {
        header("Location: seller.php");
        exit();
    }


    else
    {
        echo "Insert Error: ".mysqli_error($conn);
    }


}


?>