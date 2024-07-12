<?php
class UserModel {
    public function getUser($userId) {
        // Retrieve user data from the database
        // This is just a mock example
        $userData = [
            'id' => $userId,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'age' => 25
        ];
        return $userData;
    }
}
?>