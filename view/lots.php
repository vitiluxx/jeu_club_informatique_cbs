
<!----------------debut: CORPS DE LA PAGE -------------------------->  
    <div class="lotsPage_presentation-container">
        <h1>Découvrez les lots à gagner !</h1>
        <div class="lotsPage_lots-grid" id="lotsGrid">
            <?php foreach ($lots as $index => $lot): ?>
                <div class="lotsPage_lot-item" data-index="<?= $index ?>">
                    <img src="assets/images/lots/<?= htmlspecialchars($lot['image']) ?>" alt="<?= htmlspecialchars($lot['nom']) ?>" class="lotsPage_lot-image">
                    <div class="lotsPage_lot-name"><?= htmlspecialchars($lot['nom']) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<script src="<?=ASSET_HOST?>js.js"></script>
