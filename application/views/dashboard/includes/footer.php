        </section>
        <!-- Footer -->
        <footer>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-sm-6">
                        <div class="copyright">
                            <?= dataConfig('pie_pagina')?>
                        </div>
                    </div>
                    <div class="col-sm-6 align-right">
                        Desarrollado por <a href="#" title="MISTICA DIGITAL"><strong>MISTICA DIGITAL</strong></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- #END# Footer -->
    </div>

 
    <!-- JQuery UI Js -->
    <script src="assets/dashboard/adminbsb/js/jquery-ui.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="assets/dashboard/adminbsb/js/bootstrap.min.js"></script>

    <!-- Pace Loader Js --> <!-- indicador de progreso (progressbar) 
    <script src="assets/dashboard/adminbsb/js/pace.min.js"></script>-->

    <!-- Screenfull Js --> <!-- pantalla completa API -->
    <script src="assets/dashboard/adminbsb/js/screenfull.js"></script>

    <!-- Metis Menu Js --> <!--Menu responsivo-->
    <script src="assets/dashboard/adminbsb/js/metisMenu.min.js"></script>

    <!-- Jquery Slimscroll Js --><!--Scroll en div -->
    <script src="assets/dashboard/adminbsb/js/jquery.slimscroll.min.js"></script>

    <!-- Switchery Js --><!--botones con diseño de interruptor
    <script src="assets/dashboard/adminbsb/js/switchery.min.js"></script>-->
    
    <!-- Multiselect Js
    <script src="assets/dashboard/adminbsb/js/jquery.multi-select.js" /></script>

    <script src="assets/dashboard/adminbsb/js/bootstrap-select.min.js"></script> -->
    <!-- select CHOSEN Js -->
    <script src="assets/dashboard/adminbsb/plugins/chosen/chosen.jquery.js"></script>
    <!-- iCheck Js --><!--diseño check button-->
    <script src="assets/dashboard/adminbsb/js/icheck.min.js"></script>

    <!-- Jquery Validation Js -->
    <script src="assets/dashboard/adminbsb/js/jquery.validate.min.js"></script>
    <?php $uri_string = $this->router->uri->uri_string;
    $txt_ckeditor = array('nuevo','nueva','editar');
    foreach ($txt_ckeditor as $cke => $v_cke) {
        $bool_cke = strpos($uri_string, $v_cke);
        if ($bool_cke === false) {} else {break;}
    }?>
    <?php if ($bool_cke === false) {} else {echo '<!-- CKEditor Js --><script src="assets/dashboard/adminbsb/js/ckeditor/ckeditor.js"></script>';}?>
    
    <!-- Jquery Sparkline Js --><!--pequeños gráficos en línea
    <script src="assets/dashboard/adminbsb/js/jquery.sparkline.min.js"></script>-->

    <?php $txt_tables = array('lista','consulta');
    foreach ($txt_tables as $jtbl => $v_jtbl) {
        $bool_jtbl = strpos($uri_string, $v_jtbl);
        if ($bool_jtbl === false) {} else {break;}
    }?>
    <?php if ($bool_jtbl === false): ?>
    <?php else: ?>
    <!-- JQuery Datatables Js --><!-- Tabla responsiva -->
    <script src="assets/dashboard/adminbsb/js/DataTables/jquery.dataTables.min.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/dataTables.bootstrap.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/dataTables.responsive.min.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/dataTables.buttons.min.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/buttons.bootstrap.min.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/buttons.flash.min.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/jszip.min.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/pdfmake.min.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/vfs_fonts.js"></script><!--fuentes PDF-->
    <script src="assets/dashboard/adminbsb/js/DataTables/buttons.html5.min.js"></script>
    <script src="assets/dashboard/adminbsb/js/DataTables/buttons.print.min.js"></script>    
    <?php endif ?>
    

    <!-- Peity Js --><!-- Graficos
    <script src="assets/dashboard/adminbsb/js/jquery.peity.min.js"></script> -->

    <!-- Custom Js -->
    
    <script src="assets/dashboard/adminbsb/js/admin.js"></script>
    
    <!-- Mensaje de alertas con diseños -->
    <script src="assets/dashboard/adminbsb/plugins/sweetalert/sweetalert.min.js"></script>

    <script src="assets/dashboard/adminbsb/js/form-validation.js"></script>
    <script src="assets/dashboard/adminbsb/js/dashboard.js"></script>
    <script src="assets/dashboard/adminbsb/js/editors.js"></script>

    
   
<?php 
$seccion = $this->uri->segment(2,0);
if($seccion==='mapa'){
 ?>
    <!-- GMaps Js -->
    <script src="assets/dashboard/adminbsb/plugins/gmaps/gmaps.js"></script><!-- es el principal -->
   <script src="assets/dashboard/adminbsb/js/maps/google-maps.js"></script>
<?php } ?>

    <!-- Google Analytics Code -->
    <!--<script src="assets/dashboard/adminbsb/js/google-analytics.js"></script>-->

    <!-- Demo Purpose Only
    <script src="assets/dashboard/adminbsb/js/demo.js"></script> -->

</body>

</html>