<form id="subir" name="subir" action="<?php echo base_url()?>principal/loadBalance" method="POST" enctype="multipart/form-data">
        <table border="1" >
		<tr>
			<td>
				Archivo
				<input type="file" id="archivo" name="archivo"/>
				
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" value="Importar" />
			</td>
		</tr>
        </table>
        </form> 