<?php
    class Animal {
        private $name;
        private $age;

        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        public function getName() {
            return $this->name;
        }

        public function getAge() {
            return $this->age;
        }

        public function setName($name) {
            $this->name = $name;
        }

        public function setAge($age) {
            $this->age = $age;
        }
    }

    class Fish extends Animal {
        private $tail;

        public function __construct($name, $age, $tail) {
            parent::__construct($name, $age);
            $this->tail = $tail;
        }

        public function getTail() {
            return $this->tail;
        }

        public function setTail($tail) {
            $this->tail = $tail;
        }
    }

    class Beast extends Animal {
        private $paws;
        public function __construct($name, $age, $paws) {
            parent::__construct($name, $age);
            $this->paws = $paws;
        }

        public function getPaws() {
            return $this->paws;
        }

        public function setPaws($paws) {
            $this->paws = $paws;
        }
    }

    class Bird extends Animal {
        private $wings;

        public function __construct($name, $age, $wings) {
            parent::__construct($name, $age);
            $this->wings = $wings;
        }

        public function getWings() {
            return $this->wings;
        }

        public function setWings($wings) {
            $this->wings = $wings;
        }
    }

    class CageForFish {
        private static $fishes = [];
        public function putItInACage($fishName) {
            self::$fishes = $fishName;
        }

        public function putItOutACage($fishName) {
            foreach (self::$fishes as $fish) {
                if ($fish == $fishName) {
                    unset(self::$fishes[$fish]);
                }
            }
        }
    }

    class CageForBeast {
        private static $beastes = [];
        public function putItInACage($beastName) {
            self::$beastes = $beastName;
        }

        public function putItOutACage($beastName) {
            foreach (self::$beastes as $beast) {
                if ($beast == $beastName) {
                    unset(self::$beastes[$beast]);
                }
            }
        }
    }

    class CageForBird {
        private static $birds = [];
        public function putItInACage($birdName) {
            self::$birds = $birdName;
        }

        public function putItOutACage($birdName) {
            foreach (self::$birds as $bird) {
                if ($bird == $birdName) {
                    unset(self::$birds[$bird]);
                }
            }
        }
    }

    class Zookeeper {
        public function cageSellection($obj) {
            if ($obj instanceof Fish) {
                $obj->putItInCage();
            } else if ($obj instanceof Beast) {
                $obj->putItInCage();
            } else if ($obj instanceof Bird) {
                $obj->putItInCage();
            }
        }

        public function getAnimal() {
            
        }
    }

    class Manager {
        
    }
?>