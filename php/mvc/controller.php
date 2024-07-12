<?php
require_once 'model.php';

class UserController {
    public function viewUser($userId) {
        // Create an instance of the UserModel
        $userModel = new UserModel();

        // Get the user data from the model
        $user = $userModel->getUser($userId);

        // Include the view file to display the user details
        include 'view.php';
    }
}

// Usage example
// $userId = 123; // ID of the user to display
// $userController = new UserController();
// $userController->viewUser($userId);
?>