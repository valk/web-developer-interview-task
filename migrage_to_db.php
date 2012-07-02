<?php

/**
 * Please use command.sql to build tables for your database, name it `guitest`.
 *  Please insert the password for the root of your DB below.
 */
$password = 'ROOT_PASSWORD';

require_once('bootstrap.php');      // Reuse the code

function date_string_to_unix($date) {
    $dateInfo = date_parse_from_format('m-j-Y G:i:s', $date);
    $unixTimestamp = mktime(
        $dateInfo['hour'], $dateInfo['minute'], $dateInfo['second'],
        $dateInfo['month'], $dateInfo['day'], $dateInfo['year']
    );
    
    return $unixTimestamp;
}


$file_contents = file_get_contents('./form_submissions.txt', true);

// split by newlines
$lines = explode("\n", $file_contents);

$db = new PDO("mysql:host=localhost;dbname=guitest", 'root', $password);

/* * * set the PDO error mode to exception ** */
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

foreach ($lines as $line) {
    
    // skip on sanity checks
    if (trim($line) == '') {
        continue;
    }
    
    try {
        $db->beginTransaction();

        $message_values = explode(',', $line);

        // decode
        foreach ($message_values as &$value) {
            $value = htmlspecialchars(FileStorage::decode(trim($value)), ENT_QUOTES);
        }

        $query = "INSERT INTO customer (name) VALUES ('{$message_values[1]}')";
        print $query."\n";
        $db->exec($query);
        $cusomer_last_id = $db->lastInsertId();

        $query = "INSERT INTO recipient (name) VALUES ('{$message_values[2]}')";
        print $query."\n";
        $db->exec($query);
        $recipient_last_id = $db->lastInsertId();
        
        $unix_date = date_string_to_unix($message_values[0]);
        $query = "INSERT INTO message (customer_id, recipient_id, message, received) 
                VALUES ('$cusomer_last_id', '$recipient_last_id', '{$message_values[3]}', '$unix_date')";
        print $query."\n";
        $db->exec($query);
        
        $db->commit();
    } 
    catch (PDOException $e) {
        echo "Rolling back... ".$e->getMessage() . "\n";
        $db->rollback();
    }
} 

