<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Customer Management</title>
</head>
<body>
    <div class="container mt-5">
    <?php
include 'connect.php';

// Define response messages
$messages = [
    'create_success' => "New customer created successfully",
    'update_success' => "Customer updated successfully",
    'delete_success' => "Customer deleted successfully",
    'error' => "Error: "
];

// Function to handle form data securely
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Handling POST requests
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["edit_id"])) {
        // Update customer
        $id = intval(clean_input($_POST["edit_id"]));
        $name = clean_input($_POST["edit_name"]);
        $email = clean_input($_POST["edit_email"]);

        $sql = "UPDATE customers SET name='$name', email='$email' WHERE id=$id";
    } else {
        // Create customer
        $name = clean_input($_POST["name"]);
        $email = clean_input($_POST["email"]);

        $sql = "INSERT INTO customers (name, email) VALUES ('$name', '$email')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>" . $messages['create_success'] . "</div>";
    } else {
        echo "<div class='alert alert-danger'>" . $messages['error'] . $conn->error . "</div>";
    }
}
?>
<!-- HTML form to create a customer with Bootstrap styling -->
<div class="container card">
  <form method="POST" action="" class="needs-validation" novalidate>
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>
    <button type="submit" class="btn btn-success">Create Customer</button>
  </form>
</div>
<?php
// Handling GET requests
if (isset($_GET["delete_id"])) {
    $id = intval($_GET["delete_id"]);
    $sql = "DELETE FROM customers WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>" . $messages['delete_success'] . "</div>";
    } else {
        echo "<div class='alert alert-danger'>" . $messages['error'] . $conn->error . "</div>";
    }
}

// Reading all customers
$sql = "SELECT * FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul class='list-group'>";
    while ($row = $result->fetch_assoc()) {
        echo "<li class='list-group-item'>";
        echo "ID: " . $row["id"] . " - Name: " . $row["name"] . " - Email: " . $row["email"] . " ";
        echo '<a href="edit.php?id=' . $row["id"] . '" class="btn btn-primary">Edit</a> ';
        echo '<a href="?delete_id=' . $row["id"] . '" class="btn btn-danger">Delete</a>';
        echo "</li>";
    }
    echo "</ul>";
} else {
    echo "<div class='alert alert-info'>No customers found.</div>";
}

// $conn->close();
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


