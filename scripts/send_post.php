<?php
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

            header("Location: ../mø_success.html");
            exit();
        } else {
            echo "Failed to insert record";
        }
    } catch (PDOException $e) {
        echo "SQL Error: " . $e->getMessage();
    }
}
