<?php
    require_once('CageForFish.php');
    require_once('CageForBeast.php');
    require_once('CageForBird.php');
    class Zookeeper {
        private $name;
        private $zoo;
        public function __construct(string $name, Zoo $zoo) {
            $this->name = $name;
            $this->zoo = $zoo;
        }

        public function getName() {
            return $this->name;
        }
        
        public function putAnimalInCage(Animal $animalObject): void {
            if ($animalObject instanceof Fish) {
                $this->putFish($animalObject);
            } else if ($animalObject instanceof Beast) {
                $this->putBeast($animalObject);
            } else if ($animalObject instanceof Bird) {
                $this->putBird($animalObject);
            }
        }

        public function getAnimalByNameAndAge(string $name, int $age): mixed {
            foreach ($this->zoo->getCages() as $cage) {
                $res = $cage->selectAnimal($name, $age, $cage->getArr());
                if ($res !== null) {
                    return $res;
                }
            }
            return "Животное с таким именем и возрастом не найдено!";
        }

        public function getFishByScale(string $scaleColor, string $scaleSize){
            foreach ($this->zoo->getCages() as $cage) {
                if ($cage instanceof CageForFish) {
                    return $cage->getFish($scaleColor, $scaleSize);
                }
            }
        }

        private function putFish(Animal $animalObject): void {
            $count = 0;
            foreach ($this->zoo->getCages() as $cage) {
                if ($cage instanceof CageForFish) {
                    $cage->put($animalObject);
                    break;
                } else {
                    $count++;
                }
            }
            if ($count == count($this->zoo->getCages())) {
                $cageForFish = new CageForFish();
                $cageForFish->put($animalObject);
                $this->zoo->addCage($cageForFish);
            }
        }

        private function putBeast(Animal $animalObject): void {
            $count = 0;
            foreach ($this->zoo->getCages() as $cage) {
                if ($cage instanceof CageForBeast) {
                    if (count($cage->getArr()) < 3) {
                        $cage->put($animalObject);
                        break;
                    } else {
                        echo "Для зверя с именем - " . $animalObject->getName() . " нет места!";
                        break;
                    }
                } else {
                    $count++;
                }
            }
            if ($count == count($this->zoo->getCages())) {
                $cageForBeast = new CageForBeast();
                $cageForBeast->put($animalObject);
                $this->zoo->addCage($cageForBeast);
            }
        }

        private function putBird(Animal $animalObject): void {
            $count = 0;
            foreach ($this->zoo->getCages() as $cage) {
                if ($cage instanceof CageForBird) {
                    $cage->put($animalObject);
                } else {
                    $cageForBird = new CageForBird();
                    $cageForBird->put($animalObject);
                    $this->zoo->addCage(new CageForBird);
                }
            }
            if ($count == count($this->zoo->getCages())) {
                $cageForBird = new CageForBird();
                $cageForBird->put($animalObject);
                $this->zoo->addCage($cageForBird);
            }
        }
    }
?>