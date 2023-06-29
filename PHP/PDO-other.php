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


// ---------Test 1: Retrieve Unique Values-----------
echo "Test 1: Retrieve Unique Values <br><br>";

$request_1 = "SELECT DISTINCT location FROM project";

$query_1 = $pdo->prepare($request_1);
$query_1->execute();
$uniqueLocations = $query_1->fetchAll(PDO::FETCH_COLUMN);

foreach ($uniqueLocations as $location) {
  echo $location."<br>";
};


// ---------Test 2: Blur Search-----------
echo "<br><br> Test 2: Blur Search <br><br>";

$searchTerm = "Mil"; // The search term you want to match

// Prepare the SQL query
$request_2 = "SELECT * FROM project WHERE proj_name LIKE :searchTerm1 OR fed_id LIKE :searchTerm2 OR location LIKE :searchTerm3";

// Prepare and execute the query
$query_2 = $pdo->prepare($request_2);
$query_2->execute([
  'searchTerm1' => '%' . $searchTerm . '%', 
  'searchTerm2' => '%' . $searchTerm . '%', 
  'searchTerm3' => '%' . $searchTerm . '%'
]);

// Fetch the matching results
$result_2 = $query_2->fetchAll();

// Display the results
foreach ($result_2 as $row) {
    // Process and display the data as needed
    echo "Project Name: " . $row['proj_name'] . "<br>";
    echo "Federal ID: " . $row['fed_id'] . "<br>";
    echo "Location: " . $row['location'] . "<br><br>";
}
