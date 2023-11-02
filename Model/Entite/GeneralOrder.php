<?php

    class GeneralOrder 
    {
        //Données
        private $id_gene_order;
        private $name_gene_order;
        private $price_gene_order;
        private $date_gene_order;
        private $quantity_gene_order;

        //Constructeur
        public function __construct(string $idOrder, string $nameOrder, string $priceOrder, string $dateOrder, string $quantityOrder) {
            $this->id_gene_order = $this->setIdOrder($idOrder);
            $this->name_gene_order = $this->setNameOrder($nameOrder);
            $this->price_gene_order = $this->setPriceOrder($priceOrder);
            $this->date_gene_order = $this->setDateOrder($dateOrder);
            $this->quantity_gene_order = $this->setQuantityOrder($quantityOrder);
        }
        
        //Getters ans Setters
        public function setIdOrder(string $idOrder){
            if(trim($idOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->id_gene_order = $idOrder;
        }

        public function setNameOrder(string $nameOrder){
            if(trim($nameOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->name_gene_order =  $nameOrder;
        }
        
        public function setPriceOrder(string $priceOrder){
            if(trim($priceOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->price_gene_order = $priceOrder;
        }

        public function setDateOrder(string $dateOrder){
            if(trim($dateOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->date_gene_order = $dateOrder;
        }
        
        public function setQuantityOrder(string $quantityOrder){
            if(trim($quantityOrder) === '') {
                throw new GeneralOrderException("ERR : Chaine vide non accépté");
            }

            return $this->quantity_gene_order = $quantityOrder;
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
            return $this->id_gene_order;
        }

        public function getNameOrder() {
            return $this->name_gene_order;
        }

        public function getPriceOrder() {
            return $this->price_gene_order;
        }

        public function getDateOrder() {
            return $this->date_gene_order;
        }

        public function getQuantityOrder() {
            return $this->quantity_gene_order;
        }

        public function getArray() {
            $array = [$this->id_gene_order, $this->name_gene_order, $this->price_gene_order, $this->date_gene_order, $this->quantity_gene_order];
            return $array;
        }

    }