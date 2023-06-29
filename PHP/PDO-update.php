<!-- https://phpdelusions.net/pdo#query -->
<?php

$host = 'localhost';
$db = 'tip';
$user = 'Jing';
$pass = 'Annie@ai258258';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset;";

$options = [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES => false,
];

try{
  $pdo = new PDO($dsn, $user, $pass, $options);
}catch(\PDOException $e){
  throw new \PDOException($e->getMessage(),(int)$e->getCode());
}


// ---------Test 1 update Data-----------
// $id = "1";
// $name = "MilMilground F";
// $loc = "Mon County";

// $reqeust_1 = "UPDATE project SET proj_name=?, location=? WHERE id=?";
// $query_1 = $pdo->prepare($reqeust_1);
// $query_1->execute([$name, $loc, $id]);

// ---------Test 2 update Data-----------
// $data = [
//   'name'=> "Mmimimi Rd",
//   'fed_id'=> "PPP1123",
//   'loc'=> "Knowwhere",
//   'id'=> "2",
// ];

// $reqeust_2 = "UPDATE project SET proj_name=:name, location=:loc, fed_id=:fed_id WHERE id=:id";
// $query_2 = $pdo->prepare($reqeust_2);
// $query_2->execute($data);

// ---------Test DELETE Data-----------
// $loc = "Knowwhere";
// $request_1 = "DELETE FROM project WHERE location=?";
// $query_1 = $pdo->prepare($request_1);
// $query_1->execute([$loc]);