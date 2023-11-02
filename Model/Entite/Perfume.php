<?php

    class Perfume 
    {
        //Données
        private $id_perfume;
        private $name_perfume;
        private $gender_perfume;
        private $price_perfume;
        private $id_brand;
        private $name_brand;
        private const WOMAN = "Femme";
        private const MAN = "Homme";

        //Constructeur
        public function __construct(string $idPerfume, string $name, string $gender, string $price, string $idBrand, string $brand) {
            $this->id_perfume = $this->setIdPerfume($idPerfume);
            $this->name_perfume = $this->setName($name);
            $this->gender_perfume = $this->setGender($gender);
            $this->price_perfume = $this->setPrice($price);
            $this->id_brand = $this->setIdBrand($idBrand);
            $this->name_brand = $this->setBrand($brand);
            
        }

        public function __destruct(){
            //Du code à exécuter
        }
        
        //Getters ans Setters
        private function setIdPerfume(string $idPerfume){
            if(trim($idPerfume) === '') {
                throw new ParfumException("ERR : Chaine vide non accépté");
            }

            return $this->id_perfume = $idPerfume;
        }

        private function setName(string $name){
            if(trim($name) === '') {
                throw new ParfumException("ERR : Chaine vide non accépté");
            }

            return $this->name_perfume =  $name;
        }
        
        private function setIdBrand(string $idBrand){
            if(trim($idBrand) === '') {
                throw new ParfumException("ERR : Chaine vide non accépté");
            }

            return $this->id_brand = $idBrand;
        }

        private function setBrand(string $brand){
            if(trim($brand) === '') {
                throw new ParfumException("ERR : Chaine vide non accépté");
            }

            return $this->name_brand = $brand;
        }
        
        public function setGender(string $gender){
            if(($gender !== self::MAN) && ($gender !== self::WOMAN) && ($gender !== "gender_perfume")) {
                throw new ParfumException("ERR : Le gender est soit Homme ou Femme");
            }

            return $this->gender_perfume = $gender;
        }

        private function setPrice(string $price){
            if(trim($price) === '') {
                throw new ParfumException("ERR : Chaine vide non accépté");
            }

            return $this->price_perfume = $price;
        }

        public function getIdPerfume() {
            return $this->id_perfume;
        }

        public function getNamePerfume() {
            return $this->name_perfume;
        }

        public function getBrandPerfume() {
            return $this->name_brand;
        }

        public function getGenderPerfume() {
            return $this->gender_perfume;
        }
        
        public function getPricePerfume() {
            return $this->price_perfume;
        }
    }
