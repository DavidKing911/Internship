<?php
    class Animal {
        private $name;
        private $age;
        public function __construct(string $name, int $age) {
            $this->name = $name;
            $this->age = $age;
        }

        public function getName(): string {
            return $this->name;
        }

        public function getAge(): string {
            return $this->age;
        }

        public function setName(string $name): void {
            $this->name = $name;
        }

        public function setAge(int $age): void {
            $this->age = $age;
        }
    }
?>