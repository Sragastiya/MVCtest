<?php
class JetFighter extends Controller {
    public function index(): void{
        $data['title'] = 'Fighter Jets';
        $this->view('templates/header', $data);
        $this->view('jets/index', $data);
        $this->view('templates/footer');
    }
}