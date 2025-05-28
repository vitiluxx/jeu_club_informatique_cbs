<?php
    include_once("connexionBd.php");
    
    class solo
    {
        private $connexionBd;

        public function __construct($connexion) {
            $this->connexionBd = $connexion;
        }

        public function AfficheJeu_Solo($id_solo)
        {
            $requette = $this->connexionBd->prepare('SELECT * FROM solo WHERE id_solo = :id_solo');
            $requette->bindParam(':id_solo', $id_solo, PDO::PARAM_INT);
            $requette->execute();
            $donnees = $requette->fetchAll(PDO::FETCH_OBJ);
            return $donnees;
        }


        public function AfficheBonneReponseJeu_Solo($id_solo)
        {
            $requette = $this->connexionBd->prepare('SELECT bonne_reponse_solo FROM solo WHERE id_solo = :id_solo');
            $requette->bindParam(':id_solo', $id_solo, PDO::PARAM_INT);
            $requette->execute();
            $donnees = $requette->fetchAll(PDO::FETCH_OBJ);
            return $donnees;
        }


        public function AfficheListeDeTirages_Solo()
        {
            $requette = $this->connexionBd->query('SELECT id_solo, tirage_solo FROM solo');
            $donnees = $requette->fetchAll(PDO::FETCH_OBJ);
            return $donnees;
        }

        
        public function setInsererTirageSolo($tirage_solo)
        {
            $requette = $this->connexionBd->prepare('UPDATE solo SET tirage_solo = :tirage WHERE id_solo = :id');
            $requette->bindParam(':tirage', $tirage_solo, PDO::PARAM_INT);
            $requette->bindParam(':id', $tirage_solo, PDO::PARAM_INT);
            $requette->execute();
        }

        public function setUpdateJeuSolo($libelle,$id_solo)
        {
            $requette = $this->connexionBd->prepare('UPDATE solo SET jeux_solo = :libelle WHERE id_solo = :id_solo');
            $requette->bindParam(':libelle', $libelle, PDO::PARAM_STR);
            $requette->bindParam(':id_solo', $id_solo, PDO::PARAM_INT);
            $requette->execute();
        }

        public function resetTousLesTirages()
        {
            $requette = $this->connexionBd->prepare('UPDATE solo SET tirage_solo = 0');
            $requette->execute();
        }

    }

    ?>