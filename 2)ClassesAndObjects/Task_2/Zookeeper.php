<?php
    class Zookeeper {
        private $name;
        public function __construct($name) {
            $this->name = $name;
        }

        public function getName() {
            return $this->name;
        }
        
        public function putAnimalInCage(mixed $animalObject, Zoo $zoo) {
            $zoo->findCage($animalObject);
        }

        public function getAnimalByNameAndAge(string $name, int $age, Zoo $zoo) {
            return $zoo->findAnimal($name, $age);
        }
    }
?>