        <div class="page-body">
            <div class="panel panel-default">
                    <div class="panel-heading">Galeria de Albumes de Fotos</div>
                    <div class="panel-body">
                        <div class="list-unstyled row clearfix">

                            <?php foreach ($dataset as $key => $value): ?>
                                <div class="col-sm-2 m-b-30" id="fila-<?=$value['id']?>">
                                    <!-- <a href="files/galeria_fotos/<?=$value['imagen']?>" data-lightbox="gallery" data-title="Demo Description">
                                        <img class="img-responsive" src="files/galeria_fotos/<?=$value['imagen']?>" alt="Lightbox Gallery Image">
                                    </a> -->
                                    <a href="dashboard/galeria_fotos/lista_foto/<?=$value['id']?>" >
                                        <img class="img-responsive" src="files/galeria_fotos/thumbs/<?=$value['imagen']?>" alt="<?=$value['imagen_title']?>">
                                    </a>
                                    <table align="center">
                                        <tr>
                                           <td><a href="dashboard/galeria_fotos/editar_album/<?=$value['id']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a></td>          
                                            <td><a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'galeria_fotos/delete_album');">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Borrar
                                                </a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            <?php endforeach;?>                           
                        </div>
                    </div>
            </div>
        </div>