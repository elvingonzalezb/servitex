        <div class="page-body">
            <div class="panel panel-default">
                    <div class="panel-heading">Galeria de Videos</div>
                    <div class="panel-body">
                        <?=$this->session->flashdata('message');?>
                        <div class="list-unstyled row clearfix">
                            <?php foreach ($dataset as $key => $value): ?>
                                <div class="col-sm-2 m-b-30" id="fila-<?=$value['id']?>">
                                    <a href="files/galeria_videos/<?=$value['video']?>" data-lightbox="gallery" data-title="Demo Description">
                                        <img class="img-responsive" src="files/galeria_videos/thumbs/<?=$value['video']?>" alt="Lightbox Gallery Image">
                                    </a>
                                    <table align="center">
                                            <tr>
                                                <td><a href="dashboard/galeria_videos/editar_video/<?=$value['id']?>" class="btn btn-info"><i class="glyphicon glyphicon-edit icon-white"></i>Editar</a></td>
                                                <td>
                                                    <a class="btn btn-danger" href="javascript:eliminarItem(<?=$value['id']?>,'galeria_videos/delete_video');">
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