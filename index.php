<?php

use Axxa\Entity\Personne;
use Axxa\Entity\PersonneManager;
use Axxa\Utils\Zaninotto;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * Created by PhpStorm.
 * User: axxa
 * Date: 19.02.18
 * Time: 21:23
 */

$faker = Faker\Factory::create('fr_FR');
$message = 'error from PDO connection !';

// the following statements are for the Faker Factory - test

$ln = $faker->lastName;
$fn = $faker->firstName;
$rue = $faker->streetName;
$codepost = $faker->postcode;
$pays = $faker->country;
$societe = $faker->company;
echo $ln . '<br />';
echo $fn . '<br />';
echo $rue . '<br />';
echo $codepost . '<br />';
echo $pays . '<br />';
echo $societe . '<br />';

$datas = [];
array_push($datas, $ln, $fn, $rue, $codepost, $pays, $societe);

foreach ($datas as $data) {
    echo $data;
    }
try {
    $connex = new PDO('mysql:host=localhost;dbname=personne', 'root', 'root');
} catch (PDOException $message) {
    echo $message;
}

$personna = new \Axxa\Entity\Personne($datas);
$student = new \Axxa\Entity\Etudiant($datas);
$enseignant = new \Axxa\Entity\Enseignant($datas);
$personManager = new PersonneManager($connex);

$personna->hydrate($datas);

$personManager->createPersonne($datas);

$personna->toString();
if (!empty($personManager)) {
    $personna->$personManager->createPersonne($datas);
}

$student->toString();
if (!empty($etudiantManager)) {
    $student->$personManager->createPersonne($datas);
}

var_dump($datas);

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<hr>
<?php $personna->toString();
?>
</body>
</html>