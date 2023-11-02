<?php

    /*
    * La classe HttpRequest permet de gérer l'url en la récupérant
    * $url pour l'uri
    * $method pour la méthode ex: GET, POST... 
    * $param pour les parametres passé dans l'url
    * $route sauvegarde la route trouvée
    */
    class HttpRequest
    {
        private $url;
        private $method;
        private $param;
        private $route;

        public function __construct($url = null, $method = null)
        {
			$this->url = (is_null($url))?$_SERVER['REQUEST_URI']:$url; //Retourne l'uri ex: '/index.html'
			$this->method = (is_null($method))?$_SERVER['REQUEST_METHOD']:$method; //Retourne la méthode ex: 'GET', 'POST',...
			$this->param = array();
        }

        //GETTER
        public function getUrl()
        {
            return $this->url;
        }

        public function getMethod()
        {
            return $this->method;
        }

        public function getParams()
        {
            return $this->params;
        }

        public function getRoute()
		{
			return $this->route;	
		}

        public function getParam()
		{
			return $this->param;	
		}

        //SETTER
        public function setRoute($route)
        {
            $this->route = $route;
        }

        /*
        * Parcours les paramètres définit dans la route.
        * Vérifier s'ils ont été passés lors de la requête.
        * Si oui, les assigner a la proprièté $param
        *
        */
        public function bindParam()
        {
            switch($this->method)
            {
                case "GET":
                case "DELETE":
                    foreach($this->route->getParam() as $param)
                    {
                        if(isset($_GET[$param]))
                        {
                            $this->param[] = $_GET[$param];
                        }
                    }
                case "POST":
                case "PUT":
                    foreach($this->route->getParam() as $param)
                    {
                        if(isset($_POST[$param]))
                        {
                            $this->param[] = $_POST[$param];
                        }
                    }
            }
        }

        public function run($config)
        {
            $this->bindParam();
            $this->route->run($this,$config);

        }

        public function addParam($value)
        {
            $this->param[] = $value;
        }
    }