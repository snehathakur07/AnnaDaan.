<?php
    $namecharity=$name= $Website = $EmailID = $Password=$address =  $city = "";
    $phone ="";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $name = $_POST["name"];
        $namecharity = $_POST["namecharitable"];
        $phone = $_POST["phoneno"];
        $EmailID = $_POST["emailid"];
        $Website = $_POST["website"];
        $Password = $_POST["createpassword"];
        $address = $_POST["address"];
        $city = $_POST["city"];
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "electrothon";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if($conn ->connect_error) {
        die("Connection failed: ". $conn -> connect_error);
    }

    $sql = "INSERT INTO ngo(Name, NameofCharity, Phone, Email,Website, Password, address, City) VALUES ('". $name."','".$namecharity."',". $phone.",'".$EmailID."','".$Website."','".$Password."','".$address."','".$city."')";

    if($conn ->query($sql)===TRUE){
    }else {
        echo "ERROR: ".$sql."<br>".$conn ->error;
    }

    $conn -> close();

    $myfile = fopen("login.html", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("login.html"));
    fclose($myfile);
?>