<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mo";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $post_mo = $_POST['post_mo'];
    $post_content = $_POST['post_content'];
    $post_navn = $_POST['post_navn'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO my_table(post_mo, post_content, post_navn) VALUES(:post_mo, :post_content, :post_navn)";
        $stmt = $conn->prepare($query);


        $stmt->bindParam(':post_mo', $post_mo);
        $stmt->bindParam(':post_content', $post_content);
        $stmt->bindParam(':post_navn', $post_navn);


        $stmt->execute();


        if ($stmt->rowCount() > 0) {
            // Sending email
            $mail = new PHPMailer(true);

            try {
                // Server settings for Gmail SMTP
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'middagkrokeide@gmail.com'; // Your Gmail email address
                $mail->Password   = 'sppuclynfrwqobox'; // Your Gmail password or app password
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                // Sender and recipient settings
                $mail->setFrom('middagkrokeide@gmail.com'); // Your name and email
                $mail->addAddress('middagkrokeide@gmail.com'); // Recipient's email and name

                // Email content
                $mail->isHTML(true);
                $mail->Subject = "Middagsønske fra $post_navn";
                $mail->Body    = "Middagsønske: $post_mo <br> Forklaring av middag: $post_content <br> Navn: $post_navn";

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

            header("Location: ../mø_success.html");
            exit();
        } else {
            echo "Failed to insert record";
        }
    } catch (PDOException $e) {
        echo "SQL Error: " . $e->getMessage();
    }
}
?>