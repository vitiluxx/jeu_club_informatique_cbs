<!-- Sidebar -->
<div class="sidebar">
    <a href="<?=HOST;?>dashboard">
        <i class="fas fa-home"></i>
        <h3 class="text-center mb-4">Dashboard</h3>
    </a>
    <ul class="list-unstyled">
        <!-- <li><a href="<?=HOST;?>dashboard"><i class="fas fa-home"></i> Accueil</a></li> -->
        <li><a href="<?=HOST;?>formulaire"><i class="fas fa-chart-line"></i> PUBLIER UN JEU </a></li>
        <form method="post" onsubmit="return confirm('Confirmer la réinitialisation de tous les tirages ?');">
            <button type="submit" name="reset_tirages" class="boutton_rouge_reinitialiser">🔄 Réinitialiser tous les tirages</button>
        </form>
    </ul>
</div>

<?php
include_once(MODEL_ROOT . 'solo.class.php');
$objetSolo = new solo($connexionBd);

// Réinitialisation sur clic du bouton
if (isset($_POST['reset_tirages'])) {
    $objetSolo->resetTousLesTirages();
    echo "<script>alert('Tous les tirages ont été réinitialisés avec succès.');</script>";
}
?>
