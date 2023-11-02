<?php
    /*
    * La classe BaseController, contrôleur générique, qui possédera des propriétés 
    * et méthodes de base qui seront utiles pour tout nos contrôleurs par la suite.
    * $httpRequest pour la requette http.
    * $param pour envoyer les paramètres à la vue.
    * $fileManager pour ajouter les fichier CSS et JS à la vue.
    */
    class BaseController
    {
        private $httpRequest;
        private $param;
        private $config;
        private $fileManager;

        public function __construct($httpRequest, $config)
        {
            $this->httpRequest = $httpRequest;
            $this->config = $config;
            $this->param = array();
			$this->addParam("httprequest",$this->httpRequest);
			$this->addParam("config",$this->config);
            $this->bindManager();
            $this->fileManager = new FileManager();
        }

        /*
        * Permet d'afficher une vue
        * Si les fichiers CSS et JS pour cette vue éxiste on les ajoutes
        * On ajoute dans le dossier View la vue correspondante
        *
        */
        protected function view($filename)
        {
            if(file_exists("View/" . $this->httpRequest->getRoute()->getController() . "/css/" . $filename . ".css"))
			{
				$this->addCss("View/" . $this->httpRequest->getRoute()->getController() . "/css/" . $filename . ".css");
			}
			if(file_exists("View/" . $this->httpRequest->getRoute()->getController() . "/js/" . $filename . ".js"))
			{
				$this->addJs("View/" . $this->httpRequest->getRoute()->getController() . "/js/" . $filename . ".js");
			}
            if(file_exists('View/'.$this->httpRequest->getRoute()->getController().'/'.$filename.'.php'))
            {
                ob_start();
                extract($this->param);
                include('View/Shared/header.php');
                include('View/'.$this->httpRequest->getRoute()->getController().'/'.$filename.'.php');
                include('View/Shared/footer.php');
                $content = ob_get_clean();
                include('View/layout.php');
            }
            else
            {
                throw new ViewNotFoundException();
            }

        }

        /*
        * Gérer les manager d'accès aux données que le contrôleur pourra utiliser.
        */
        public function bindManager()
        {
			foreach($this->httpRequest->getRoute()->getManager() as $manager)
			{
				$this->$manager = new $manager($this->config->database);
			}
        }

        /*
        * Ajout d'un paramètre à la liste des param
        */
        public function addParam($name, $value)
        {
            $this->param[$name] = $value;
        }

        //GETTER
        public function getParam()
        {
            return $this->param;
        }

        public function addCss($file)
		{
			$this->fileManager->addCss($file);
		}
		
		public function addJs($file)
		{
			$this->fileManager->addJs($file);
		}
    }