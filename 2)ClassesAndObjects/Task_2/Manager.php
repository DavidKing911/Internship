<?php
    class Manager {
        private $name;
        public function __construct(string $name) {
            $this->name = $name;
        }

        public function getName(): string {
            return $this->name;
        }
        
        public function transAnimal(Animal $animal, Zookeeper $zookeeper): void {
            $zookeeper->putAnimalInCage($animal);
        }
    }
?>