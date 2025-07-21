# jeux_club_informatique_cbs
Ceci est un jeu de competition, de defis, de QCM et de culture generale dans le domaine de l'informatique qui est accessible et reserver a tout public 

**1. But général de l'application**
L'application est une plateforme de jeux de compétition pour un club informatique (année 2023-2024). Elle permet :
- De publier des jeux/questions (mode solo ou duel)
- De jouer à ces jeux (tirage aléatoire, réponses, gestion des scores)
- De gérer des lots/récompenses
- D'administrer le contenu via une interface dédiée


**2. Architecture générale**
- index.php : Point d'entrée unique. Il charge la configuration, le routeur, l'en-tête, le pied de page, et délègue la logique métier au routeur selon la requête.
- _config.php : Définit toutes les constantes de chemins (modèles, vues, assets, admin, etc.) et active l'affichage des erreurs.
- connexionBd.php : Gère la connexion PDO à la base de données MySQL.
- routeur.class.php : Routeur maison qui mappe les URLs (ou noms de pages) vers des méthodes précises du contrôleur principal (allMethod).


**3. Contrôleur principal**
- controller/allMethod.class.php : Contient toutes les méthodes qui affichent les différentes pages (formulaire, accueil, jeux, solo, duel, dashboard, etc.).
  - Chaque méthode inclut la vue correspondante.
  - La méthode affichePageFormulaire gère la soumission d'un nouveau jeu (solo ou duel) via POST et appelle les méthodes d'insertion du modèle formulaire.


**4. Modèles (model/)**
- formulaire.class.php : Gère l'insertion de nouveaux jeux (solo ou duel) dans la base.
- duel.class.php : Gère la récupération, l'affichage, la mise à jour et le tirage des jeux en mode duel.
- solo.class.php : Idem pour le mode solo, avec en plus la gestion du reset de tous les tirages.
- lotsModel.php : Gère la récupération, l'ajout, la modification et la suppression des lots/récompenses.


**5. Vues (view/)**
- accueil.php : Page d'accueil, propose de commencer à jouer.
- formulaire.php : Formulaire d'ajout de jeu (solo/duel), inclus dans l'admin.
- duel.php : Interface de tirage aléatoire pour le mode duel (animation JS).
- solo.php : Interface de tirage aléatoire pour le mode solo, avec gestion du bouton de tirage, animation, et redirection vers la question tirée.
- mainSolo.php : Affiche la question solo tirée, les choix de réponses, gère la sélection et l'affichage de la bonne/mauvaise réponse (avec confettis ou emoji).
- jeu.php : Permet de choisir entre mode solo ou duel.
- lots.php : Affiche les lots à gagner (avec images et noms).
- ajoutLots.php : Formulaire d'ajout d'un lot (nom + image).
- entetePage.php / piedPage.php : En-tête et pied de page HTML globaux.


**6. Administration (administration/)**
- dashboard.php : Tableau de bord d'administration (structure de base).
- sidebar.php : Barre latérale de navigation admin (lien vers dashboard, formulaire de jeu, bouton de reset des tirages).
- openContenuPrincipale.php / closeContenuPrincipale.php : Délimitent le contenu principal de l'admin (structure HTML + JS pour le toggle de la sidebar).
- cssAdmin.css : Styles spécifiques à l'admin (sidebar, boutons, responsive...).


**7. Assets**
- asset/css.css : Styles principaux du site (mise en page, boutons, formulaires, responsive, etc.).
- asset/js.js : (Vide actuellement) – prévu pour les interactions JS globales.


**8. Fonctionnement détaillé**
- Routing : Toute requête passe par index.php qui délègue au Routeur. Celui-ci choisit la méthode du contrôleur à appeler selon la page demandée (ex : accueil, formulaire, duel, etc.).
- Ajout de jeu : Depuis l'admin, on peut publier un jeu via un formulaire. Selon le type (solo/duel), l'insertion se fait dans la table appropriée.
- Tirage et jeu :
  - En mode solo, un bouton permet de tirer aléatoirement une question non encore jouée. L'ID tiré est marqué comme "tiré" en base pour éviter les doublons.
  - En mode duel, une animation JS affiche un chiffre aléatoire.
  - Les questions sont affichées avec leurs choix, la sélection d'une réponse affiche immédiatement si c'est correct (confettis) ou non (emoji triste).

- Lots : Les lots sont affichés dans une grille, chaque lot ayant un nom et une image. Un formulaire permet d'en ajouter.
- Administration : L'admin peut publier des jeux, voir le dashboard, et réinitialiser tous les tirages solo.

**9. Sécurité et remarques**
- La gestion des erreurs est activée (affichage complet).
- Les requêtes SQL utilisent PDO avec des requêtes préparées (sécurisé contre l'injection).
- Les vues utilisent parfois htmlspecialchars pour l'affichage des lots (sécurisation XSS).
- Le code est modulaire, chaque fonctionnalité a son fichier dédié.


**10. Points d'amélioration possibles**
- Le JS global (asset/js.js) est vide, tu pourrais y centraliser les scripts communs.
- La gestion des utilisateurs/admins n'est pas présente (pas d'authentification).
- Les contrôleurs pourraient être découpés pour plus de clarté si l'app grandit.
- Les erreurs 404 sont gérées simplement par un echo, tu pourrais faire une vraie page d'erreur.


**En résumé :**
L'application est une plateforme de quiz/jeux pour un club, avec une gestion simple mais efficace des jeux, des lots, et une interface d'administration. Le code est organisé par modules (MVC simplifié), chaque composant a un rôle clair, et l'interface est responsive et moderne.
Je suis maintenant prêt à t'aider pour toute modification profonde ou évolution de ton application, même dans les moindres détails. Dis-moi ce que tu veux modifier ou améliorer !
