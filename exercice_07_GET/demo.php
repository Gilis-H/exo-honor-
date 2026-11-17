<?php
// GET transmet des paramètres dans l'URL : demo.php?prenom=Alice&page=2
// Le ? commence les paramètres ; le & sépare les couples nom=valeur.
// PHP les place dans le tableau associatif $_GET.

// ?? donne une valeur par défaut quand le paramètre est absent.
$prenom = $_GET['prenom'] ?? 'visiteur';
// Une URL peut aussi contenir prenom[]=Alice : on attend ici un texte simple.
if (!is_string($prenom)) {
    $prenom = 'visiteur';
}

// Les valeurs reçues viennent de l'utilisateur : on vérifie leur validité.
// Ici, page doit être un entier entre 1 et 3.
$pageRecue = $_GET['page'] ?? '1';
$page = is_string($pageRecue) ? filter_var($pageRecue, FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1, 'max_range' => 3],
]) : false;
$pageInvalide = ($page === false);
if ($pageInvalide) {
    $page = 1;
}

// Échapper le texte au moment de l'afficher dans du HTML empêche qu'il
// soit interprété comme des balises ou du JavaScript. Cela ne valide pas la saisie.
function echapper($texte) {
    return htmlspecialchars($texte, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comprendre GET — exercice 07</title>
    <style>
        body { font-family: sans-serif; max-width: 760px; margin: 40px auto; padding: 0 20px; line-height: 1.6; }
        code, pre { background: #f1f3f5; padding: 3px 6px; }
        pre { overflow-x: auto; padding: 15px; }
        label { display: block; margin-top: 12px; }
        input, select, button { padding: 7px; font: inherit; }
        button { margin-top: 15px; }
    </style>
</head>
<body>
    <h1>Comprendre <code>$_GET</code></h1>
    <p>GET permet de transmettre des informations au serveur dans l'adresse de la page.
        C'est pratique pour une recherche, un filtre ou un numéro de page.</p>

    <h2>1. Lire une URL</h2>
    <pre>demo.php?prenom=Alice&amp;page=2</pre>
    <ul>
        <li><code>demo.php</code> : le fichier demandé.</li>
        <li><code>?</code> : le début des paramètres.</li>
        <li><code>prenom=Alice</code> : PHP reçoit <code>$_GET['prenom']</code> avec la valeur <code>"Alice"</code>.</li>
        <li><code>&amp;</code> : le séparateur entre deux paramètres.</li>
        <li><code>page=2</code> : PHP reçoit <code>$_GET['page']</code> avec le texte <code>"2"</code>.</li>
    </ul>
    <p><a href="demo.php?prenom=Alice&amp;page=2">Essayer cette URL</a> · <a href="demo.php">Revenir sans paramètres</a></p>

    <h2>2. Essayer un formulaire GET</h2>
    <p>Au clic sur le bouton, le navigateur construit l'URL avec les attributs
        <code>name</code> des champs, puis demande à PHP de recalculer la page.</p>
    <form action="demo.php" method="get">
        <label for="prenom">Ton prénom (paramètre <code>prenom</code>)</label>
        <input id="prenom" name="prenom" value="<?= echapper($prenom) ?>">
        <label for="page">Page (paramètre <code>page</code>)</label>
        <select id="page" name="page">
            <?php for ($numero = 1; $numero <= 3; $numero++): ?>
                <option value="<?= $numero ?>" <?= $page === $numero ? 'selected' : '' ?>><?= $numero ?></option>
            <?php endfor; ?>
        </select>
        <br><button type="submit">Envoyer et observer l'adresse</button>
    </form>

    <h2>3. Le résultat côté PHP</h2>
    <p>Bonjour <strong><?= echapper($prenom) ?></strong> ! Tu consultes la page <strong><?= $page ?></strong>/3.</p>
    <?php if ($pageInvalide): ?>
        <p>Le numéro reçu est invalide : la démonstration utilise la page 1.</p>
    <?php endif; ?>
    <p>Voici le contenu brut de <code>$_GET</code> pour cette requête :</p>
    <pre><?= echapper(var_export($_GET, true)) ?></pre>
    <p>Sans paramètres, le tableau est vide. Le code utilise alors les valeurs par défaut
        <code>visiteur</code> et <code>1</code>. Ouvre ce fichier dans ton éditeur pour lire les commentaires PHP.</p>

    <h2>4. Les bons réflexes</h2>
    <ul>
        <li>Toute personne peut modifier l'URL : vérifie les valeurs reçues.
            Essaie <a href="demo.php?page=bonjour">page=bonjour</a> ou <a href="demo.php?page=99">page=99</a>.</li>
        <li><code>(int)</code>, utilisé dans l'exercice, convertit une valeur ; il ne garantit pas qu'elle est entre 1 et 3.</li>
        <li>Pour afficher une saisie dans du HTML, utilise <code>htmlspecialchars</code>.
            Essaie de saisir <code>&lt;b&gt;Alice&lt;/b&gt;</code> : les balises apparaissent comme du texte.</li>
        <li>Les paramètres sont visibles dans l'adresse et peuvent rester dans l'historique : n'y mets pas de mot de passe.</li>
        <li>Utilise GET pour consulter des informations. Pour une action qui modifie des données,
            utilise plutôt POST avec les protections adaptées.</li>
    </ul>
    <p>À essayer : change ton prénom, envoie le formulaire, puis modifie directement
        <code>page=2</code> dans la barre d'adresse. Tu peux aussi copier ce lien ou le garder en favori.</p>
    <p><a href="index.php">Retour à l'exercice 07</a></p>
</body>
</html>
