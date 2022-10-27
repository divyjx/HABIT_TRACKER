<?php
/**
 * @function    importDatabaseTables
 * @author      Tutorialswebsite
 * @link        http://www.tutorialswebsite.com
 * @usage       Import database tables from a SQL file
 */
 
$dbHost     = 'localhost';
$dbUname = 'root';
$dbPass = '';
$dbName     = 'habit_tracker_db';
$filePath   = 'habit_tracker_db.sql';
 
$conn = new mysqli($dbHost, $dbUname, $dbPass);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "DROP DATABASE IF EXISTS habit_tracker_db";
if ($conn->query($sql) === TRUE) {
  echo "Database deleted successfully<br>";
}

$sql = "Create DATABASE habit_tracker_db";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br>";
}


if(file_exists($filePath)){
importDatabaseTables($dbHost, $dbUname, $dbPass, $dbName, $filePath);
}
 
function importDatabaseTables($dbHost, $dbUname, $dbPass, $dbName, $filePath){
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUname, $dbPass, $dbName); 
 
    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){
            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error importing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            // TESTING
            // else{
            //     echo "imported<br>";
            // }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
}
?>