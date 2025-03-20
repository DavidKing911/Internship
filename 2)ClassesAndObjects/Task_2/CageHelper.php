<?php
    trait CageHelper {
        public function putOut(string $animalName, int $animalAge): void {
            foreach ($this->animals as $key => $animal) {
                if ($animal->getName() == $animalName && $animal->getAge() == $animalAge) {
                    unset($this->beastes[$key]);
                }
            }
        }

        public function selectAnimal(string $animalName, int $animalAge, array $animals): mixed {
            foreach ($animals as $animal) {
                if ($animal->getName() == $animalName && $animal->getAge() == $animalAge) {
                    echo $animal->getName();
                    return $animal;
                }
            }
            return null;
        }
    }
?>