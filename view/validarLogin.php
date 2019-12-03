<?php
session_start();
if (!isset($_SESSION["usuario"])){
    echo "<script>";
    echo "window.location = '../index.php';";
    echo "</script>";
}
