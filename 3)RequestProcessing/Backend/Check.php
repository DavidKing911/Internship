<?php
    class Check {
        private $name;
        private $age;
        private $gender;

        public function __construct($name, $age, $gender) {
            $this->name = $name;
            $this->age = $age;
            $this->gender = $gender;
        }

        public function getName() {
            return $this->name;
        }

        public function getAge() {
            return $this->age;
        }

        public function getGender() {
            return $this->gender;
        }

        public function __toString() {
            return "{$this->helperName($this->name)} {$this->name}, для нашего проекта вы{$this->helperAge($this->age)}!";
        }

        private function helperAge($age) {
            if ($age < 18 || $age > 60) {
                return ", к большом сожалению, не подходите";
            } else {
                return " идеально подходите";
            }
        }

        private function helperName($name) {
            if (strtolower($name) == "female" || strtolower($name) == "женский") {
                return "Мисс";
            } else {
                return "Мистер";
            }
        }
    }
?>