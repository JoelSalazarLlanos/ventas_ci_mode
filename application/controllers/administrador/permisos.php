<?php
/**
 *
 */
class Permisos extends CI_Controller
{

  function __construct()
  {
   parent::__construct();
   $this->load->model("Permisos_model");
   $this->load->model("Usuarios_model");
  }
  public function index(){
    $data = array(
      'permisos' => $this->Permisos_model->getPermisos(),

    );
    $this->load->view("layouts/header");
    $this->load->view("layouts/aside");
    $this->load->view("admin/permisos/list",$data);
    $this->load->view("layouts/footer");

  }

  public function add(){
    $data = array(
      'roles' => $this->Usuarios_model->getRoles(),
      'menus' => $this->Permisos_model->getMenus(),
    );
    $this->load->view("layouts/header");
    $this->load->view("layouts/aside");
    $this->load->view("admin/permisos/add",$data);
    $this->load->view("layouts/footer");
  }


  public function store(){
    $menu = $this->input->post("menu");
    $rol = $this->input->post("rol");
    $insert = $this->input->post("insert");
    $read = $this->input->post("read");
    $update = $this->input->post("update");
    $delete = $this->input->post("delete");

    $data = array(
      "menu_id" => $menu,
      "rol_id" => $rol,
      "insert_" => $insert,
      "read_" => $read,
      "update_" => $update,
      "delete_" => $delete,

    );
    if($this->Permisos_model->save($data)){
      redirect(base_url()."administrador/permisos");

    }else{
      $this->session->set_flashdata("error","no se pudo guardar los datos");
      redirect(base_url()."administrador/permisos/add");
    }

  }

public function edit($id){
  $data = array(
    'roles' => $this->Usuarios_model->getRoles(),
    'menus' => $this->Permisos_model->getMenus(),
    'permiso' => $this->Permisos_model->getPermiso($id),
  );
  $this->load->view("layouts/header");
  $this->load->view("layouts/aside");
  $this->load->view("admin/permisos/edit",$data);
  $this->load->view("layouts/footer");
}

public function update(){
  $id = $this->input->post("idpermiso");

  $insert = $this->input->post("insert");
  $read = $this->input->post("read");
  $update = $this->input->post("update");
  $delete = $this->input->post("delete");

  $data = array(
    "insert_" => $insert,
    "read_" => $read,
    "update_" => $update,
    "delete_" => $delete,

  );
  if($this->Permisos_model->update($id, $data)){
    redirect(base_url()."administrador/permisos");

  }else{
    $this->session->set_flashdata("error","no se pudo guardar los datos");
    redirect(base_url()."administrador/permisos/edit/".$id);
  }
}

public function delete($id){
  $this->Permisos_model->delete($id);
  redirect(base_url()."administrador/permisos");
}

}
 ?>
