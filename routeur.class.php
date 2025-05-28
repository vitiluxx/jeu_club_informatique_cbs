<?php

    include(CONTROLLER_ROOT."allMethod.class.php");
    
    class Routeur 
    {
        private $requette;
        private $route = [
                          "formulaire.php" =>          ["controller" => "allMethod", "method" => "affichePageFormulaire"],
                          "accueil.php" =>             ["controller" => "allMethod", "method" => "affichePageAccueil" ], 
                          "duel.php" =>                ["controller" => "allMethod", "method" => "affichePageDuel"], 
                          "filiere.php" =>             ["controller" => "allMethod", "method" => "affichePageFiliere"], 
                          "solo.php" =>                ["controller" => "allMethod", "method" => "affichePageSolo"],                    
                          "jeux.php" =>                ["controller" => "allMethod", "method" => "affichePageJeux"],                      
                          "mainSolo.php" =>            ["controller" => "allMethod", "method" => "affichePageMainSolo"],                      
                          "dashboard.php" =>           ["controller" => "allMethod", "method" => "affichePageDashboard"],                      

                          "formulaire" =>              ["controller" => "allMethod", "method" => "affichePageFormulaire"],
                          "accueil" =>                 ["controller" => "allMethod", "method" => "affichePageAccueil" ], 
                          "duel" =>                    ["controller" => "allMethod", "method" => "affichePageDuel"], 
                          "filiere" =>                 ["controller" => "allMethod", "method" => "affichePageFiliere"], 
                          "solo" =>                    ["controller" => "allMethod", "method" => "affichePageSolo"],                    
                          "jeux" =>                    ["controller" => "allMethod", "method" => "affichePageJeux"],                      
                          "dashboard" =>               ["controller" => "allMethod", "method" => "affichePageDashboard"], 
                        
                        ];
    
    
        public function __construct($requette)
        {
            
            $this->requette = $requette;
            
        }
    
    
        public function runderController()
        {
            $requette = $this->requette;
            
            if(key_exists($requette, $this->route))
            {
                $controller = $this->route[$requette]["controller"]; //on recupere la requette + le controller
                $method = $this->route[$requette]["method"]; // de meme on recupere la requette + la method adequoite
        
                $controllerDemander = new $controller();
                $controllerDemander->$method();
            }
            else{
                echo "ERREUR 404 PAGE NON TROUVER SUR NOTRE SITE";
            }
        }
    }

?>