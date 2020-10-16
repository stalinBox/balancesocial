<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sistema Web RSE</title>
  </head>


<body>

  <div id="contenedorpdf">
    <div id="cabecerapdf">
      <table width="100%"><tr>
        <td width="80%" style="color:#000000; ">
          <span style="font-weight: bold; font-size: 14pt;"><?php echo @$usuario ?></span><br/>
          Dirección: <?php echo @$usuario ?><br />
          <span style="font-family:dejavusanscondensed;">&#9742;</span> <?php @$usuario ?><br/>    
          Creado por: <br />
        </td>
        <td width="20%" style="text-align: right;">
          
        </td>
      </tr>
    </table>
  </div>

  <div id="tablapdf">
    <div id="tablaceldaspdf">
      <table border="1" cellspacing="0px" width="100%" class="tablclpelpdf">
        <thead>        
          <tr class="horizontalcabpdf">
           <th >Logro</th>
           <th >Obtenido</th>     
           <th >Descripción</th>     
         </tr>
       </thead>
       <tbody >
          <tr class="horizontalpdfcuerpo1">
            <td scope="col" >prueba</td>
            <td scope="col" >prueba</td>
            <td scope="col" >prueba</td>
          </tr>
          
      </tbody>
    </table>
  </div>
</div> 
</div>
</body>
</html>