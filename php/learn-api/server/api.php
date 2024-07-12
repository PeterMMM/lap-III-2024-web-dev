<?php
// Database configuration
include '../connect.php';

// Set the response header for JSON
header("Content-Type: application/json");
// Add CORS headers to allow requests from any origin
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Handle HTTP requests
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Get orders or a specific order
        $orderID = isset($_GET['orderID']) ? intval($_GET['orderID']) : null;
        if ($orderID) {
            getOrder($orderID);
        } else {
            getOrders();
        }
        break;
    case 'POST':
        // Create a new order
        createOrder();
        break;
    case 'PUT':
        // Update an existing order
        parse_str(file_get_contents("php://input"), $putData);
        $orderID = isset($putData['orderID']) ? intval($putData['orderID']) : null;
        if ($orderID) {
            updateOrder($orderID, $putData);
        } else {
            http_response_code(400); // Bad Request
            echo json_encode(array("message" => "Missing orderID parameter",
            "data"=> [
                "orderID" => $orderID,
                "customerID" => '',
                "orderDate"  => ''
            ]));
        }
        break;
    case 'DELETE':
        // Delete an order
        $orderID = isset($_GET['orderID']) ? intval($_GET['orderID']) : null;
        if ($orderID) {
            deleteOrder($orderID);
        } else {
            http_response_code(400); // Bad Request
            echo json_encode(array("message" => "Missing orderID parameter"));
        }
        break;
    default:
        http_response_code(405); // Method Not Allowed
        echo json_encode(array("message" => "Method not allowed"));
}

// Get all orders
function getOrders()
{
    global $conn;
    // $sql = "SELECT * FROM Orders";
    $sql = "SELECT Orders.OrderID, Orders.OrderDate, Customers.CustomerName, Customers.CustomerID , Customers.City 
            FROM Orders 
            JOIN Customers ON Orders.CustomerID = Customers.CustomerID";
    $result = $conn->query($sql);
    $orders = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }
    }

    echo json_encode($orders);
}

// Get a specific order
function getOrder($orderID)
{
    global $conn;
    // $sql = "SELECT * FROM Orders WHERE OrderID = $orderID";
    $sql = "SELECT Orders.OrderID, Orders.OrderDate, Customers.Name, Customers.City 
            FROM Orders 
            JOIN Customers ON Orders.CustomerID = Customers.CustomerID 
            WHERE Orders.OrderID = $orderID";
    $result = $conn->query($sql);
    $order = $result->fetch_assoc();

    if ($order) {
        echo json_encode($order);
    } else {
        http_response_code(404); // Not Found
        echo json_encode(array("message" => "Order not found"));
    }
}

// Create a new order
function createOrder()
{
    global $conn;
    $customerID = isset($_POST['customerID']) ? intval($_POST['customerID']) : null;
    $orderDate = isset($_POST['orderDate']) ? $_POST['orderDate'] : null;

    if (!$customerID || !$orderDate) {
        http_response_code(400); // Bad Request
        echo json_encode(array(
            "message" => "Missing required parameters",
            "data"=> [
                "customerID" => $customerID,
                "orderDate"  => $orderDate
            ]
        ));
        return;
    }

    $sql = "INSERT INTO Orders (CustomerID, OrderDate) VALUES ($customerID, '$orderDate')";

    if ($conn->query($sql) === TRUE) {
        $orderID = $conn->insert_id;
        http_response_code(201); // Created
        echo json_encode(array(
            "status"  => "Success",
            "orderID" => $orderID
        ));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Error creating order: " . $conn->error));
    }
}

// Update an existing order
function updateOrder($orderID, $data)
{
    global $conn;
    $customerID = isset($data['customerID']) ? intval($data['customerID']) : null;
    $orderDate = isset($data['orderDate']) ? $data['orderDate'] : null;

    if (!$customerID || !$orderDate) {
        http_response_code(400); // Bad Request
        echo json_encode(array(
            "message" => "Missing required parameters",
            "data"=> [
                "orderID" => $orderID,
                "customerID" => $customerID,
                "orderDate"  => $orderDate,
            ]));
        return;
    }

    $sql = "UPDATE Orders SET CustomerID=$customerID, OrderDate='$orderDate' WHERE OrderID=$orderID";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array(
            "message" => "Order updated successfully",
        ));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array(
            "message" => "Error updating order: " . $conn->error));
    }
}

// Delete an order
function deleteOrder($orderID)
{
    global $conn;
    $sql = "DELETE FROM Orders WHERE OrderID = $orderID";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "Order deleted successfully"));
    } else {
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Error deleting order: " . $conn->error));
    }
}

// Close the database connection
$conn->close();

?>
