<?php
include_once("connexionBd.php");

class LotModel
{
    private $connexionBd;

    public function __construct($connexion) {
        $this->connexionBd = $connexion;
    }

    // Récupérer tous les lots
    public function getTousLesLots()
    {
        $requete = $this->connexionBd->query('SELECT * FROM lots ORDER BY id ASC');
        $donnees = $requete->fetchAll(PDO::FETCH_OBJ);
        return $donnees;
    }

    // Récupérer un lot spécifique
    public function getLotParId($id_lot)
    {
        $requete = $this->connexionBd->prepare('SELECT * FROM lots WHERE id = :id');
        $requete->bindParam(':id', $id_lot, PDO::PARAM_INT);
        $requete->execute();
        $donnee = $requete->fetch(PDO::FETCH_OBJ);
        return $donnee;
    }

    // Ajouter un nouveau lot
    public function ajouterLot($nom, $image)
    {
        $requete = $this->connexionBd->prepare('INSERT INTO lots (nom, image) VALUES (:nom, :image)');
        $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requete->bindParam(':image', $image, PDO::PARAM_STR);
        return $requete->execute();
    }

    // Modifier un lot existant
    public function modifierLot($id, $nom, $image)
    {
        $requete = $this->connexionBd->prepare('UPDATE lots SET nom = :nom, image = :image WHERE id = :id');
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        $requete->bindParam(':nom', $nom, PDO::PARAM_STR);
        $requete->bindParam(':image', $image, PDO::PARAM_STR);
        return $requete->execute();
    }

    // Supprimer un lot
    public function supprimerLot($id)
    {
        $requete = $this->connexionBd->prepare('DELETE FROM lots WHERE id = :id');
        $requete->bindParam(':id', $id, PDO::PARAM_INT);
        return $requete->execute();
    }
}
?>