<?php
$serevername="localhost";
$username="root";
$password="";
$databasenabe="ntc11";
$conn= new mysqli($servername,$username,$password,$databasename);
if(conn->connect_error){
    die("connection failure:"conn->connect_error);
} 
else{
    echo"connection sucessfully:"conn->connect_error;
}