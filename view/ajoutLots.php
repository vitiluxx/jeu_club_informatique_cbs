
    
    <div class="form-container">
        <h2>Ajouter un nouveau lot</h2>
        <form action="traitementLot.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom">Nom du lot:</label>
                <input type="text" id="nom" name="nom" required>
            </div>
            
            <div class="form-group">
                <label for="image">Image du lot:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <small>Formats acceptés: JPG, PNG, GIF. Taille max: 2MB</small>
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn-submit" value="Ajouter le lot" name="ajouter">
            </div>
        </form>
    </div>