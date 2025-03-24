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

        public function getFish(string $scaleColor, string $scaleSize): Fish|string {
            foreach ($this->fishes as $fish) {
                if ($fish->getScaleColor() == $scaleColor && $fish->getScaleSize() == $scaleSize) {
                    return $fish;
                }
            }
            return "Такой рыбы не существует";
        }
    }
?>