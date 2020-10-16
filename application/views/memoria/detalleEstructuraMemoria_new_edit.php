<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url()?>css/bootstrap-datepicker.css" > 

<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>memoria/detallesEstructuraDeMemoria";
	}
</script>

	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>memoria/guardarEstructuraMemoria" id="form1" method="POST">
			<table width="100%" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$detalleEstructuraDeMemoria[0]->IdEstructuraMemoria; ?>">


					<tr>
						<td class="izquierda">Introducción de la Memoria </td>
						<td>
						<textarea name="txtIntroduccionMemoria" rows="3" cols="55"><?php echo set_value('txtIntroduccionMemoria', @$detalleEstructuraDeMemoria[0]->IntroduccionMemoria);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Mensaje del Presidente </td>
						<td>
						<textarea name="txtMensajePresidente" rows="3" cols="55"><?php echo set_value('txtMensajePresidente', @$detalleEstructuraDeMemoria[0]->MensajePresidente);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Mensaje de la Gerencia </td>
						<td>
						<textarea name="txtMensajeGerencia" rows="3" cols="55"><?php echo set_value('txtMensajeGerencia', @$detalleEstructuraDeMemoria[0]->MensajeGerencia);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre Gobierno Cooperativo </td>
						<td>
						<textarea name="txtIntroGobierno" rows="3" cols="55"><?php echo set_value('txtIntroGobierno', @$detalleEstructuraDeMemoria[0]->IntroGobierno);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Representantes </td>
						<td>
						<textarea name="txtIntroGobiernoRepresentantes" rows="3" cols="55"><?php echo set_value('txtIntroGobiernoRepresentantes', @$detalleEstructuraDeMemoria[0]->IntroGobiernoRepresentantes);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre el Consejo de Administracion </td>
						<td>
						<textarea name="txtIntroGobiernoCosejoAdministracion" rows="3" cols="55"><?php echo set_value('txtIntroGobiernoCosejoAdministracion', @$detalleEstructuraDeMemoria[0]->IntroGobiernoCosejoAdministracion);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre el Consejo Vigilancia </td>
						<td>
						<textarea name="txtIntroGobiernoConsejoVigilancia" rows="3" cols="55"><?php echo set_value('txtIntroGobiernoConsejoVigilancia', @$detalleEstructuraDeMemoria[0]->IntroGobiernoConsejoVigilancia);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Consejos </td>
						<td>
						<textarea name="txtIntroGobiernoConsejos" rows="3" cols="55"><?php echo set_value('txtIntroGobiernoConsejos', @$detalleEstructuraDeMemoria[0]->IntroGobiernoConsejos);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Comites </td>
						<td>
						<textarea name="txtIntroGobiernoComites" rows="3" cols="55"><?php echo set_value('txtIntroGobiernoComites', @$detalleEstructuraDeMemoria[0]->IntroGobiernoComites);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Ejecutivos </td>
						<td>
						<textarea name="txtIntroGobiernoEjecutivos" rows="3" cols="55"><?php echo set_value('txtIntroGobiernoEjecutivos', @$detalleEstructuraDeMemoria[0]->IntroGobiernoEjecutivos);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre las Certificaciones </td>
						<td>
						<textarea name="txtIntroCertificaciones" rows="3" cols="55"><?php echo set_value('txtIntroCertificaciones', @$detalleEstructuraDeMemoria[0]->IntroCertificaciones);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre el Balance General </td>
						<td>
						<textarea name="txtIntroBalanceGeneral" rows="3" cols="55"><?php echo set_value('txtIntroBalanceGeneral', @$detalleEstructuraDeMemoria[0]->IntroBalanceGeneral);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre el Valor Económico Generado </td>
						<td>
						<textarea name="txtIntroValorEconomicoGenerado" rows="3" cols="55"><?php echo set_value('txtIntroValorEconomicoGenerado', @$detalleEstructuraDeMemoria[0]->IntroValorEconomicoGenerado);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre el Valor Económico Distribuido </td>
						<td>
						<textarea name="txtIntroValorEconomicoDistribuido" rows="3" cols="55"><?php echo set_value('txtIntroValorEconomicoDistribuido', @$detalleEstructuraDeMemoria[0]->IntroValorEconomicoDistribuido);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Creditos a los Socios </td>
						<td>
						<textarea name="txtIntroCreditosASocios" rows="3" cols="55"><?php echo set_value('txtIntroCreditosASocios', @$detalleEstructuraDeMemoria[0]->IntroCreditosASocios);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre las Compras y Contratos con Proveedores </td>
						<td>
						<textarea name="txtIntroContratosConProveedores" rows="3" cols="55"><?php echo set_value('txtIntroContratosConProveedores', @$detalleEstructuraDeMemoria[0]->IntroContratosConProveedores);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre la Satisfaccion al Cliente </td>
						<td>
						<textarea name="txtIntroSatisfaccionAlCliente" rows="3" cols="55"><?php echo set_value('txtIntroSatisfaccionAlCliente', @$detalleEstructuraDeMemoria[0]->IntroSatisfaccionAlCliente);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre las Quejas y Reclamos </td>
						<td>
						<textarea name="txtIntroQuejasYReclamos" rows="3" cols="55"><?php echo set_value('txtIntroQuejasYReclamos', @$detalleEstructuraDeMemoria[0]->IntroQuejasYReclamos);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre el Crecimiento Sustentable de los Socios </td>
						<td>
						<textarea name="txtIntroCrecimientoSustentableDeSociosEnCooperativa" rows="3" cols="55"><?php echo set_value('txtIntroCrecimientoSustentableDeSociosEnCooperativa', @$detalleEstructuraDeMemoria[0]->IntroCrecimientoSustentableDeSociosEnCooperativa);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Productos y Sevicios </td>
						<td>
						<textarea name="txtIntroProductosYSevicios" rows="3" cols="55"><?php echo set_value('txtIntroProductosYSevicios', @$detalleEstructuraDeMemoria[0]->IntroProductosYSevicios);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Productos </td>
						<td>
						<textarea name="txtIntroProductos" rows="3" cols="55"><?php echo set_value('txtIntroProductos', @$detalleEstructuraDeMemoria[0]->IntroProductos);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Sevicios </td>
						<td>
						<textarea name="txtIntroSevicios" rows="3" cols="55"><?php echo set_value('txtIntroSevicios', @$detalleEstructuraDeMemoria[0]->IntroSevicios);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre el Talento Humano </td>
						<td>
						<textarea name="txtIntroTalentoHumano" rows="3" cols="55"><?php echo set_value('txtIntroTalentoHumano', @$detalleEstructuraDeMemoria[0]->IntroTalentoHumano);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre la Edad de los Colaboradores </td>
						<td>
						<textarea name="txtIntroEdadTalentoHumano" rows="3" cols="55"><?php echo set_value('txtIntroEdadTalentoHumano', @$detalleEstructuraDeMemoria[0]->IntroEdadTalentoHumano);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Contratos de los Colaboradores </td>
						<td>
						<textarea name="txtIntroContratoTalentoHumano" rows="3" cols="55"><?php echo set_value('txtIntroContratoTalentoHumano', @$detalleEstructuraDeMemoria[0]->IntroContratoTalentoHumano);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre las Capacitaciones de los Colaboradores </td>
						<td>
						<textarea name="txtIntroCapacitaciones" rows="3" cols="55"><?php echo set_value('txtIntroCapacitaciones', @$detalleEstructuraDeMemoria[0]->IntroCapacitaciones);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre la Seguridad Ocupacional </td>
						<td>
						<textarea name="txtIntroSeguridadOcupacional" rows="3" cols="55"><?php echo set_value('txtIntroSeguridadOcupacional', @$detalleEstructuraDeMemoria[0]->IntroSeguridadOcupacional);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Programas de Salud Laboral </td>
						<td>
						<textarea name="txtIntroProgramasSaludLaboral" rows="3" cols="55"><?php echo set_value('txtIntroProgramasSaludLaboral', @$detalleEstructuraDeMemoria[0]->IntroProgramasSaludLaboral);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre los Aportes a la Comunidad </td>
						<td>
						<textarea name="txtIntroAportesComunidad" rows="3" cols="55"><?php echo set_value('txtIntroAportesComunidad', @$detalleEstructuraDeMemoria[0]->IntroAportesComunidad);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Introducción sobre el Manejo Respomsable de  la Energía Eléctrica </td>
						<td>
						<textarea name="txtIntroManejoRespomsableDeEnergiaElectrica" rows="3" cols="55"><?php echo set_value('txtIntroManejoRespomsableDeEnergiaElectrica', @$detalleEstructuraDeMemoria[0]->IntroManejoRespomsableDeEnergiaElectrica);?></textarea>
						</td>
					</tr>
					<tr>
						<td class="izquierda">Periodo de trabajo: </td>
						<td>

							<div class='input-group date' id='divPeriodo'>
                      		<input type='text' id="txtPeriodo" name="txtPeriodo" class="form-control" value="<?php echo set_value('txtPeriodo', @$detalleEstructuraDeMemoria[0]->Periodo); ?>" readonly/>
                      		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                      		</span>
                    		</div>
						</td>
					</tr>
					

				</tbody>
			</table>



			<table>
				<tr>
					<br>
				</tr>
				<tr>
					<td><input type="button" onclick="regresar()" name="" class="botones" value="Regresar"></td>
					<td></td>
					<td></td>   
					<td></td>   
					<td><input type="submit" name="submit" class="botones" value="Guardar"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td><td></td>
					<td></td>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
				</tr>
			</table>
		</form>
	</div>

   <script src="<?php echo base_url()?>js/jquery.min.js"></script>
   <script src="<?php echo base_url()?>js/calendario/bootstrap-datepicker.js"></script>

   <script type="text/javascript">
     $('#divPeriodo').datepicker({
          	format: "yyyy",
    		viewMode: "years", 
    		minViewMode: "years"
    });
   </script>