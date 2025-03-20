<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP - Task 3</h1>
    <?php
        require_once 'Beast.php';
        require_once 'Fish.php';
        require_once 'CageForBeast.php';
        require_once 'CageForFish.php';
        require_once 'Zoo.php';
        require_once 'Zookeeper.php';
        require_once 'Manager.php';
        
        $wolf = new Beast("Bru", 3, "Короткий");
        $lion = new Beast("Simba", 7, "Длинный");
        $fish = new Fish("Dory", 6, "Маленький");

        $cageForBeast = new CageForBeast();
        $cageForBeast->put($lion);

        $zoo = new Zoo();
        $zoo->addCage($cageForBeast);

        $zookeeper = new Zookeeper("David", $zoo);

        $manager = new Manager("John");
        $manager->transAnimal($wolf, $zookeeper);
        $manager->transAnimal($fish, $zookeeper);

        print_r($zookeeper->getAnimalByNameAndAge("Dory", 6));
    ?>
</body>
</html>