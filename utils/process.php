<!-- Interpréteur -->
<?php

// Traitement du formulaire
/**
 * 1 Recolter les données [ok]
 * 2 Validation des données [ok]
 * 3 Envoi de l'email []
 * 4 Confirmation de l'envoi []
 * 5 Vider le formulaire []
 */

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Symfony\Component\Dotenv\Dotenv;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST["date"] ?? "";
    $lieu = $_POST["lieu"] ?? "";
    $heure = $_POST["heure"] ?? "";
    $nom = $_POST["nom"] ?? "";
    $email = $_POST["email"] ?? "";
    $telephone = $_POST["telephone"] ?? "";

    $messages = [
        "vide" => "Il y a des données manquantes.",
        "dateInvalide" => "Merci de selectionner une date dans le futur",
        "heureInvalide" => "Les séances ont lieu entre 8h et 22h",
        "tropTard" => "Les séances doivent être réserver 1h avant",
        "lieuInvalide" => "Sélectionnez une salle dans la liste",
        "nomInvalide" => "Les caractères spéciaux ne sont pas autorisés",
        "emailInvalide" => "Seuls les fournisseurs communs sont autorisés",
        "telephoneInvalide" => "Le téléphone n'est pas valide",
    ];

    $errors = [];

    // Validation des données
    if (empty($date) || empty($lieu) || empty($heure) || empty($nom) || empty($email) || empty($telephone)) {
        array_push($errors, $messages['vide']);
    }

    if (strtotime($date) < strtotime('today')) {
        array_push($errors, $messages['dateInvalide']);
        var_dump("date invalide");
    }

    // Validation du lieu (selon les valeurs du select)
    $lieux_valides = ['FitnessPark Paris Rambuteau', 'FitnessPark Paris Gare de Lyon', 'FitnessPark Saint-Ouen', 'FitnessPark Paris Châtelet'];
    if (!in_array($lieu, $lieux_valides)) {
        array_push($errors, $messages['lieuInvalide']);
    }

    function newMailCoaching($sender, $receiver, $content, $subject)
    {
        $mail = new PHPMailer(true); //Type Object
        try {
            $dotenv = new Dotenv();
            $dotenv->loadEnv(__DIR__ . '/../.env');
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = $_ENV['MAILTRAP_USERNAME'];
            $mail->Password = $_ENV['MAILTRAP_PASSWORD'];

            $mail->setFrom($sender, 'Coach');
            $mail->addAddress($receiver);

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $content;

            $mail->send();
            return true;
        } catch (Exception $e) {
            return '<p>Un probleme est survenu lors de l\'envoi de l\'email</p>';
        }
    }

    if (empty($errors)) {
        // Envoi des emails
        $coach_email = "coach@fitnesspark.com";

        $coach_content = "Nouveau rendez-vous :<br>" .
            "Date : $date<br>" .
            "Heure : $heure<br>" .
            "Lieu : $lieu<br>" .
            "Client : $nom<br>" .
            "Email : $email<br>" .
            "Téléphone : $telephone";

        $client_content = "Votre rendez-vous est confirmé :<br>" .
            "Date : $date<br>" .
            "Heure : $heure<br>" .
            "Lieu : $lieu";

        // Envoi au coach
        newMailCoaching($email, $coach_email, $coach_content, "Nouveau RDV avec $nom");

        // Envoi au client
        newMailCoaching($coach_email, $email, $client_content, "Confirmation de votre RDV de coaching");

        // Redirection avec message de succès
        header("Location: ../index.php?success=1");
        exit();
    } else {
        // Redirection avec erreurs
        session_start();
        $_SESSION['errors'] = $errors;
        header("Location: ../index.php");
        exit();
    }
} else {
    header('Location: ../index.php');
    exit();
}

