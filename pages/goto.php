<?php
$alias = $_GET["to"];

// Including database connection
include 'database.php';

// Query to check if link_url exists
$query = "SELECT url AS url FROM share_url WHERE BINARY alias=:alias;";

// Prepare
$statement = $handler->prepare($query);
$statement->bindParam(":alias", $alias, PDO::PARAM_STR);

// Execute
$statement->execute();

// Fetch
$return = $statement->fetch(PDO::FETCH_ASSOC);
$header = $return["url"];

// Rediecting to homepage if no links
if (empty($header)) {
  $header = ".";
}

// Redirect
header("Location: $header");

?>
