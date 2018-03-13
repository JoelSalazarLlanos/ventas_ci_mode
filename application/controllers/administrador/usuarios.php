<?php

class Usuarios extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model("Usuarios_model");
  }

  public function index(){
    $data = array(
      'usuarios' => $this->Usuarios_model->getUsuarios(),
    );
    $this->load->view("layouts/header");
    $this->load->view("layouts/aside");
    $this->load->view("admin/usuarios/list", $data);
    $this->load->view("layouts/footer");
  }

  public function add(){
    $data = array(
      'roles' => $this->Usuarios_model->getRoles(),
    );
    $this->load->view("layouts/header");
    $this->load->view("layouts/aside");
    $this->load->view("admin/usuarios/add", $data);
    $this->load->view("layouts/footer");
  }

  public function store(){
    $nombres = $this->input->post("nombres");
    $apellidos = $this->input->post("apellidos");
    $telefono = $this->input->post("telefono");
    $email = $this->input->post("email");
    $username = $this->input->post("username");
    $password = sha1("$_POST[password]");
    $tipousuario = $this->input->post("tipousuario");


    $this->form_validation->set_rules("nommbre","Nombre","required");
    $this->form_validation->set_rules("apellidos","apellidos","required");
    $this->form_validation->set_rules("telefono","telefono","required");
    $this->form_validation->set_rules("email","email","required|");
    $this->form_validation->set_rules("username","username","required");
    $this->form_validation->set_rules("password","password","required");

    $data = array(
      'nombres' => $nombres,
      'apellidos' => $apellidos,
      'telefono' => $telefono,
      'email' => $email,
      'username' => $username,
      'password' => $password,
      'rol_id' => $tipousuario,
      'estado' => "1",
    );

    if($this->Usuarios_model->save($data)){
      redirect(base_url()."administrador/usuarios/index");
    }else{
      $this->load->set_flashdata("error", "no se pudo guardar la informacion");
      redirect(base_url()."administrador/usuarios/add");
    }
  }

  public function view($id){
  		$data  = array(
  			'usuario' => $this->Usuarios_model->getUsuario($id),
  		);
  		$this->load->view("admin/usuarios/view",$data);
  }


  public function edit($id){
    $data = array(
      'usuario' => $this->Usuarios_model->getUsuario($id),
      'roles'=> $this->Usuarios_model->getRoles(),
    );
    $this->load->view("layouts/header");
    $this->load->view("layouts/aside");
    $this->load->view("admin/usuarios/edit", $data);
    $this->load->view("layouts/footer");
  }

    public function update(){
      $id = $this->input->post("idusuario");

      $nombres = $this->input->post("nombres");
      $apellidos = $this->input->post("apellidos");
      $telefono = $this->input->post("telefono");
      $email = $this->input->post("email");
      $username = $this->input->post("username");
        //$password = sha1("$_POST[password]");
      $tipousuario = $this->input->post("tipousuario");


      $this->form_validation->set_rules("nommbre","Nombre","required");
      $this->form_validation->set_rules("apellidos","apellidos","required");
      $this->form_validation->set_rules("telefono","telefono","required");
      $this->form_validation->set_rules("email","email","required|");
      $this->form_validation->set_rules("username","username","required");
      $this->form_validation->set_rules("password","password","required");

      $data = array(
        'nombres' => $nombres,
        'apellidos' => $apellidos,
        'telefono' => $telefono,
        'email' => $email,
        'username' => $username,
        //'password' => $password,
        'rol_id' => $tipousuario,
      );

      if($this->Usuarios_model->update($id, $data)){
        redirect(base_url()."administrador/usuarios/");
      }else{
        $this->load->set_flashdata("error", "no se pudo guardar la informacion");
        redirect(base_url()."administrador/usuarios/edit/".$id);
      }
    }



    public function delete($id){
      $data = array(
        'estado' => "0",
      );
      $this->Usuarios_model->update($id, $data);
      echo "administrador/usuarios";

    }
}

 ?>
