<?php
    class Manager {
        private $name;
        public function __construct($name) {
            $this->name = $name;
        }

        public function getName() {
            return $this->name;
        }
        
        public function transAnimal($animal, Zookeeper $zookeeper, Zoo $zoo) {
            $zookeeper->putAnimalInCage($animal, $zoo);
        }
    }
?>