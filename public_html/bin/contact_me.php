<?php

// check if fields passed are empty
if (empty($_POST['contact_name']) ||
        empty($_POST['contact_email']) ||
        empty($_POST['contact_message']) ||
        !filter_var($_POST['contact_email'], FILTER_VALIDATE_EMAIL)) {
    echo "No arguments Provided!";
    return false;
}

$name = $_POST['contact_name'];
$email_address = $_POST['contact_email'];
$message = $_POST['contact_message'];

// create email body and send it	
$to = 'rac.pirot@yahoo.com'; // PUT YOUR EMAIL ADDRESS HERE
$email_subject = "Rotaract Club Pirot:  $name"; // EDIT THE EMAIL SUBJECT LINE HERE
$email_body = "Primili ste novu poruku preko kontakt forme.\n\n" . "Ovo su detalji:\n\nName: $name\n\nEmail: $email_address\n\nMessage:\n$message";
$headers = "Od: noreply@your-domain.com\n";
$headers .= "Odgovoriti na: $email_address";
if ($_POST['special'] != '') {
    // display message that the form submission was rejected
    echo "Na pogrešnom ste mestu spameri!";
} else {
    // accept form submission
    mail($to, $email_subject, $email_body, $headers);
    echo "Hvala Vam što ste nas kontaktirali! <a href='../index.html'>Povratak na početnu stranicu</a>";
    return true;
}
?>
