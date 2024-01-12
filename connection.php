<?php
$connection = new PDO('sqlite:' . __DIR__ . '/database.db');
if ($connection == null)
    // echo 'Connected to the SQLite database successfully!';
    echo 'Whoops, could not connect to the SQLite database!';


/*----------------------DATABASE QUERYING FUNCTIONS-----------------------*/
//SELECT - used when expecting single OR multiple results
//returns an array that contains one or more associative arrays
function fetch_all($query) {
    $data = array();
    global $connection;
    $stmt = $connection->query($query);
    while ($row = $stmt->fetch()) {
        $data[] = $row;
    }
    return $data;
}
//SELECT - used when expecting a single result
//returns an associative array
function fetch_record($query, $id = 0) {
    global $connection;
    $stmt = $connection->prepare($query);
    if (!$id == 0) {
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
    return 'Fetch Record Error';
}
//used to run INSERT/DELETE/UPDATE, queries that don't return a value
//returns a value, the id of the most recently inserted record in your database
function queryData($query,$data){
    global $connection;
    $stmt= $connection->prepare($query);
    $stmt->execute($data);
}
//returns an escaped string. EG, the string "That's crazy!" will be returned as "That\'s crazy!"
//also helps secure your database against SQL injection