<?php
/**
 *
 */
class Ventas extends CI_Controller
{

  function __construct(){
    parent::__construct();
    $this->load->model("Ventas_model");
  }

  public function index(){
    $fechafin = $this->input->post("fechafin");
    $fechainicio = $this->input->post("fechainicio");

    if($this->input->post("buscar")){
      $ventas = $this->Ventas_model->getVentasbyDate($fechainicio, $fechafin);
    }else{
      $ventas = $this->Ventas_model->getVentas();
    }

    $data = array(
      "ventas" => $ventas,
      "fechainicio" => $fechainicio,
      "fechafin" => $fechafin,
    );
    $this->load->view("layouts/header");
    $this->load->view("layouts/aside");
    $this->load->view("admin/reportes/ventas", $data);
    $this->load->view("layouts/footer");
  }
}



 ?>
