<?php
	/*
	* La classe Router permet de trouver la route qui correspond à une requette Http.
	* Le fichier route.json nous aide pour cela.
	*/
    class Router
	{
		private $listRoute;
		
		public function __construct()
		{
			$stringRoute = file_get_contents('Config/route.json'); //Charger les fichiers de route json.
			$this->listRoute = json_decode($stringRoute); //Transformer le fichier en objet et le mettre dans la propriété listeRoute.
		}
		
		/*
		* Recherche les routes associés à cette requette Http
		* @param un objet HttpRequest
		* Recherche la ou les routes associées à cette requête http, avec fonction array_filter
		* @return un objet route construit à partir de la route trouvée
		* @return une erreur si aucune route, ou plusieurs routes ont été trouvées
		*/
		public function findRoute($httpRequest, $basepath)
		{
			$url = str_replace($basepath,"",$httpRequest->getUrl());
			$method = $httpRequest->getMethod();
			$routeFound = array_filter($this->listRoute,function($route) use ($url, $method){
				return preg_match("#^" . $route->path . "$#", $url) && $route->method == $method;
			});
			$numberRoute = count($routeFound);
			if($numberRoute > 1)
			{
				throw new MultipleRouteFoundException();
			}
			else if($numberRoute == 0)
			{
				throw new NoRouteFoundException($httpRequest);
			}
			else
			{
				return new Route(array_shift($routeFound));	
			}
		}
	}