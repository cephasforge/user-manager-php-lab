<?php
class HomeController extends Controller{
    public function home(): void{
        session_start();

        $this->render('home', [

        ]);
    }

    public function signin(): void{
        session_start();


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = UserRepository::getUserByEmail($email);

            if($user != false and password_verify($password, $user->getPassword())){
                session_start();
                
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['user_role'] = $user->getRole();

                $this->redirect('user-home');
            }else{
                $this->render('signin', [
                    'flash' => 'Email or Password is incorrect',
                    'old_email' => $_POST['email']
                ]);
            }
        }else{            
            $this->render('signin', [

            ]);
        }
    }

    public function signup(): void{
        session_start();

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = new User(NULL, $username, $email, '', NULL, NULL);
            $user->setPassword($password);

            try{
                UserRepository::addUser($user);
            }catch(PDOException $e){
                if ($e->getCode() === '23000') { 
                    
                    $this->render('signup', [
                        'flash' => 'This email is already associated with another account',
                        'old_email' => $_POST['email'],
                        'old_username' => $_POST['username']
                    ]);

                    return;
                }
            }

            $this->render('signin', [
                'flash' => 'Congratulations '.$_POST['username'].', your account has been successfully created',
            ]);
            
            return;

        }

        $this->render('signup', [
            'title'   => 'Accueil',
            'message' => 'Bienvenue sur mon application',
        ]);
    }
}