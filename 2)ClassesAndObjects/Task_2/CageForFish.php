<?php
    require_once('CageHelper.php');
    class CageForFish {
        use CageHelper;
        private $fishes = [];
        public function put(Fish $fish): void {
            $this->fishes[] = $fish;
        }

        public function getArr(): array {
            return $this->fishes;
        }
    }
?>