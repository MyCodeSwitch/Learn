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


// ---------Test 1 Insert Data-----------
// echo "Test 1";

// $name = "Mildeground Widenning";
// $fed_id = "LLO03566";
// $location = "Mon County";

// $request_t1 = 
// "INSERT INTO project (proj_name, fed_id, location) VALUE(?,?,?)";

// $query_t1 = $pdo->prepare($request_t1);

// $query_t1->execute ([$name, $fed_id, $location]);

// echo "<br><br><br>";

// ---------Test 2 Insert Data-----------
// echo "Test 2 <br>";

// $name = "Love Street";
// $fed_id = "LOVE99034";
// $location = "Changsha";

// $data = [
//   'name' => $name,
//   'id' => $fed_id,
//   'loc' => $location,
// ];

// $request_t2 = "INSERT INTO project (proj_name, fed_id, location) VALUES (:name, :id, :loc)";

// $query_t2 = $pdo->prepare($request_t2);
// $query_t2->execute($data);


// echo "<br><br><br>";

// ---------Test 3 Insert Data-----------

// $data = [
//   ['Willey St Improvement', 'DOOE33409', 'Morgantown'],
//   ['University Ave', 'AOOE33332', 'Start City'],
// ];

// $request_t3 = "INSERT INTO project (proj_name, fed_id, location) VALUES (?,?,?)";

// $query_t3 = $pdo->prepare($request_t3);

// try{
//   $pdo->beginTransaction();
//   foreach($data as $row)
//   {
//     $query_t3->execute($row);
//   }
//   $pdo->commit();
// }catch (Exception $e){
//   $pdo->rollback();
//   throw $e;
// }



