<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $middagsønske = $_POST['post_mø'];
    $forklaring = $_POST['post_content'];
    $navn = $_POST['post_navn'];

    // Email information
    $to = "marius.larsson1@gmail.com"; // Replace with your email address
    $subject = "Middagsønske from $navn";
    $message = "Middagsønske: $middagsønske\n\nForklaring av middag: $forklaring\n\nNavn: $navn";

    // Send email
    $headers = "From: marius.larsson1@gmail.com"; // Replace with a valid sender email address
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully, redirect to a new page
        header("Location: success.html"); // Replace with the URL of the success page
        exit(); // Ensure that no other code runs after the redirection
    } else {
        echo "<p>Oops! Something went wrong. Please try again later.</p>";
    }
}
?>
