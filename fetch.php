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

if (isset($_POST['id'])) {
    if ($_POST['id'] == 1) {
        if ($_POST['page'] > 20) {
            $limit1 = (intval($_POST['page']))-10;
        } else {
            $limit1 = (intval($_POST['page']));
        }
    } else if ($_POST['id'] == 2) {
        $limit1 = (intval($_POST['page']))+10;
    }
    
    $data = $database->select("emails", [
        "email",
        "date"
    ], [
        "LIMIT" => [$limit1, 10]
    ]);
} else {
    $limit2 = 10;
    $data = $database->select("emails", [
        "email",
        "date"
    ], [
        "LIMIT" => [0, 10]
    ]);
}

if (count($data) > 0) {
    foreach ($data as $key => $value) {
        $date = strtotime($data[$key]['date']);
        echo "
    <tr>
        <td>".$data[$key]['email']."</td>
        <td>".date('\A\j\o\u\t\é \l\e d/m/Y à H:i:s', $date)."</td>
    </tr>
        ";
    }
    echo '<input type="hidden" name="page" id="page" value="'.$limit1.'">';
} else {
    echo "
    <tr>
        <td>Aucune adresse mail n'est enregistrée.</td>
        <td></td>
    </tr>
        ";
    echo '<input type="hidden" name="page" id="page" value="10">';
}
								
?>