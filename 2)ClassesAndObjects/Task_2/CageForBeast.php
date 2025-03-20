<?php
    require_once('CageHelper.php');
    class CageForBeast {
        use CageHelper;
        private $beastes = [];
        public function put(Beast $beast): void {
            $this->beastes[] = $beast;
        }

        public function getArr(): array {
            return $this->beastes;
        }
    }
?>