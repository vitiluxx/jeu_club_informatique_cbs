
<!----------------debut: CORPS DE LA PAGE -------------------------->
<main class="main-corpsPageSujetAccueil">
    
    <div class="container">
        <div class="scrolling-number" id="number"></div>
        <button onclick="startAnimation()">Démarrer</button>
    </div>

<script>
function startAnimation() {
    const numbers = "0123456789"; // Chiffres à afficher
    const randomNum = numbers[Math.floor(Math.random() * numbers.length)]; // Choisir un chiffre aléatoire
    const numberElement = document.getElementById('number');
    
    // Animation de défilement aléatoire
    let steps = 100; // Nombre d'étapes pour l'animation
    let deg = 50; // Rotation initiale
    let interval = setInterval(() => {
        if (steps <= 3) {
            clearInterval(interval);
            numberElement.textContent = randomNum;
        } else {
            deg += 360 / steps;
            numberElement.style.transform = rotate({deg});
            steps--;
        }
    }, 50); // Intervalle de temps entre chaque étape de l'animation
}
</script>

</main>
<!----------------fin: CORPS DE LA PAGE -------------------------->
