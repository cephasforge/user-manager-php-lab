<?php
class HomeController extends Controller{
    public function home(): void{
        $this->render('home', [
            'title'   => 'Accueil',
            'message' => 'Bienvenue sur mon application',
        ]);
    }

    public function signin(): void{
        $this->render('signin', [
            'title'   => 'Accueil',
            'message' => 'Bienvenue sur mon application',
        ]);
    }

    public function signup(): void{
        $this->render('signup', [
            'title'   => 'Accueil',
            'message' => 'Bienvenue sur mon application',
        ]);
    }
}