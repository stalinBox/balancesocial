<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>indicador/selectIndicadorCuantitativo";
	}

	function limpiar() {
		var t = document.getElementById("form1").getElementsByTagName("input");
//var t = document.getElementById("TAB").getElementsByTagName("input");
for (var i=0; i<t.length; i++) {
	if (t[i].type == "text") {    
		t[i].value = "";
	}
}
window.location="<?php echo base_url()?>indicadorEmpresa/nuevoIndicadorCualitativo";
}
</script>

	<h3 class="page-header" align="center"><span class="glyphicon glyphicon-th-list"></span> <?php echo $titulo; ?></h3>
	<div id="TAB">
		<div class="error"> 
			<center>
				<?php messages_flash('danger',validation_errors(),'Errores del formulario', true); ?>
			</center>
		</div>
		<form action="<?php echo base_url()?>indicador/guardarIndicadorCuantitativo" id="form1" method="POST">
			<table width="100%" border="2" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$indicadorCuantitativo[0]->IdIndicador; ?>">

				<tr>
						<th class="izquierda">Nombre: </th>
						<td><input class="formulario1" type="text" name="txtNombre" placeholder="Ingresar datos" value="<?php echo set_value('txtNombre',@$indicadorCuantitativo[0]->Nombre); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Criterio: </th>						
						<td>
							<textarea class="formulario1" name="txtFormula" rows="3" cols="42" readonly=""><?php echo @$indicadorCuantitativo[0]->CriterioIndicador;?> </textarea>
						</td>
					</tr>
				<tr>
						<th class="izquierda">Resultado: </th>						
						<td>
							<textarea class="formulario1" name="txtFormula" rows="3" cols="42" readonly=""><?php echo @$indicadorCuantitativo[0]->Resultado;?> </textarea>
						</td>
				</tr>
				<tr>
						<th class="izquierda">Dimensión: </th>
						<td><input class="formulario1" type="text" name="txtDimension" placeholder="Ingresar datos" value="<?php echo set_value('txtDimension',@$indicadorCuantitativo[0]->Dimension); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Sub-Dimensión: </th>
						<td><input class="formulario1" type="text" name="txtSubDimension" placeholder="Ingresar datos" value="<?php echo set_value('txtSubDimension',@$indicadorCuantitativo[0]->SubDimension); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Principio SEPS: </th>
						<td><input class="formulario1" type="text" name="txtPrincipiosSEPS" placeholder="Ingresar datos" value="<?php echo set_value('txtPrincipiosSEPS',@$indicadorCuantitativo[0]->PrincipiosSEPS); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Principios del Pacto Mundial: </th>
						<td><input class="formulario1" type="text" name="txtPrincipiosPactoMundial" placeholder="Ingresar datos" value="<?php echo set_value('txtPrincipiosPactoMundial',@$indicadorCuantitativo[0]->PrincipiosPactoMundial); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Grupo de Interés: </th>
						<td><input class="formulario1" type="text" name="txtGrupoInteres" placeholder="Ingresar datos" value="<?php echo set_value('txtGrupoInteres',@$indicadorCuantitativo[0]->GrupoInteres); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Herramienta: </th>
						<td><input class="formulario1" type="text" name="txtHerramienta" placeholder="Ingresar datos" value="<?php echo set_value('txtHerramienta',@$indicadorCuantitativo[0]->Herramienta); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Códigos GRI: </th>
						<td><input class="formulario1" type="text" name="txtCodigosGRI" placeholder="Ingresar datos" value="<?php echo set_value('txtCodigosGRI',@$indicadorCuantitativo[0]->CodigosGRI); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Códigos ISO: </th>
						<td><input class="formulario1" type="text" name="txtCodigosISO2600" placeholder="Ingresar datos" value="<?php echo set_value('txtCodigosISO2600',@$indicadorCuantitativo[0]->CodigosISO2600); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Área: </th>
						<td><input class="formulario1" type="text" name="txtArea" placeholder="Ingresar datos" value="<?php echo set_value('txtArea',@$indicadorCuantitativo[0]->Area); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Módulo: </th>
						<td><input class="formulario1" type="text" name="txtModulo" placeholder="Ingresar datos" value="<?php echo set_value('txtModulo',@$indicadorCuantitativo[0]->Modulo); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Sub-Módulo: </th>
						<td><input class="formulario1" type="text" name="txtSubModulo" placeholder="Ingresar datos" value="<?php echo set_value('txtSubModulo',@$indicadorCuantitativo[0]->SubModulo); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Tabla: </th>
						<td><input class="formulario1" type="text" name="txtTabla" placeholder="Ingresar datos" value="<?php echo set_value('txtTabla',@$indicadorCuantitativo[0]->Tabla); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Fórmula de Resultado: </th>
						<td>
							<textarea class="formulario1" name="txtFormula" rows="5" cols="42" readonly=""><?php echo @$indicadorCuantitativo[0]->FormulaResultado;?> </textarea>
						</td>
				</tr>
				
				<tr>
						<th class="izquierda">Meta: </th>
						<td><input class="formulario1" type="text" name="txtMeta" placeholder="Ingresar datos" value="<?php echo set_value('txtMeta',@$indicadorCuantitativo[0]->Meta); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Desde 0: </th>
						<td><input class="formulario1" type="text" name="txtDesde0" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde0',@$indicadorCuantitativo[0]->Desde0); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Hatsa 0: </th>
						<td><input class="formulario1" type="text" name="txtHasta0" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta0',@$indicadorCuantitativo[0]->Hasta0); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc0" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc0',@$indicadorCuantitativo[0]->Desc0); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Nota 0: </th>
						<td><input class="formulario1" type="text" name="txtNota0" placeholder="Ingresar datos" value="<?php echo set_value('txtNota0',@$indicadorCuantitativo[0]->Nota0); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Desde 1: </th>
						<td><input class="formulario1" type="text" name="txtDesde1" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde1',@$indicadorCuantitativo[0]->Desde1); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Hasta 1: </th>
						<td><input class="formulario1" type="text" name="txtHasta1" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta1',@$indicadorCuantitativo[0]->Hasta1); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc1" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc1',@$indicadorCuantitativo[0]->Desc1); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Nota 1: </th>
						<td><input class="formulario1" type="text" name="txtNota1" placeholder="Ingresar datos" value="<?php echo set_value('txtNota1',@$indicadorCuantitativo[0]->Nota1); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Desde 2: </th>
						<td><input class="formulario1" type="text" name="txtDesde2" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde2',@$indicadorCuantitativo[0]->Desde2); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Hasta 2: </th>
						<td><input class="formulario1" type="text" name="txtHasta2" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta2',@$indicadorCuantitativo[0]->Hasta2); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc2" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc2',@$indicadorCuantitativo[0]->Desc2); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Nota 2: </th>
						<td><input class="formulario1" type="text" name="txtNota2" placeholder="Ingresar datos" value="<?php echo set_value('txtNota2',@$indicadorCuantitativo[0]->Nota2); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Desde 3: </th>
						<td><input class="formulario1" type="text" name="txtDesde3" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde3',@$indicadorCuantitativo[0]->Desde3); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Hasta 3: </th>
						<td><input class="formulario1" type="text" name="txtHasta3" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta3',@$indicadorCuantitativo[0]->Hasta3); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc3" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc3',@$indicadorCuantitativo[0]->Desc3); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Nota 3: </th>
						<td><input class="formulario1" type="text" name="txtNota3" placeholder="Ingresar datos" value="<?php echo set_value('txtNota3',@$indicadorCuantitativo[0]->Nota3); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Desde 4: </th>
						<td><input class="formulario1" type="text" name="txtDesde4" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde4',@$indicadorCuantitativo[0]->Desde4); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Hasta 4: </th>
						<td><input class="formulario1" type="text" name="txtHasta4" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta4',@$indicadorCuantitativo[0]->Hasta4); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc4" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc4',@$indicadorCuantitativo[0]->Desc4); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Nota 4: </th>
						<td><input class="formulario1" type="text" name="txtNota4" placeholder="Ingresar datos" value="<?php echo set_value('txtNota4',@$indicadorCuantitativo[0]->Nota4); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Desde 5: </th>
						<td><input class="formulario1" type="text" name="txtDesde5" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde5',@$indicadorCuantitativo[0]->Desde5); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Hasta 5: </th>
						<td><input class="formulario1" type="text" name="txtHasta5" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta5',@$indicadorCuantitativo[0]->Hasta5); ?>" readonly="" ></td>
				</tr>
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc5" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc5',@$indicadorCuantitativo[0]->Desc5); ?>" readonly="" ></td>
				</tr>
				
				<tr>
						<th class="izquierda">Nota 5: </th>
						<td><input class="formulario1" type="text" name="txtNota5" placeholder="Ingresar datos" value="<?php echo set_value('txtNota5',@$indicadorCuantitativo[0]->Nota5); ?>" readonly="" ></td>
					</tr>
				<tr>
						<th class="izquierda">Fórmula de Calificación SQL: </th>
						<td>
							<textarea class="formulario1" name="txtFormula" rows="5" cols="42" readonly=""><?php echo @$indicadorCuantitativo[0]->FormulaCalificacion;?> </textarea>
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
					<td></td>
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