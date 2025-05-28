
<!----------------debut: CORPS DE LA PAGE -------------------------->
<!-- Inclusion du script JS principal -->
<script src="<?=ASSET_HOST?>js.js"></script>

<?php
    // Inclusion du fichier de classe Solo pour la gestion des jeux
    include(MODEL_ROOT."solo.class.php");
    $objetSolo = new solo($connexionBd); // Création d'une instance de la classe Solo avec la connexion BD

    $id = $_GET['id']; // Récupération de l'identifiant du jeu depuis l'URL

    // Vérification de la validité de l'identifiant
    if(empty($id) OR $id > 100 OR !(INT)$id){
        echo "DESOLER PAS DE JEUX DISPONIBLE"; // Erreur si ID non valide
    }
    else {
        $jeuDemander = $objetSolo->AfficheJeu_Solo($id); // Récupération des infos du jeu en base

        if(empty($jeuDemander)) {
            // Si aucun jeu trouvé, on vide les variables d'affichage
            $Q = "DESOLER PAS DE JEUX DISPONIBLE POUR CE CHIFFRE";
            $RA = "";
            $RB = "";
            $RC = "";
            $RD = "";
            $BR = "";
        } else {
            // Sinon, on remplit les variables avec les données du jeu
            foreach($jeuDemander as $jeu) {
                $Q = $jeu->question_solo;
                $RA = $jeu->reponse_a_solo;
                $RB = $jeu->reponse_b_solo;
                $RC = $jeu->reponse_c_solo;
                $RD = $jeu->reponse_d_solo;
                $BR = $jeu->bonne_reponse_solo;
            }
        }
    }
?>


<!-- Bloc principal contenant la question et les choix -->
<div class="question">
    <!-- Affichage de la question -->
    <p class="p-question"><?=@$Q;?></p>

    <!-- Bloc contenant les 4 choix de réponse -->
    <div class="choices">
        <div class="top-choices">
            <button class="choice" data-answer=""><?=@$RA;?></button>
            <button class="choice" data-answer=""><?=@$RB;?></button>
        </div>
        <div class="bottom-choices">
            <button class="choice" data-answer=""><?=@$RC;?></button>
            <button class="choice" data-answer=""><?=@$RD;?></button>
        </div>
    </div>

    <!-- Bouton pour relancer une nouvelle partie -->
    <a href="solo.php">
        <button id="button-jouerANouveau">JOUER A NOUVEAU</button>
    </a>

    <!-- Conteneur des emojis affichés si mauvaise réponse -->
    <div id="emojiContainer" class="emoji-container">😢😭😝</div>
</div>


<style>
/* Emoji de réaction affiché temporairement en cas de mauvaise réponse */
.emoji-container {
    display: none; /* Caché par défaut */
    font-size: 70px;
    position: absolute;
    top: 40%;
    left: 50%;
    transform: translate(-50%, -50%);
    animation: bounce 1s ease-in-out; /* Animation rebond */
}

/* Animation de rebond lors de l'apparition de l'emoji */
@keyframes bounce {
    0% { transform: translate(-50%, -50%) scale(0); }
    50% { transform: translate(-50%, -50%) scale(1.2); }
    100% { transform: translate(-50%, -50%) scale(1); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const choices = document.querySelectorAll('.choice'); // Tous les boutons de réponse
    const goodAnswerNonFormater = "<?=$BR;?>"; // Réponse correcte depuis PHP
    const goodAnswer = goodAnswerNonFormater.trim(); // Nettoyage des espaces éventuels
    const emojiContainer = document.getElementById('emojiContainer');

    // Écouteurs d'événement sur chaque bouton de choix
    choices.forEach(choice => {
        choice.addEventListener('click', function() {
            const selectedAnswer = this.textContent.trim(); // Réponse sélectionnée

            // Réinitialiser tous les choix (supprime les anciennes classes)
            choices.forEach(c => c.classList.remove('selected', 'correct', 'wrong'));

            this.classList.add('selected'); // Marque ce bouton comme sélectionné

            if (selectedAnswer === goodAnswer) {
                this.classList.add('correct'); // Bonne réponse

                // Lancer des confettis en cas de bonne réponse
                confetti({
                    particleCount: 400,
                    spread: 200,
                    origin: { y: 0.5 },
                    shapes: ['circle', 'square', 'rect'],
                    scalar: 1.9,
                    ticks: 300,
                    gravity: 0.5
                });

            } else {
                this.classList.add('wrong'); // Mauvaise réponse

                // Afficher la bonne réponse en vert
                choices.forEach(c => {
                    if (c.textContent.trim() === goodAnswer) {
                        c.classList.add('correct');
                    }
                });

                // Afficher temporairement l'emoji de tristesse
                emojiContainer.style.display = 'block';
                setTimeout(() => {
                    emojiContainer.style.display = 'none';
                }, 10000); // Emoji visible pendant 10 secondes
            }
        });
    });
});
</script>

<!-- Inclusion de la bibliothèque de confettis depuis CDN -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.4.0/dist/confetti.browser.min.js"></script>
