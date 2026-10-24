<?php
class UserController extends Controller{
    public function userHome(): void{
        session_start();
        
        if($this::isUserConnected()){        
            $users = UserRepository::getUsers();

            $this->render('user_home', [
                'users'   => $users,
            ]);
        }else{
            $this->redirect('home');
        }
    }

    public function userRead(){
        session_start();

        $user = UserRepository::getUserById($_POST['id']);

        if($this::isUserConnected()){        
            $this->render('user_update', [
                'user'   => $user,
            ]);
        }else{
            $this->redirect('home');
        }
    }

    public function userDelete(){
        session_start();

        $id = $_POST['id'];
        $delete_result = UserRepository::deleteUser($id);

        echo $delete_result ? 'DELETE SUCCESS' : 'DELETE FAILED';

        $this->redirect('user-home');
    }

    public function userUpdate(){
        session_start();

        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        // $created_at = $_POST['created_at'];

        $user = new User($id, $username, $email, '', $role, NULL);
        $update_result = UserRepository::updateUser($user);

        echo $update_result ? 'UPDATE SUCCESS' : 'UPDATE FAILED';

        $user = UserRepository::getUserById($_POST['id']);

        $this->render('user_update', [
            'user' => $user
        ]);
    }

    public function userLogout(): void{
        session_start();
        
        $_SESSION = [];
        session_destroy();

        $this->redirect('home');
    }
    
    private static function isUserConnected(): bool{
        return isset($_SESSION['user_id']) ? true : false;
    }
}
