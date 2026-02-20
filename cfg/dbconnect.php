<?php
$con = new mysqli("localhost","root","root","eva");
if ($con->connect_error){
    die("DB connection failed ".$con->connect_error);
}
