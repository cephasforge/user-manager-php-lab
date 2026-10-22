<?php
class HomeController extends Controller{
    public function home(): void{
        $this->render('home', [
            'title'   => 'Accueil',
            'message' => 'Bienvenue sur mon application',
        ]);
    }

    public function signin(): void{

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
                echo 'MOT DE PASSE OU EMAIL INCORRECTE';
                return;
            }
        }else{            
            $this->render('signin', [
                'title'   => 'Accueil',
                'message' => 'Bienvenue sur mon application',
            ]);
        }
    }

    public function signup(): void{

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
                    $this->render('signin', [
                        'title'   => 'Accueil',
                    ]);

                    return;
                }
                throw $e;
            }

            $this->render('signin', [
                'title'   => 'Accueil',
                'message' => 'Bienvenue sur mon application',
            ]);
            
            return;

        }

        $this->render('signup', [
            'title'   => 'Accueil',
            'message' => 'Bienvenue sur mon application',
        ]);
    }
}