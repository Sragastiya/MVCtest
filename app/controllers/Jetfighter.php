<?php
class Jetfighter extends Controller {
    public function index(): void{
        $data['title'] = 'Fighter Jets Lists';
        $data['active'] = 'jets';
        $data['jet'] = $this->model('Jet_model')->getALLjet();
        $this->view('templates/header', $data);
        $this->view('jets/index', $data);
        $this->view('templates/footer');
    }
}
