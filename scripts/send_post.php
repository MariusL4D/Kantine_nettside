<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mo";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming your form fields are named 'post_mo', 'post_content', and 'post_navn'
    $post_mo = $_POST['post_mo'];
    $post_content = $_POST['post_content'];
    $post_navn = $_POST['post_navn'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO my_table(post_mo, post_content, post_navn) VALUES(:post_mo, :post_content, :post_navn)";
        $stmt = $conn->prepare($query);

        // Bind parameters
        $stmt->bindParam(':post_mo', $post_mo);
        $stmt->bindParam(':post_content', $post_content);
        $stmt->bindParam(':post_navn', $post_navn);

        // Execute the prepared statement
        $stmt->execute();

        // Check if a record was successfully inserted
        if ($stmt->rowCount() > 0) {
            // Redirect to a success page
            header("Location: ../mø_success.html");
            exit(); // Ensure that no other output is sent
        } else {
            echo "Failed to insert record";
        }
    } catch (PDOException $e) {
        echo "SQL Error: " . $e->getMessage();
    }
}
?>