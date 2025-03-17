<?php
    class CageForBeast {
        private $beastes = [];
        public function putItInACage(Beast $beast) {
            $this->beastes[] = $beast;
        }

        public function putItOutACage($beastName, $beastAge) {
            foreach ($this->beastes as $key => $beast) {
                if ($beast->getName() == $beastName && $beast->getAge() == $beastAge) {
                    unset($this->beastes[$key]);
                }
            }
        }

        public function selectAnimal($beastName, $beastAge) {
            foreach ($this->beastes as $beast) {
                if ($beast->getName() == $beastName && $beast->getAge() == $beastAge) {
                    return $beast;
                }
            }
        }
    }
?>