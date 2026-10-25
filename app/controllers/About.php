<?php
class About extends Controller {
    public function index($name = 'que?', $bum = 'qui?'): void {
        $data['name'] = $name;
        $data['bum'] = $bum;
        $data['title'] = 'Amongsus';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page(): void {
        $data['title'] = 'Page of something, havent think abt it yet';
        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}