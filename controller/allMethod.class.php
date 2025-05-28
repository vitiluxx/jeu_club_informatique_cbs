<?php 
class allMethod
{
    public function affichePageFormulaire()
    {
        require(MODEL_ROOT."formulaire.class.php");
        $objet = new formulaire($connexionBd);
    
        if(isset($_POST["soumettre"]))
        {
            $question_solo = $_POST["question"];
            $reponse_a_solo = $_POST["reponse_a"];
            $reponse_b_solo = $_POST["reponse_b"];
            $reponse_c_solo = $_POST["reponse_c"];
            $reponse_d_solo = $_POST["reponse_d"];
            $bonne_reponse_solo = $_POST["bonne_reponse"];

            if($_POST["choix_jeux"] === "solo")
            {
                $testInsertion = $objet->setInsererJeuSolo($question_solo,$reponse_a_solo,$reponse_b_solo,$reponse_c_solo,$reponse_d_solo,$bonne_reponse_solo);
 
                if($testInsertion === true)
                {
                    ?><script>alert("QUIZ SOLO inserer avec succes");</script><?php
                }
            }

            if($_POST["choix_jeux"] === "duel")
            {
                $testInsertion = $objet->setInsererJeuDuel($jeu);

                if($testInsertion === true)
                {
                    ?><script>alert("QUIZ DUEL inserer avec succes");</script><?php
                }
            }
        }

        require(VIEW_ROOT."formulaire.php");
    }

   /*============================================================================================================================ */    

    public function affichePageAccueil()
    {

        require(VIEW_ROOT."accueil.php");
    }

    /*============================================================================================================================ */    
    
    public function affichePageJeux()
    {

        require(VIEW_ROOT."jeu.php");
    }



    /*============================================================================================================================ */    

    public function affichePageFiliere()
    {

        include(VIEW_ROOT."filiere.php");
    }

    /*============================================================================================================================ */    

    public function affichePageSolo()
    {


        include(VIEW_ROOT."solo.php");
    }

    /*============================================================================================================================ */    

    public function affichePageDuel()
    { 

        include(VIEW_ROOT."duel.php");
    }

    /*============================================================================================================================ */    
    public function affichePageMainSolo()
    { 

        include(VIEW_ROOT."mainSolo.php");
    }
    /*============================================================================================================================ */    
    public function affichePageDashboard()
    { 

        include(ADMIN_ROOT."dashboard.php");
    }
    

    
}
    

?>