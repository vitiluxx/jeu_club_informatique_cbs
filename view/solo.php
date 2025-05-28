<!-- Contenu principal de la page -->
<main class="main-corpsPageSujetAccueil">
    <form method="post" action="">
    
        <!-- Bouton contenant le cercle où le nombre sera affiché (chiffre pioché) -->
        <button id="output" name="cercle_transparent" class="cercle-bouton">
            <!-- Zone où le chiffre animé va apparaître -->
            <span id="nombreAnime" class="chiffre">---</span>
        </button>

        <?php
            // Inclusion de la classe de gestion des jeux "solo"
            include(MODEL_ROOT."solo.class.php");
            $objetSolo = new Solo($connexionBd); // Connexion à la BD via classe Solo

            // Récupération de la liste de tous les jeux
            $listeDesTirages = $objetSolo->AfficheListeDeTirages_Solo();
            $jeuxDisponibles = []; // Initialisation de la liste des jeux encore non tirés

            // Parcours des jeux pour extraire uniquement ceux qui n'ont pas encore été tirés
            foreach($listeDesTirages as $tirage) {
                if (empty($tirage->tirage_solo) || $tirage->tirage_solo == 0) {
                    $jeuxDisponibles[] = (int)$tirage->id_solo; // Stockage de l'ID des jeux non tirés
                }
            }

            // Vérification si le bouton "Top" a été cliqué et validé
            if (isset($_POST["boutton_rouge"]) && $_POST["traitement_boutton"] === 'true') {

                // Cas où tous les jeux ont été tirés → Alerte à l'utilisateur
                if (count($jeuxDisponibles) === 0) {
                    echo '<script>alert("ATTENTION: TOUS LES JEUX ONT ÉTÉ PIOCHÉS. VEUILLEZ VIDER LA COLONNE << tirage_solo >> DE LA BASE DE DONNÉE ET RÉESSAYER");</script>';
                
                } else {
                    // Sélection aléatoire d’un jeu non encore tiré
                    $index = random_int(0, count($jeuxDisponibles) - 1);
                    $idTire = $jeuxDisponibles[$index];

                    // Mise à jour en base : marquer ce jeu comme "tiré"
                    $objetSolo->setInsererTirageSolo($idTire);

                    // Animation JS du chiffre, puis redirection vers la page du jeu pioché
                    echo "<script>
                        window.addEventListener('DOMContentLoaded', function() {
                            animationChiffre($idTire); // Lancer l'animation
                            setTimeout(function() {
                                // Redirection après 6,5 secondes
                                window.location.href = '" . HOST . "mainSolo.php?id=$idTire';
                            }, 6500);
                        });
                    </script>";
                }
            }
        ?>

        <!-- Champ caché pour signaler que le bouton rouge a été activé -->
        <input type="hidden" id="traitement_boutton" name="traitement_boutton" value=""/>

        <!-- Bouton qui déclenche le tirage -->
        <input type="submit" class="boutton_rouge" name="boutton_rouge" value="Top"
               onclick="document.getElementById('traitement_boutton').value = 'true';"/>
    </form>
</main>

<!-- Script JS pour animer l'affichage du chiffre tiré -->
<script>
function animationChiffre(nombreFinal) {
    const output = document.getElementById('nombreAnime'); // Zone où afficher le nombre
    let current = 150; // Valeur de départ
    const step = current < nombreFinal ? 1 : -1; // Incrément ou décrément
    const interval = 20; // Intervalle en millisecondes entre chaque étape

    const animation = setInterval(() => {
        current += step;
        output.textContent = current; // Mise à jour de l'affichage

        // Quand la valeur finale est atteinte, arrêter l'animation
        if (current === nombreFinal) {
            clearInterval(animation);
        }
    }, interval);
}
</script>
