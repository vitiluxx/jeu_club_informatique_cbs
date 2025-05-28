<!-------------- Inclure la Sidebar -------------->
<?php include(ADMIN_ROOT.'sidebar.php'); ?>
<!--------------------------------------------------------->

<!-------------------------------------------------------------> 
<!-- Inclure le TAG d'ouverture du contenu principale -->
<?php include(ADMIN_ROOT.'openContenuPrincipale.php'); ?>
<!--------------------------------------------------------------->
<!----------------debut: CORPS DE LA PAGE -------------------------->
<main id="main-publier-jeu">
    <form method="post" class="form-publier-jeu">
        
        <p id="titre-form-publier-jeu">PUBLIER UN JEU</p>
       
        <div class="form-group-publier-jeu">
            <label for="choix_jeux_jeu">Choisir le type de jeu: </label>
            <select name="choix_jeux" id="choix_jeux_jeu" class="select-publier-jeu">
                <option value="">Quel est votre choix</option>
                <option value="solo">SOLO</option>
                <option value="duel">DUEL</option>
            </select>
        </div>
        
        <div class="form-group-publier-jeu">
            <label for="question_jeu">LA QUESTION: </label>
            <textarea id="question_jeu" class="textarea-publier-jeu" name="question" placeholder="Énoncé du jeu" required></textarea>
        </div>
        
        <div class="form-group-publier-jeu">
            <label for="reponse_a_jeu">REPONSE A: </label>
            <textarea id="reponse_a_jeu" class="textarea-publier-jeu" name="reponse_a" placeholder="Réponse A" required></textarea>
        </div>
        
        <div class="form-group-publier-jeu">
            <label for="reponse_b_jeu">REPONSE B: </label>
            <textarea id="reponse_b_jeu" class="textarea-publier-jeu" name="reponse_b" placeholder="Réponse B" required></textarea>
        </div>
        
        <div class="form-group-publier-jeu">
            <label for="reponse_c_jeu">REPONSE C: </label>
            <textarea id="reponse_c_jeu" class="textarea-publier-jeu" name="reponse_c" placeholder="Réponse C" required></textarea>
        </div>
        
        <div class="form-group-publier-jeu">
            <label for="reponse_d_jeu">REPONSE D: </label>
            <textarea id="reponse_d_jeu" class="textarea-publier-jeu" name="reponse_d" placeholder="Réponse D" required></textarea>
        </div>

        <div class="form-group-publier-jeu">
            <label for="bonne_reponse_jeu">Saisir la Bonne réponse du jeu ici: </label>
            <textarea id="bonne_reponse_jeu" class="textarea-publier-jeu textarea-bonne-reponse" name="bonne_reponse" placeholder="Bonne réponse"></textarea>
        </div>

        <button type="submit" name="soumettre" class="btn-submit-publier-jeu">ENVOYER</button>
    </form>
</main>
<!----------------fin: CORPS DE LA PAGE ---------------------------->
<!----- Inclure le TAG de fermeture du contenu principale --------->
<?php include(ADMIN_ROOT.'closeContenuPrincipale.php'); ?>
<!--------------------------------------------------------------->