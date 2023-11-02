<?php
	class ErrorController extends BaseController
	{
		public function Show($exception)
		{
			//Récuperer les listes d'érreur dans une variable
			$message = date("d/m/Y H:i:s");
			$message .= "\n"."Message : ".$exception->getMessage();
			$message .= "\n"."File : ".$exception->getFile();
			$message .= "\n"."Line : ".$exception->getLine();
			$message .= "\n";
			$trace = $exception->getTrace();
			foreach($trace as $value)
			{
				$message .= "\n"."File : ".$value["file"];
				$message .= "\n"."Line : ".$value["line"];
				$message .= "\n"."Function : ".$value["function"];
				$message .= "\n"."Class : ".$value["class"];
				$message .= "\n";
			}
			//Chemin vers fichier texte
			$file ="C:/wamp64/www/Perfume/erreur.txt";
			//Ouverture en mode écriture
			$fileopen=(fopen($file,'a'));
			//Ecriture de la liste d'érreyr dans le fichier texte
			fwrite($fileopen,"\n".$message);
			//On ferme le fichier
			fclose($fileopen);
			//Ajouter le parametre pour pouvoir le récuperer dans la vue
			$this->addParam("exception",$exception);
			//Afficher la vue 'error.php'
			$this->view("error");
		}
	}