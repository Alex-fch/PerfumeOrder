<?php

    class Possesses
    {
        private $id_indi_order;
        private $id_perfume;
        private $quantity;

        public function __construct(string $idIndiOrder, string $idPerfume, string $quantity) {
            $this->id_indi_order = $this->setIdIndiOrder($idIndiOrder);
            $this->id_perfume = $this->setIdPerfume($idPerfume);
            $this->quantity = $this->setQuantityPossesses($quantity);
        }

        //Getters ans Setters
        private function setIdIndiOrder(string $idIndiOrder){
            if(trim($idIndiOrder) === '') {
                throw new CommandeIndiException("ERR : Chaine vide non accépté");
            }
        
            return $this->id_indi_order = $idIndiOrder;
        }

        private function setIdPerfume(string $idPerfume){
            if(trim($idPerfume) === '') {
                throw new CommandeIndiException("ERR : Chaine vide non accépté");
            }
        
            return $this->id_perfume = $idPerfume;
        }

        public function setQuantityPossesses(string $quantity){
            if(trim($quantity) === '') {
                throw new CommandeIndiException("ERR : Chaine vide non accépté");
            }
        
            return $this->quantity = $quantity;
        }

        public function getIdIndiOrder(){
            return $this->id_indi_order;
        }

        public function getIdPerfume(){
            return $this->id_perfume;
        }

        public function getQuantity(){
            return $this->quantity;
        }

        public function getArray() {
            $array = [$this->id_indi_order, $this->id_perfume, $this->quantity];
            return $array;
        }

        public function getArrayUpdate() {
            $array = [strval($this->quantity), strval($this->id_indi_order), strval($this->id_perfume)];
            return $array;
        }

        

    }