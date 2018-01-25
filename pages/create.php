<?php

// Error log
//ini_set('display_errors', 1);
//error_reporting(~0);

// _POST
$alias = trim($_GET["create_alias"]);
$url = trim($_GET["create_url"]);

// Create random string
function randomString($length = 8) {

    // Allowed characters
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // Creating string
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Check if in database
function isInDatabase($alias) {

  // Including database connection
  include 'database.php';

  // Query to check if link_url exists
  $query = "SELECT COUNT(*) AS count FROM share_url WHERE BINARY alias=:alias;";

  // Prepare
  $statement = $handler->prepare($query);
  $statement->bindParam(":alias", $alias, PDO::PARAM_STR);

  // Execute
  $statement->execute();

  // Fetch
  $total = $statement->fetch(PDO::FETCH_ASSOC);
  return $total["count"];
}

// insert to database
function insert_to_database($alias, $url) {

  // Including database connection
  include 'database.php';

  // Query to insert
  $query = "INSERT INTO share_url (alias, url) VALUES (:alias,:url);";

  // Prepare
  $statement = $handler->prepare($query);
  $statement->bindParam(":alias", $alias, PDO::PARAM_STR);
  $statement->bindParam(":url", $url, PDO::PARAM_STR);

  // Execute
  $statement->execute();
}

// Create unique string for database
function uniqueAlias() {

  while (true) {

    // Getting random value
    $unique_value = randomString();
    $total = isInDatabase($unique_value);

    // When alias is unique return alias
    if ($total == 0) {
      return $unique_value;
    }
  }
}


if (empty($url)) {
  $myObj->state = 0;
  $myObj->log = "Can't create, no URL!";
} else {

// alias is set
if (!empty($alias)) {

  // Alias is not in database so creating one
  if (isInDatabase($alias) == 0) {

    // inserting url and alias to database
    insert_to_database($alias, $url);

    // Creating object
    $myObj->state = 1;
    $myObj->log = "Created susccesfully with defined alias!";
    $myObj->url = $url;
    $myObj->alias = $alias;

  // Alias is in database returning error message
  } else {
    $myObj->state = 2;
    $myObj->log = "Already in database!";
  }

// Alias is not set -> creating alias and adding it
} else {

  // Creating alias and storing it in the database
  $alias = uniqueAlias();
  insert_to_database($alias, $url);

  // Creating object
  $myObj->state = 3;
  $myObj->log = "Created susccesfully with no alias!";
  $myObj->url = $url;
  $myObj->alias = $alias;
}
}
// Encoding object and echoing it
$myJSON = json_encode($myObj);
echo $myJSON;
