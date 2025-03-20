<?php
    class Zoo {
        private $cages = [];

        public function addCage(mixed $cage): void {
            $this->cages[] = $cage;
        }

        public function getCages(): array {
            return $this->cages;
        }
    }
?>