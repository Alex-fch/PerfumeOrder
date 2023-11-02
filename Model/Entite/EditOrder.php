<?php
    class EditOrder
    {
        //Données
        private $name_perfume;
        private $name_brand;
        private $gender_perfume;
        private $quantity;

        //Contructeur
        public function __construct(string $name_perfume, string $name_brand, string $gender_perfume, string $quantity) {
            $this->name_perfume = $this->setNamePerfume($name_perfume);
            $this->name_brand = $this->setBrandPerfume($name_brand);
            $this->gender_perfume = $this->setGenderPerfume($gender_perfume);
            $this->quantity = $this->setQuantity($quantity);
        }

        //SETTERS
        public function setNamePerfume($name_perfume)
        {
            if(trim($name_perfume) !== "")
            {
                return $this->name_perfume = $name_perfume;
            }
        }

        public function setBrandPerfume($name_brand)
        {
            if(trim($name_brand) !== "")
            {
                return $this->name_brand = $name_brand;
            }
        }

        public function setGenderPerfume($gender_perfume)
        {
            if(trim($gender_perfume) !== "")
            {
                return $this->gender_perfume = $gender_perfume;
            }
        }

        public function setQuantity($quantity)
        {
            if(trim($quantity) !== "")
            {
                return $this->quantity = $quantity;
            }
        }

        //GETTERS
        public function getName()
        {
            return $this->name_perfume;
        }

        public function getBrand()
        {
            return $this->name_brand;
        }

        public function getGender()
        {
            return $this->gender_perfume;
        }

        public function getQuantity()
        {
            return $this->quantity;
        }
    }