<?php
$title = 'Tarifs';
$description = 'Coach Sportif - Tarifs des séances de sport';
?>

<?php include './components/header.php' ?>

<h1>Coach Sportif</h1>
<p>Tarifs des séances de sport</p>

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