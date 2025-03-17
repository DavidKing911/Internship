<?php
    class CageForFish {
        private $fishes = [];
        public function putItInACage(Fish $fish) {
            $this->fishes[] = $fish;
        }

        public function putItOutACage($fishName, $fishAge) {
            foreach ($this->fishes as $key => $fish) {
                if ($fish->getName() == $fishName && $fish->getAge() == $fishAge) {
                    unset($this->fishes[$key]);
                }
            }
        }

        public function selectAnimal($fishName, $fishAge) {
            foreach ($this->fishes as $fish) {
                if ($fish->getName() == $fishName && $fish->getAge() == $fishAge) {
                    return $fish;
                }
            }
        }
    }
?>