<?php
    require_once('CageHelper.php');
    class CageForBird {
        use CageHelper;
        private $birds = [];
        public function put(Bird $bird): void {
            $this->birds[] = $bird;
        }

        public function getArr(): array {
            return $this->birds;
        }
    }
?>