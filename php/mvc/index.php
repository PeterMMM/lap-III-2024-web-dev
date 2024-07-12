<?php
require_once 'controller.php';

// Usage example
$userId = 123; // ID of the user to display
$userController = new UserController();
$userController->viewUser($userId);
?>