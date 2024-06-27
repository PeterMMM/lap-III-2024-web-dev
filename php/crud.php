<?php
include 'connect.php';
// Create a customer
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST["name"];
    // $age = $_POST["age"];
    $email = $_POST["email"];

    $sql = "INSERT INTO customers (name, email) VALUES ('$name', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New customer created successfully<br/>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["edit_id"])) {
    $id = $_POST["edit_id"];
    $name = $_POST["edit_name"];
    $age = $_POST["edit_age"];
    $email = $_POST["edit_email"];

    $sql = "UPDATE students SET name='$name', age=$age, email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete a student
if (isset($_GET["delete_id"])) {
    $id = $_GET["delete_id"];

    $sql = "DELETE FROM customers WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Read all customer
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Age: " ." - Email: " . $row["email"] . " ";
        echo '<a href="edit.php?id=' . $row["id"] . '">Edit</a> | ';
        echo '<a href="?delete_id=' . $row["id"] . '">Delete</a><br>';
    }
} else {
    echo "No students found.";
}

$conn->close();
?>
<br/>

<!-- HTML form to create a customer -->
<form method="POST" action="">
    <input type="text" name="name" placeholder="Name" required><br>
    <!-- <input type="number" name="age" placeholder="Age" required><br> -->
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="submit" value="Create Customer">
</form>