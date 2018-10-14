   <?php $this->load->view("dashboard/includes/breadcrumbs", array()); ?>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1Q-s9Fd6P57e8GFEHOQhxlJE1UfAx-9g"></script>
   <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTuazTT4ftRrTOscHQYPabgJPLiBS9YXc" type="text/javascript"></script> -->
    <div class="page-body clearfix">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">MAPA DE UBICACION</div>
                    <?php $success = $this->session->flashdata('success');?>
                    <?php if(! empty($success)): ?>
                    <div class="alert alert-success">Los datos han sido grabados correctamente</div>
                    <?php endif; ?>
                    <div class="panel-body p-b-25">
                        <form class="form-horizontal" role="form" action="dashboard/mapa/editar/<?=( !empty($mapa['id']) ? $mapa['id'] : 0)?>" method="post" enctype="multipart/form-data" >
                            <fieldset>
                        
                                <legend>Ubicación en el mapa</legend> 
                                Mueva el globo rojo a cualquier punto del mapa ubicando el lugar que usted busca. 
                                <div class="control-group">
                                    <label class="control-label" for="typeahead"></label>
                                    <div class="controls">
                                        <div id="mapa" style="width: 100%; height: 400px; border: #000 solid 1px;"></div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <input type="submit" class="btn btn-primary" value="GRABAR">
                                    <input type="hidden" name="id" value="<?= $mapa['id'] ?>">
                                    <input type="hidden" name="latitud_centro" id="latitud_centro" value="<?= $mapa['latitud_centro'] ?>">
                                    <input type="hidden" name="longitud_centro" id="longitud_centro" value="<?= $mapa['longitud_centro'] ?>">
                                    <input type="hidden" name="latitud_punto" id="latitud_punto" value="<?= $mapa['latitud_punto'] ?>">
                                    <input type="hidden" name="longitud_punto" id="longitud_punto" value="<?= $mapa['longitud_punto'] ?>">                        
                                    <input type="hidden" name="zoom" id="zoom" value="<?= $mapa['zoom'] ?>">
                                    <input type="hidden" name="tipo_mapa" id="tipomapa" value="<?= $mapa['tipo_mapa'] ?>">
                                </div>

                            </fieldset>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript"> 
    initialize();
    function initialize() { 
            var latlng = new google.maps.LatLng(<?php echo $mapa['latitud_centro']; ?>, <?php echo $mapa['longitud_centro']; ?>); 
            var myOptions = { 
                    zoom: <?php echo $mapa['zoom']; ?>,
                    center: latlng,
                    scrollwheel: false,
                    <?php
                            switch( $mapa['tipo_mapa'])
                            {
                                    case "roadmap": 
                    ?>
                                    mapTypeId: google.maps.MapTypeId.ROADMAP
                    <?php
                                    break;

                                    case "hybrid":
                    ?>
                                    mapTypeId: google.maps.MapTypeId.HYBRID
                    <?php               
                                    break;
                            }
                    ?>
            };
            var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
            var myOffice = new google.maps.LatLng(<?php echo $mapa['latitud_punto']; ?>, <?php echo $mapa['longitud_punto']; ?>); 
            var marker = new google.maps.Marker({
                    position: myOffice,
                    draggable: true,
                    map: map
                            
            });
            var infowindow = new google.maps.InfoWindow({
                           
                    size: new google.maps.Size(250,120)
            });
            google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
            });
            google.maps.event.addListener(map, 'dragend', function() {
                    var center = map.getCenter();
                    var texto_globoes = center.toString();
                    //alert(texto_globoes);
                    var latitud = extrae_latitud(texto_globoes);
                    var longitud = extrae_longitud(texto_globoes);
                    $("#latitud_centro").val(latitud);
                    $("#longitud_centro").val(longitud);
            });

            google.maps.event.addListener(map, 'zoom_changed', function() {
                    var newzoom = map.getZoom();
                    //alert('el zoom cambio:'+newzoom);
                    //document.nueva.zoom.value = newzoom;
                    $("#zoom").val(newzoom);
            });

            google.maps.event.addListener(map, 'maptypeid_changed', function() {
                    var tipomapa = map.getMapTypeId();
                    //alert('tipo de mapa:'+tipomapa);
                    $("#tipomapa").val(tipomapa);
            });

            google.maps.event.addListener(marker, 'dragend', function() {
                    var posicion = marker.getPosition();
                    var ubicacion = posicion.toString();
                    //alert(ubicacion);
                    var latitud2 = extrae_latitud(ubicacion);
                    var longitud2 = extrae_longitud(ubicacion);
                    $("#latitud_punto").val(latitud2);
                    $("#longitud_punto").val(longitud2);
                    //document.nueva.latitud_punto.value = latitud2;
                    //document.nueva.longitud_punto.value = longitud2;
            });
    }
    </script>
            
    <script type="text/javascript">
        function extrae_latitud(texto_globoes) {
                var aux = texto_globoes.split(",");
                var aux2 = aux[0].split("(");
                var latitud = aux2[1];
                return latitud;
        }

        function extrae_longitud(texto_globoes) {
                var aux = texto_globoes.split(",");
                var aux3 = aux[1].split(")");
                var longitud = aux3[0];
                return longitud;
        }
    </script>