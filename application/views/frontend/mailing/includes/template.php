<?php
// var_dump('<pre>',$body);exit();
$this->load->view("frontend/mailing/includes/header");
$this->load->view("frontend/mailing/".$body);
$this->load->view("frontend/mailing/includes/footer");
?>