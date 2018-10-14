<?php //var_dump('<pre>',$data);exit();?>
<tr>
    <td align="center" valign="top" width="100%" style="background-color: #f7f7f7;" class="content-padding">
      <center>
        <table cellspacing="0" cellpadding="0" width="600" class="w320">
          <tr>
            <td class="header-lg">
              FORMULARIO DE PRODUCTO
            </td>
          </tr>
          <tr>
            <td class="free-text">
              Hemos recibido un mensaje desde el formulario de producto.
            </td>
          </tr>
          <tr>
            <td class="w320">
              <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td class="mini-container-left">
                    <table cellpadding="0" cellspacing="0" width="100%">
                      <tr>
                        <td class="mini-block-padding">
                          <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:separate !important;">
                            <tr>
                              <td class="mini-block">
                                <span class="header-sm">DATOS DEL REMITENTE</span><br />
                                Nombre  &nbsp; &nbsp; :&nbsp;&nbsp;<?= $data['nombre']?> <br />
                                Correo   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;<?= $data['correo']?> <br />
                                Producto   &nbsp;&nbsp; :&nbsp;&nbsp;<?= $producto['nombre']?> <br />
                                Consulta &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;<?= $data['mensaje']?><br />
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                 
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </center>
    </td>
  </tr>