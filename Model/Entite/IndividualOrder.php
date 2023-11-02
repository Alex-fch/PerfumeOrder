<?php

    class IndividualOrder 
    {
        //Données
        private $id_indi_order;
        private $name_indi_order;
        private $price_indi_order;
        private $date_indi_order;
        private $quantity_indi_order;
        private $id_gene_order;

        //Constructeur
        public function __construct(string $idOrder, string $nameOrder, string $priceOrder, string $dateOrder, string $quantityOrder, string $idGeneOrder) {
            $this->id_indi_order = $this->setIdOrder($idOrder);
            $this->name_indi_order = $this->setNameOrder($nameOrder);
            $this->price_indi_order = $this->setPriceOrder($priceOrder);
            $this->date_indi_order = $this->setDateOrder($dateOrder);
            $this->quantity_indi_order = $this->setQuantityOrder($quantityOrder);
            $this->id_gene_order = $this->setIdGeneOrder($idGeneOrder);

        }

        public function __destruct(){
            //Du code à exécuter
        }
        
        //Getters ans Setters
        protected function setIdOrder(string $idOrder){
            if(trim($idOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->id_indi_order = $idOrder;
        }

        private function setNameOrder(string $nameOrder){
            if(trim($nameOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->name_indi_order =  $nameOrder;
        }
        
        public function setPriceOrder(string $priceOrder){
            if(trim($priceOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->price_indi_order = $priceOrder;
        }

        private function setDateOrder(string $dateOrder){
            if(trim($dateOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->date_indi_order = $dateOrder;
        }
        
        public function setQuantityOrder(string $quantityOrder){
            if(trim($quantityOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->quantity_indi_order = $quantityOrder;
        }

        public function setIdGeneOrder(string $idGeneOrder){
            if(trim($idGeneOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->id_gene_order = $idGeneOrder;
        }

        public function setModifyQuantity(string $value){
            $qte = $this->getQuantityOrder();
            $array = str_split($value);
            $signe = $array[0];
            $value = $array[1];

            if($signe === "+"){
                $qte = (int)$qte + (int)$value;
            }
            if($signe === "-"){
                $qte = (int)$qte - (int)$value;
            }

            $this->setQuantityOrder((string)$qte);
        }

        public function getIdOrder() {
            return $this->id_indi_order;
        }

        public function getNameOrder() {
            return $this->name_indi_order;
        }

        public function getPriceOrder() {
            return $this->price_indi_order;
        }

        public function getDateOrder() {
            return $this->date_indi_order;
        }

        public function getQuantityOrder() {
            return $this->quantity_indi_order;
        }

        public function getArray() {
            $array = [$this->id_indi_order, $this->name_indi_order, $this->price_indi_order, $this->date_indi_order, $this->quantity_indi_order, $this->id_gene_order];
            return $array;
        }
    }
