<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Vérifier les champs requis
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Adresse email où vous recevrez les messages
        $to = "antechssi@gmail.com";
        $subject = "Nouveau message de votre site web";

        // Corps de l'e-mail pour vous
        $body = "Nom: $name\n";
        $body .= "Email: $email\n";
        $body .= "Message:\n$message\n";

        // En-têtes pour l'e-mail envoyé à vous
        $headers = "From: $email";

        // Envoyer l'e-mail à vous
        if (mail($to, $subject, $body, $headers)) {
            // Corps de l'e-mail de confirmation pour le visiteur
            $confirmation_subject = "Merci de nous avoir contactés";
            $confirmation_body = "Bonjour $name,\n\n";
            $confirmation_body .= "Merci de nous avoir contactés. Voici une copie de votre message :\n\n";
            $confirmation_body .= "\"$message\"\n\n";
            $confirmation_body .= "Nous reviendrons vers vous dans les plus brefs délais.\n\n";
            $confirmation_body .= "Cordialement,\nL'équipe Antech SSI Services";

            // En-têtes pour l'e-mail de confirmation
            $confirmation_headers = "From: votre-email@example.com";

            // Envoyer l'e-mail de confirmation au visiteur
            if (mail($email, $confirmation_subject, $confirmation_body, $confirmation_headers)) {
                echo "Message envoyé avec succès. Un e-mail de confirmation a été envoyé.";
            } else {
                echo "Message envoyé, mais l'e-mail de confirmation n'a pas pu être envoyé.";
            }
        } else {
            echo "Erreur : le message n'a pas pu être envoyé.";
        }
    } else {
        echo "Veuillez remplir tous les champs.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>



<!--

rotégez votre formulaire :
Pour éviter les abus et les spams :

Ajoutez un reCAPTCHA (Google reCAPTCHA v2 ou v3).
Validez le format de l'adresse e-mail avec filter_var($email, FILTER_VALIDATE_EMAIL).
5. Testez les e-mails :
Remplissez et envoyez le formulaire avec des adresses e-mail valides pour vérifier les deux types d'e-mails.
Vérifiez vos dossiers spam ou courrier indésirable si les e-mails n'apparaissent pas immédiatement.

-->