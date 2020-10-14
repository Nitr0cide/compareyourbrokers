<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

global $bdd;

require "../vendor/autoload.php";
require "../ini/functions.php";
require "../src/model/session.php";
require "../src/model/model.php";
require "../src/model/brokers.php";
require "../src/model/forms.php";

session_start();

$previousURL = $_SERVER["REQUEST_URI"];

!isset($_SESSION["login"]) ? $_SESSION["login"] = "" : "";

$bdd = new PDO("mysql:host=comparl954.mysql.db;dbname=comparl954;charset=UTF8", "comparl954", "a587dZkllm68944S");

