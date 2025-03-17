<?php
    class CageForBird {
        private $birds = [];
        public function putItInACage(Bird $bird) {
            $this->birds[] = $bird;
        }

        public function putItOutACage($birdName, $birdAge) {
            foreach ($this->birds as $key => $bird) {
                if ($bird->getName() == $birdName && $bird->getAge() == $birdAge) {
                    unset($this->birds[$key]);
                }
            }
        }

        public function selectAnimal($birdName, $birdAge) {
            foreach ($this->birds as $bird) {
                if ($bird->getName() == $birdName && $bird->getAge() == $birdAge) {
                    return $bird;
                }
            }
        }
    }
?>