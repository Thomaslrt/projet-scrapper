<?php

header('Content-type: application/json');

$regex = '%^((https?://)|(www\.))([a-z0-9-].?)+(:[0-9]+)?(/.*)?$%i';
if (!preg_match($regex, $_POST['url'])) {
    $response_array['status'] = 'error'; 
    $response_array['message'] = 'Veuillez saisir une URL valide.';
    echo json_encode($response_array);
    die();
}

require 'Medoo.php';
use Medoo\Medoo;
require 'email_scraper.php' ;

$url = $_POST['url'];
$emails = scrape_email($url);

try {
    $database = new Medoo([
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'emails',
        'username' => 'root',
        'password' => 'root'
    ]);

    $i = 0;

    foreach ($emails as $key => $value) {
        $data = $database->select("emails", ["email"], ["email" => "$value"]);
        if (!$data) {
            if ($database->insert("emails", ['email' => $value])) {
                $i++;
            }
        }
    }


    echo ''.$i.' occurences ont été enregistrées en base de données, '.(count($emails)-$i).' ont été annulées ('.count($emails).' entrées au total).';
    

} catch (Exception $e) {
    echo "Erreur : ".$e->getMessage();
}

?>