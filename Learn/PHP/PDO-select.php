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

//start to get information from database 

//***********Test 1: Foreach()***********
echo '<br> Test 1 <br>';

//prepare the request
$requestT1 = 'SELECT proj_name FROM project';

//ask PDO do the query and store it with $result_names 
$resultT1 = $pdo->query($requestT1); 

echo var_dump($resultT1).'<br>'; //the outcome is a PDOStatement 

//Get the data out
foreach ($resultT1 as $row){
  echo "Project name: $row[proj_name] <br>";
};
echo '<br><br><br>';

//***********Test2: Geeting a single row()***********
echo '<br> Test 2 <br>';

//prepare the request
$reqeust_t2 = "SELECT * FROM project ORDER BY id DESC LIMIT 1";
$query_t2 = $pdo->query($reqeust_t2);
$result_t2 = $query_t2->fetch();
echo "The last inserted project $result_t2[proj_name] located in $result_t2[location]";
echo '<br><br><br>';

//***********Test3: get multiple rows() with while***********
echo '<br> Test 3 <br>';
$request_t3 ="SELECT * FROM project";
$query_t3 = $pdo->query($request_t3);
while ($row = $query_t3->fetch()){ //use while()
  echo "$row[fed_id] - $row[proj_name] <br>";
}
echo '<br><br><br>';

//***********Test4: get multiple rows() with foreach***********
echo '<br> Test 4 <br>';
$request_t4 ="SELECT * FROM project";
$query_t4 = $pdo->query($request_t4);
$result_t4 = $query_t4->fetchAll();

foreach ($result_t4 as $row){
  echo "$row[proj_name] in $row[location]<br>";
}

echo '<br><br><br>';


//***********Test5: Select query with parameters***********
echo '<br> Test 5 <br>';

//Set the variable
$loc = 'Westover';

//set the reqeust
$request_t5 ="SELECT * FROM project WHERE location=?";

//Prepare the query
$query_t5 = $pdo->prepare($request_t5);

//Excute the query to get PDOStatement
$query_t5->execute([$loc]); 

//Count rows
$count = $query_t5->rowCount();

//Display
if($count > 0){
  echo "there are $count project: <br>";
  While ($row = $query_t5->fetch()){
    echo "Project: $row[proj_name] - $row[location].<br>";
  }
}else{
  echo "No projects found for the location: $loc";
}
echo '<br><br><br>';



//***********Test6***********
echo 'test 6 <br>';

$query_t6 = $pdo->query("SELECT * FROM project");

$results_t6 = $query_t6->fetchAll();

foreach ($results_t6 as $row){
  $projName = $row['proj_name'];
  $projFedId = $row['fed_id'];
  $projLocation = $row['location'];

  echo "Project of $projName with Federal ID: $projFedId located in $projLocation <br>";
};
echo '<br><br><br>';


//Test 4 -------Insert Data-----------
// echo 'Test 4 Insert Data <br>';

// $proj_name = 'Airport Sidewalk';
// $fed_id = 'CLOF003453';
// $location = 'Morgantown';

// $query_insert = "INSERT INTO project (proj_name, fed_id,location) VALUES ('$proj_name', '$fed_id', '$location')";

// $affected_rows = $pdo->exec($query_insert);

// if ($affected_rows === 0){
//   echo "THe insertion did not affect any rows.";
// }else{
//   echo "The proejct $proj_name was successfully added to the database";
// }
?>
