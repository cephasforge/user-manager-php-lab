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
