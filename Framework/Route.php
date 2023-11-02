<?php
    /*
    * La classe Route définit le format d'une route.
    * Chaque requête http correspond à une route, cette route sait quel contrôleur,
    * et quelle action appeler, et quels paramètres utiliser.
    */
    class Route
    {
        private $path; //Utiliser que le chemin qui se trouve après le nom de domaine.
        private $controller; //Quel contrôleur utilisé.
        private $action; //Determine quelle fonction appeler dans le controller
        private $method; //Identifier si la requête Http doit être de type GET ou POST par exemple.
        private $param; //Permet de passer des parametres
        private $manager; //Permet d'identifier quel manager appeler.

        //$route est un objet
        public function __construct($route)
        {
            $this->path = $route->path;
            $this->controller = $route->controller;
            $this->action = $route->action; 
            $this->method = $route->method;
            $this->param = $route->param;
            $this->manager = $route->manager;
        }

        //GETTER
        public function getPath()
        {
            return $this->path;
        }

        public function getController()
        {
            return $this->controller;
        }

        public function getAction()
        {
            return $this->action;
        }

        public function getMethod()
        {
            return $this->method;
        }

        public function getParam()
        {
            return $this->param;
        }

        public function getManager()
        {
            return $this->manager;
        }

		public function run($httpRequest,$config)
		{
			$controller = null;
			$controllerName = $this->controller . "Controller";
            if(class_exists($controllerName))
            {
                $controller = new $controllerName($httpRequest,$config);
                if(method_exists($controller, $this->action))
                {
                    $controller->{$this->action}(...$httpRequest->getParam());
                }
                else
                {
                    throw new ActionNotFoundException();
                }
            }
            else
            {
                throw new ControllerNotFoundException();
            }
			
		}

    }