<?php
//Database Credentials
$host = "yourserver";
$dbname = "yourdatabse";
$username = "yourusername";
$password = "yourpassword";
/*=============================================>>>>>
= DB Connection =
===============================================>>>>>*/
$pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $username, $password);
$pdo->exec('SET NAMES UTF8');
/*= End of DB Connection =*/
/*=============================================<<<<<*/

//Number of results per page
$results_per_page = 10;

//Find out number of results in the database
$query = $pdo->prepare
(
  "SELECT * FROM pagination;"
);

$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
$number_of_results = $query->rowCount();

//Find out number of total pages available
//Ceil rounds up the result to the nearest integer
$number_of_pages = ceil($number_of_results / $results_per_page);

// echo 'Number of pages '.$number_of_pages;
/*=============================================>>>>>
= Pages =
===============================================>>>>>*/
// page1 = results 1-10
// page2 = results 11-20
// page3 = results 21-30
//
// page1 = 10 results per page, LIMIT 0,10
// page2 = 10 resutls per page, LIMIT 10,10
// page3 = 10 results per page, LIMIT 20,10
// starting_limit_number = (page1-1)*10
/*= End of Pages =*/
/*=============================================<<<<<*/

if (!isset($_GET['page'])) {
  $page=1;
}else {
  $page = $_GET['page'];
}
//Create a starting limit number
$this_page_first_result = ($page-1)*$results_per_page;

//Limit the results displayed
$query = $pdo->prepare
(
  "SELECT * FROM pagination LIMIT ".$this_page_first_result.",".$results_per_page." ;"
);

$query->execute();

$results = $query->fetchAll(PDO::FETCH_ASSOC);
