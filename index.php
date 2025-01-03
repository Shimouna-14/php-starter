<?php
$title = 'Accueil';
$description = 'Coach Sportif - Page de prise de RDV';

session_start();
$modal = '';
if (isset($_SESSION['errors'])) {
    if (count($_SESSION['errors']) > 0) {
        $modal = './modal/error.php';
        session_destroy();
    }
}

if (isset($_GET['success'])) {
    $modal = './modal/success.php';
    session_destroy();
}
?>


<?php $modal && include $modal ?>

<?php include './components/header.php' ?>

<h1>Coach Sportif</h1>
<p>Bienvenue sur ma page de prise de RDV</p>

<article>
    <header>
        <p align="center">
            Remplissez le formulaire ci-dessous pour réserver votre séance de sport
        </p>
    </header>

    <?php include './components/form.php' ?>

    <footer>
        <p align="center">
            Une validation de votre séance sera envoyée à votre adresse email
        </p>
    </footer>
</article>

<?php include './components/footer.php' ?>