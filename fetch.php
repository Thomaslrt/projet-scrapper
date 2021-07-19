<?php

require 'Medoo.php';
use Medoo\Medoo;

$database = new Medoo([
	'type' => 'mysql',
	'host' => 'localhost',
	'database' => 'emails',
	'username' => 'root',
	'password' => 'root'
]);

$data = $database->select("emails", [
    "email",
    "date"
], [
    "LIMIT" => [0, 10]
]);
if (count($data) > 0) {
    foreach ($data as $key => $value) {
        echo "
    <tr>
        <td>".$data['email']."</td>
        <td>".$data['date']."</td>
    </tr>
        ";
    }
} else {
    echo "
    <tr>
        <td>Aucune adresse mail n'est enregistrée.</td>
        <td></td>
    </tr>
        ";
}
								
?>