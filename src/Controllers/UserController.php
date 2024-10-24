<?php
namespace Dac099\YneCrud\Controllers;
use Dac099\YneCrud\Models\UserModel;

class UserController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function listAllUsers(): void
    {
        $users = $this->userModel->getAllUsers();

        // ob_start();
        // require "src/Views/User/List.php";
        // $content = ob_get_clean();
        var_dump($users);

        require "src/Views/Layout.php";
    }

    public function showUserData(string $userId):void
    {
        $user = $this->userModel->getUser($userId);

        ob_start();
        require "src/Views/User/UserData.php";
        $content = ob_get_clean();

        require "src/Views/Layout.php";
    }
}