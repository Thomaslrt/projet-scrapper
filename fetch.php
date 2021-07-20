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
        $date = strtotime($data[$key]['date']);
        echo "
    <tr>
        <td>".$data[$key]['email']."</td>
        <td>".date('\A\j\o\u\t\é \l\e d/m/Y à H:i', $date)."</td>
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