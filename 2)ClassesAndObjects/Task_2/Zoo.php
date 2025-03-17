<?php
    class Zoo {
        private $cages = [];

        public function addCage($cage) {
            $this->cages[] = $cage;
        }

        public function findCage($animalObject) {
            if ($animalObject instanceof Fish) {
                $this->selectRightCage("Fish", $animalObject);
            } else if ($animalObject instanceof Beast) {
                $this->selectRightCage("Beast", $animalObject);
            } else if ($animalObject instanceof Bird) {
                $this->selectRightCage("Bird", $animalObject);
            }
        }

        public function findAnimal(string $name, int $age) {
            foreach ($this->cages as $cage) {
                return $cage->selectAnimal($name, $age);
            }
        }

        private function selectRightCage($cageName, $animalObject) {
            foreach ($this->cages as $cage) {
                if ($cageName == "Fish") {
                    if ($cage instanceof CageForFish) {
                        $cage->putItInACage($animalObject);
                    } else {
                        $cageForFish = new CageForFish();
                        $cageForFish->putItInACage($animalObject);
                        $this->addCage(new CageForFish);
                    }
                } else if ($cageName == "Beast") {
                    if ($cage instanceof CageForBeast) {
                        $cage->putItInACage($animalObject);
                    } else {
                        $cageForBeast = new CageForBeast();
                        $cageForBeast->putItInACage($animalObject);
                        $this->addCage(new CageForBeast);
                    }
                } else if ($cageName == "Bird") {
                    if ($cage instanceof CageForBird) {
                        $cage->putItInACage($animalObject);
                    } else {
                        $cageForBird = new CageForBird();
                        $cageForBird->putItInACage($animalObject);
                        $this->addCage(new CageForBird);
                    }
                }
            }
        }
    }
?>