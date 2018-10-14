<?php $class = $this->router->class; ?>
<?php $idSeccion = $this->uri->segment(4,0);?>
<?php //var_dump($class);exit();?>
<aside class="sidebar">
    <nav class="sidebar-nav">
        <ul class="metismenu">
            <li class="title">
                MAIN NAVIGATION
            </li>
            <!-- <li>
                <a href="dashboard">
                    <i class="material-icons">text_fields</i>
                    <span class="nav-label">Dashboard</span>
                </a>
                </li> -->
            <li>
                <a href="dashboard">
                <i class="material-icons">home</i>
                <span class="nav-label">Inicio</span>
                </a>
            </li>
            <li <?php echo ($class == 'banners' || ($class == 'secciones' && $idSeccion=='9' ))? 'class="active"':''; ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">panorama</i>
                <span class="nav-label">Página de Inicio</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/9">Texto Informativo</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                        <span>Banners</span>
                        </a>
                        <ul>
                            <li>
                                <a href="dashboard/banners/lista">Listado Banners</a>
                            </li>
                            <li>
                                <a href="dashboard/banners/nuevo">Nuevo Banner</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li <?php echo ($class == 'nosotros' || ($class == 'secciones' && $idSeccion=='2' ))? 'class="active"':''; ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">group</i>
                <span class="nav-label">Nosotros</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/2">Texto informativo</a>
                    </li>
                </ul>
            </li>
            <!-- <li <?php echo ($class == 'servicios' || ($class == 'secciones' && $idSeccion=='3' ))? 'class="active"':''; ?>>
                <a href="dashboard/servicios/listaCategoria" class="menu-toggle">
                    <i class="material-icons">local_shipping</i>
                        <span class="nav-label">Servicios</span>
                </a>
                <ul>
                 <li>
                  <a href="dashboard/secciones/editar/3">
                <span>Texto Informativo</span>
                </a>
                </li>
                    <li>
                <a href="dashboard/servicios/listaCategoria">Categorías Servicios</a>
                </li>
                <li>
                <a href="dashboard/servicios/nuevaCategoria">Nueva Categoría</a>
                </li>
                    <li>
                        <a href="dashboard/servicios/nuevoServicio">Nuevo Servicio</a>
                    </li>
                    <li>
                        <a href="dashboard/servicios/consultaServicio">Consultas de Servicio</a>
                    </li>
                
                </ul>
                </li> -->
            <li <?php echo ($class == 'solo_servicios' || ($class == 'secciones' && $idSeccion=='10' ))? 'class="active"':''; ?>>
                <a href="dashboard/solo_servicios/listaServicio" class="menu-toggle">
                <i class="material-icons">local_shipping</i>
                <span class="nav-label">Servicios</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/10">
                        <span>Texto Informativo</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard/solo_servicios/listaServicio">Listado Servicios</a>
                    </li>
                    <li>
                        <a href="dashboard/solo_servicios/nuevoServicio">Nuevo Servicio</a>
                    </li>
                    <li>
                        <a href="dashboard/solo_servicios/consultaServicio">Consultas de Servicio</a>
                    </li>
                </ul>
            </li>
            <!--  <li <?php echo ($class == 'solo_servicios_galerias' || ($class == 'secciones' && $idSeccion=='10' ))? 'class="active"':''; ?>>
                <a href="dashboard/solo_servicios_galerias/listaServicio" class="menu-toggle">
                    <i class="material-icons">local_shipping</i>
                        <span class="nav-label">Solo Servicios Galeria</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/10">
                            <span>Texto Informativo</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard/solo_servicios_galerias/listaServicio">Listado Servicios</a>
                    </li>
                    <li>
                        <a href="dashboard/solo_servicios_galerias/nuevoServicio">Nuevo Servicio</a>
                    </li>
                    <li>
                        <a href="dashboard/solo_servicios_galerias/consultaServicio">Consultas de Servicio</a>
                    </li>
                </ul>
                </li> -->
            <li <?php echo ($class == 'articulos' || ($class == 'secciones' && $idSeccion=='4' ))? 'class="active"':''; ?>>
                <a href="dashboard/articulos/lista" class="menu-toggle">
                <i class="material-icons">rss_feed</i>
                <span class="nav-label">Artículos</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/4">Texto Informativo</a>
                    </li>
                    <li>
                        <a href="dashboard/articulos/lista">Listado Artículos</a>
                    </li>
                    <li>
                        <a href="dashboard/articulos/nuevo">Nuevo Artículo</a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($class == 'categorias' || $class == 'productos' || ($class == 'secciones' && $idSeccion=='5' ))? 'class="active"':''; ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">local_grocery_store</i>
                <span class="nav-label">Productos</span>
                </a>
                <ul>
                    <!-- <li>
                        <a href="dashboard/secciones/editar/16">Texto Informativo Merchandising</a>
                        </li>
                                      <li>
                                          <a href="dashboard/secciones/editar/17">Texto Informativo Textiles</a>
                                      </li> -->
                    <li>
                        <a href="dashboard/categorias/lista">Listar Categorías</a>
                    </li>
                    <li>
                        <a href="dashboard/categorias/nuevo">Nueva Categoría</a>
                    </li>
                    <li>
                        <a href="dashboard/productos/nuevo">Nuevo Producto</a>
                    </li>
                    <li>
                        <a href="dashboard/atributos/lista">Atributo Color</a>
                    </li>
                    <!-- <li>
                        <a href="dashboard/atributos/nuevo">Nuevo atributo</a>
                        </li> -->
                    <!-- <li>
                        <a href="dashboard/productos/consulta_producto">Consultas de Producto</a>
                        </li> -->
                </ul>
            </li>
            <!-- <li <?php echo ($class == 'prg_frecuentes' || ($class == 'secciones' && $idSeccion=='6'))? 'class="active"':''; ?>>
                <a href="dashboard/prg_frecuentes/lista" class="menu-toggle">
                    <i class="material-icons">help</i>
                        <span class="nav-label">Preguntas frecuentes</span>
                </a>
                <ul>
                    <li>
                <a href="dashboard/secciones/editar/6">Texto Informativo</a>
                </li>
                    <li>
                        <a href="dashboard/prg_frecuentes/lista">Listado Preguntas</a>
                    </li>
                    <li>
                        <a href="dashboard/prg_frecuentes/nuevo">Nueva Pregunta</a>
                    </li>
                </ul>
                </li> -->
            <!--  <li <?php echo ($class == 'proyectos' || ($class == 'secciones' && $idSeccion=='14'))? 'class="active"':''; ?>>
                <a href="dashboard/proyectos/listaProyecto" class="menu-toggle">
                    <i class="material-icons">location_city</i>
                        <span class="nav-label">Proyectos</span>
                </a>
                <ul>
                    <li>
                <a href="dashboard/secciones/editar/14">Texto Informativo</a>
                </li>
                    <li>
                        <a href="dashboard/proyectos/listaProyecto">Listado Proyectos</a>
                    </li>
                    <li>
                        <a href="dashboard/proyectos/nuevoProyecto">Nuevo Proyecto</a>
                    </li>
                    <li>
                        <a href="dashboard/proyectos/nuevoTrabajo">Nuevo Trabajo</a>
                    </li>
                    <li>
                        <a href="dashboard/proyectos/nuevaFoto">Nueva Foto</a>
                    </li>
                </ul>
                </li> -->
            <!-- <li <?php echo ($class == 'testimonios' || ($class == 'secciones' && $idSeccion=='8'))? 'class="active"':''; ?>>
                <a href="dashboard/testimonios/lista" class="menu-toggle">
                    <i class="material-icons">account_circle</i>
                        <span class="nav-label">Testimonios</span>
                </a>
                <ul>
                    <li>
                <a href="dashboard/secciones/editar/8">Texto Informativo</a>
                </li>
                    <li>
                        <a href="dashboard/testimonios/lista">Listado testimonios</a>
                    </li>
                    <li>
                        <a href="dashboard/testimonios/nuevo">Nuevo testimonio</a>
                    </li>
                </ul>
                </li> -->
            <li <?php echo ($class == 'mensajes' || ($class == 'secciones' && $idSeccion=='7') || $class =='mapa')? 'class="active"':''; ?>>
                <a href="dashboard/mensajes/lista" class="menu-toggle">
                <i class="material-icons">email</i>
                <span class="nav-label">Contáctenos</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/7">Texto Informativo</a>
                    </li>
                    <li>
                        <a href="dashboard/mensajes/lista">Mensajes Recibidos</a>
                    </li>
                    <li>
                        <a href="dashboard/mapa/editar/2">Ubicacion en el Mapa</a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($class == 'galeria_fotos' || ($class == 'secciones' && $idSeccion=='11') || $class == 'galeria_solo_fotos' || ($class == 'secciones' && $idSeccion=='11'))? 'class="active"':''; ?>>
                <a href="dashboard/galeria_fotos/lista_album" class="menu-toggle">
                    <i class="material-icons">photo_library</i>
                        <span class="nav-label">Regalos Personalizados</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/11">Texto Informativo</a>
                    </li>
                    <li>
                        <a href="dashboard/galeria_fotos/lista_album">Listado Fotos</a>
                    </li>
                    <li>
                        <a href="dashboard/galeria_solo_fotos/listaFoto">Listado Banner</a>
                    </li>
                    <li>
                        <a href="dashboard/galeria_solo_fotos/nuevaFoto">Nuevo Banner</a>
                    </li> 
                    <!-- <li>
                        <a href="dashboard/galeria_fotos/nuevo_album">Nuevo Álbum</a>
                    </li>  -->               
                    <li>
                        <a href="dashboard/galeria_fotos/nueva_foto">Nueva Foto</a>
                    </li>                   
                </ul>
            </li>
            <!-- <li <?php echo ($class == 'galeria_solo_fotos' || ($class == 'secciones' && $idSeccion=='11'))? 'class="active"':''; ?>>
                <a href="dashboard/galeria_solo_fotos/listaFoto" class="menu-toggle">
                    <i class="material-icons">photo_library</i>
                        <span class="nav-label">Galería Solo Fotos</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/11">Texto Informativo</a>
                    </li>
                    <li>
                        <a href="dashboard/galeria_solo_fotos/listaFoto">Listado Fotos</a>
                    </li>          
                    <li>
                        <a href="dashboard/galeria_solo_fotos/nuevaFoto">Nueva Foto</a>
                    </li>                   
                </ul>
                </li> -->
            <!--  <li <?php echo ($class == 'galeria_videos' || ($class == 'secciones' && $idSeccion=='12'))? 'class="active"':''; ?>>
                <a href="dashboard/galeria_videos/lista" class="menu-toggle">
                    <i class="material-icons">movie_filter</i>
                        <span class="nav-label">Galería Videos</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/12">Texto Informativo</a>
                    </li>
                    <li>
                        <a href="dashboard/galeria_videos/lista_album">Listado Álbumes</a>
                    </li>
                    <li>
                        <a href="dashboard/galeria_videos/nuevo_album">Nuevo Álbum</a>
                    </li>
                    <li>
                        <a href="dashboard/galeria_videos/nuevo_video">Nuevo Video</a>
                    </li>                
                </ul>
                </li> -->
            <li <?php echo ($class == 'clientes')? 'class="active"':''; ?>>
                <a href="dashboard/clientes/lista" class="menu-toggle">
                <i class="material-icons">people_outline</i>
                <span class="nav-label">Clientes Registrados</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/clientes/lista">Listado Clientes</a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($class == 'clientes_web' || ($class == 'secciones' && $idSeccion=='13'))? 'class="active"':''; ?>>
                <a href="dashboard/clientes_web/lista" class="menu-toggle">
                <i class="material-icons">people_outline</i>
                <span class="nav-label">Clientes</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/secciones/editar/13">Texto Informativo</a>
                    </li>
                    <li>
                        <a href="dashboard/clientes_web/lista">Listado Clientes</a>
                    </li>
                    <li>
                        <a href="dashboard/clientes_web/nuevo">Nuevo Cliente</a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($class == 'configuraciones')? 'class="active"':''; ?>>
                <a href="dashboard/configuraciones/lista" class="menu-toggle">
                <i class="material-icons">build</i>
                <span class="nav-label">Configuraciones</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/configuraciones/lista">Parámetros de Configuración</a>
                    </li>
                </ul>
            </li>
            <li <?php echo ($class == 'cotizaciones')? 'class="active"':''; ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                <i class="material-icons">monetization_on</i>
                <span class="nav-label">Cotización</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/cotizaciones/lista">Listar cotizaciones</a>
                    </li>
                </ul>
            </li>
            <!-- <li <?php echo ($class == 'pedidos')? 'class="active"':''; ?>>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">shopping_cart</i>
                        <span class="nav-label">Pedidos</span>
                </a>
                <ul>
                    <li>
                        <a href="dashboard/pedidos/lista">Listar pedidos</a>
                    </li>    
                </ul>
                </li> -->
            <li class="title">
                &nbsp;
            </li>
        </ul>
    </nav>
</aside>