<?php
include('header.php');

// Récupération de l'id dans les paramètres de l'url
$id = $_GET['id'];
$o = null;

include('oeuvres.php');

// Obtenir le nombre total d'œuvres dans le tableau
$nombreOeuvres = count($oeuvres);

// Si l'ID est supérieur au nombre total d'œuvres, rediriger
if ($id > $nombreOeuvres || $id < 1) {
    header('location: index.php');
    exit();
}

// Parcours du tableau dans oeuvres.php
foreach ($oeuvres as $oeuvre) {
    // Si l'id présent dans l'url correspond à l'id de l'oeuvre dans le tableau
    if ($id == $oeuvre['id']) {
        $o = $oeuvre;
        break;
    }
}

?>
<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?php echo $o['image']; ?>" alt="<?php echo $o['titre']; ?>">
    </div>
    <div id="contenu-oeuvre">
        <h1><?php echo $o['titre']; ?></h1>
        <p class="description"><?php echo $o['artiste']; ?></p>
        <p class="description-complete">
            <?php echo $o['description']; ?>
        </p>
    </div>
</article>
<?php include('footer.php'); ?>