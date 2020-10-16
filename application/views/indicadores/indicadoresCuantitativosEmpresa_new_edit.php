<script type="text/javascript">
	function regresar(){
		window.location="<?php echo base_url()?>indicadorEmpresa/indicadoresCuantitativosEmpresa";
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
		<form action="<?php echo base_url()?>indicadorEmpresa/guardarIndicadorCuantitativo" id="form1" method="POST">
			<table width="100%" border="2" cellspacing=8px" id="Tabla1">
				<tbody>
					<input type="hidden" name="accion" value="<?php echo $accion; ?>">
					<input type="hidden" name="id" value="<?php echo @$indicadorCualitativoEmpresa[0]->IdIndicadorEmpresa; ?>">
					<input type="hidden" name="txtIdIndicador" value="<?php echo @$indicadorCualitativoEmpresa[0]->IdIndicador; ?>">
				<tr>
						<th class="izquierda">Nombre: </th>
						<td><input class="formulario1" type="text" name="txtNombre" placeholder="Ingresar datos" value="<?php echo set_value('txtNombre',@$indicadorCualitativoEmpresa[0]->Nombre); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Criterio: </th>
						<td><input class="formulario1" type="text" name="txtCriterioIndicador" placeholder="Ingresar datos" value="<?php echo set_value('txtCriterioIndicador',@$indicadorCualitativoEmpresa[0]->CriterioIndicador); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Resultado: </th>
						<td><input class="formulario1" type="text" name="txtResultado" placeholder="Ingresar datos" value="<?php echo set_value('txtResultado',@$indicadorCualitativoEmpresa[0]->Resultado); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Dimensión: </th>
						<td><input class="formulario1" type="text" name="txtDimension" placeholder="Ingresar datos" value="<?php echo set_value('txtDimension',@$indicadorCualitativoEmpresa[0]->Dimension); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Sub-Dimensión: </th>
						<td><input class="formulario1" type="text" name="txtSubDimension" placeholder="Ingresar datos" value="<?php echo set_value('txtSubDimension',@$indicadorCualitativoEmpresa[0]->SubDimension); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Principio SEPS: </th>
						<td><input class="formulario1" type="text" name="txtPrincipiosSEPS" placeholder="Ingresar datos" value="<?php echo set_value('txtPrincipiosSEPS',@$indicadorCualitativoEmpresa[0]->PrincipiosSEPS); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Principios del Pacto Mundial: </th>
						<td><input class="formulario1" type="text" name="txtPrincipiosPactoMundial" placeholder="Ingresar datos" value="<?php echo set_value('txtPrincipiosPactoMundial',@$indicadorCualitativoEmpresa[0]->PrincipiosPactoMundial); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Grupo de Interés: </th>
						<td><input class="formulario1" type="text" name="txtGrupoInteres" placeholder="Ingresar datos" value="<?php echo set_value('txtGrupoInteres',@$indicadorCualitativoEmpresa[0]->GrupoInteres); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Herramienta: </th>
						<td><input class="formulario1" type="text" name="txtHerramienta" placeholder="Ingresar datos" value="<?php echo set_value('txtHerramienta',@$indicadorCualitativoEmpresa[0]->Herramienta); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Códigos GRI: </th>
						<td><input class="formulario1" type="text" name="txtCodigosGRI" placeholder="Ingresar datos" value="<?php echo set_value('txtCodigosGRI',@$indicadorCualitativoEmpresa[0]->CodigosGRI); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Códigos ISO: </th>
						<td><input class="formulario1" type="text" name="txtCodigosISO2600" placeholder="Ingresar datos" value="<?php echo set_value('txtCodigosISO2600',@$indicadorCualitativoEmpresa[0]->CodigosISO2600); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Área: </th>
						<td><input class="formulario1" type="text" name="txtArea" placeholder="Ingresar datos" value="<?php echo set_value('txtArea',@$indicadorCualitativoEmpresa[0]->Area); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Módulo: </th>
						<td><input class="formulario1" type="text" name="txtModulo" placeholder="Ingresar datos" value="<?php echo set_value('txtModulo',@$indicadorCualitativoEmpresa[0]->Modulo); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Sub-Módulo: </th>
						<td><input class="formulario1" type="text" name="txtSubModulo" placeholder="Ingresar datos" value="<?php echo set_value('txtSubModulo',@$indicadorCualitativoEmpresa[0]->SubModulo); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Tabla: </th>
						<td><input class="formulario1" type="text" name="txtTabla" placeholder="Ingresar datos" value="<?php echo set_value('txtTabla',@$indicadorCualitativoEmpresa[0]->Tabla); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Fórmula de Resultado: </th>
						<td><input class="formulario1" type="text" name="txtFormulaResultado" placeholder="Ingresar datos" value="<?php echo set_value('txtFormulaResultado',@$indicadorCualitativoEmpresa[0]->FormulaResultado); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Meta: </th>
						<td><input class="formulario1" type="text" name="txtMeta" placeholder="Ingresar datos" value="<?php echo set_value('txtMeta',@$indicadorCualitativoEmpresa[0]->Meta); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Desde 0: </th>
						<td><input class="formulario1" type="text" name="txtDesde0" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde0',@$indicadorCualitativoEmpresa[0]->Desde0); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Hatsa 0: </th>
						<td><input class="formulario1" type="text" name="txtHasta0" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta0',@$indicadorCualitativoEmpresa[0]->Hasta0); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc0" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc0',@$indicadorCualitativoEmpresa[0]->Desc0); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Nota 0: </th>
						<td><input class="formulario1" type="text" name="txtNota0" placeholder="Ingresar datos" value="<?php echo set_value('txtNota0',@$indicadorCualitativoEmpresa[0]->Nota0); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Desde 1: </th>
						<td><input class="formulario1" type="text" name="txtDesde1" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde1',@$indicadorCualitativoEmpresa[0]->Desde1); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Hasta 1: </th>
						<td><input class="formulario1" type="text" name="txtHasta1" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta1',@$indicadorCualitativoEmpresa[0]->Hasta1); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc1" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc1',@$indicadorCualitativoEmpresa[0]->Desc1); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Nota 1: </th>
						<td><input class="formulario1" type="text" name="txtNota1" placeholder="Ingresar datos" value="<?php echo set_value('txtNota1',@$indicadorCualitativoEmpresa[0]->Nota1); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Desde 2: </th>
						<td><input class="formulario1" type="text" name="txtDesde2" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde2',@$indicadorCualitativoEmpresa[0]->Desde2); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Hasta 2: </th>
						<td><input class="formulario1" type="text" name="txtHasta2" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta2',@$indicadorCualitativoEmpresa[0]->Hasta2); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc2" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc2',@$indicadorCualitativoEmpresa[0]->Desc2); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Nota 2: </th>
						<td><input class="formulario1" type="text" name="txtNota2" placeholder="Ingresar datos" value="<?php echo set_value('txtNota2',@$indicadorCualitativoEmpresa[0]->Nota2); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Desde 3: </th>
						<td><input class="formulario1" type="text" name="txtDesde3" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde3',@$indicadorCualitativoEmpresa[0]->Desde3); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Hasta 3: </th>
						<td><input class="formulario1" type="text" name="txtHasta3" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta3',@$indicadorCualitativoEmpresa[0]->Hasta3); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc3" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc3',@$indicadorCualitativoEmpresa[0]->Desc3); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Nota 3: </th>
						<td><input class="formulario1" type="text" name="txtNota3" placeholder="Ingresar datos" value="<?php echo set_value('txtNota3',@$indicadorCualitativoEmpresa[0]->Nota3); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Desde 4: </th>
						<td><input class="formulario1" type="text" name="txtDesde4" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde4',@$indicadorCualitativoEmpresa[0]->Desde4); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Hasta 4: </th>
						<td><input class="formulario1" type="text" name="txtHasta4" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta4',@$indicadorCualitativoEmpresa[0]->Hasta4); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc4" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc4',@$indicadorCualitativoEmpresa[0]->Desc4); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Nota 4: </th>
						<td><input class="formulario1" type="text" name="txtNota4" placeholder="Ingresar datos" value="<?php echo set_value('txtNota4',@$indicadorCualitativoEmpresa[0]->Nota4); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Desde 5: </th>
						<td><input class="formulario1" type="text" name="txtDesde5" placeholder="Ingresar datos" value="<?php echo set_value('txtDesde5',@$indicadorCualitativoEmpresa[0]->Desde5); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Hasta 5: </th>
						<td><input class="formulario1" type="text" name="txtHasta5" placeholder="Ingresar datos" value="<?php echo set_value('txtHasta5',@$indicadorCualitativoEmpresa[0]->Hasta5); ?>"></td>
				</tr>
				<tr>
						<th class="izquierda">Descripción: </th>
						<td><input class="formulario1" type="text" name="txtDesc5" placeholder="Ingresar datos" value="<?php echo set_value('txtDesc5',@$indicadorCualitativoEmpresa[0]->Desc5); ?>"></td>
				</tr>
				
				<tr>
						<th class="izquierda">Nota 5: </th>
						<td><input class="formulario1" type="text" name="txtNota5" placeholder="Ingresar datos" value="<?php echo set_value('txtNota5',@$indicadorCualitativoEmpresa[0]->Nota5); ?>"></td>
					</tr>
				<tr>
						<th class="izquierda">Fórmula de Calificación SQL: </th>
						<td><input class="formulario1" type="text" name="txtFormulaCalificacion" placeholder="Ingresar datos" value="<?php echo set_value('txtFormulaCalificacion',@$indicadorCualitativoEmpresa[0]->FormulaCalificacion); ?>"></td>
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