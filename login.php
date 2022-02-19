<?php
    $email = $password = $login = "";

    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $login = $_POST["login"];
    }
    $servername = "localhost";
    $username = "root";
    $Password = "";
    $dbname = "electrothon";

    $conn = new mysqli($servername, $username, $Password, $dbname);
    if($login == "Donor"){
        $sql = "SELECT Password from donor where email = '". $email. "'";
        $result = $conn ->query($sql);

        if($result ->num_rows == 0){
            echo "<script>alert('Username is invalid')</script>";
            $myfile = fopen("login.html", "r") or die("Unable to open file!");
            echo fread($myfile,filesize("login.html"));
            fclose($myfile);
        }else {
            $row = $result ->fetch_assoc();
            if($row["Password"]!= $password){
                echo "<script>alert('Password is invalid')</script>";
                $myfile = fopen("login.html", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("login.html"));
                fclose($myfile);
            }else {
                $myfile = fopen("index.html", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("index.html"));
                fclose($myfile);
            }
        }

    }else {
        $sql = "SELECT Password from ngo where email = '". $email. "'";
        $result = $conn ->query($sql);

        if($result ->num_rows == 0){
            echo "<script>alert('Username is invalid')</script>";
            $myfile = fopen("login.html", "r") or die("Unable to open file!");
            echo fread($myfile,filesize("login.html"));
            fclose($myfile);
        }else {
            $row = $result ->fetch_assoc();
            if($row["Password"]!= $password){
                echo "<script>alert('Password is invalid')</script>";
                $myfile = fopen("login.html", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("login.html"));
                fclose($myfile);
            }else {
                $myfile = fopen("index.html", "r") or die("Unable to open file!");
                echo fread($myfile,filesize("index.html"));
                fclose($myfile);
            }
        }
    }
?>