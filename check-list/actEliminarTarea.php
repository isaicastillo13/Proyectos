<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tarea</title>
  <link rel="stylesheet" href="/build/css/app.css">

</head>
<body>

<?php 

require_once('class/tareas.php');

$id_tarea = (int)$_GET['id'];

$obj_tareas = new tareas();

$tareas = $obj_tareas->listarTareaFiltro($id_tarea);

$nfilas = count($tareas);

if(count($tareas) > 0){

  $resultado = $tareas[0]; // obtener el primer resultado

  $url = "http://localhost:3000/actEliminarTarea.php?id=" . $resultado['id_tarea'];
  
  print("<form class='form-actTarea' name='actTarea' action='$url' method='post'>");

    print("<h3 type='text' id='id_tarea' name='id_tarea' disabled>"."ID: ".$resultado['id_tarea']."</h3>");

    print("<label for='titulo-tarea'>Tarea:</label>");
    print("<input class='inputs-form' type='text' id='titulo-tarea' name='tarea' disabled value='".$resultado['titulo']."'>");

    print("<label for='descripcion'>Descripcion:</label>"); 
    print("<textarea class='inputs-form' name='descripcion' cols='30' rows='10' disabled required>".$resultado['descripcion']."</textarea>");

    print("<label for='estado'>Estado</label>");
    print("<select id='estado' name='estado'>");
      print("<option  class='inputs-form' value='Completada'>Completada</option>");
      print("<option  class='inputs-form' value='Pendiente'>Pendiente</option>");
      print("<option  class='inputs-form' value='En progreso'>En progreso</option>");
      print("<option  class='inputs-form' value='".$resultado['estado']."' selected disabled>".$resultado['estado']."</option>");
    print("</select>");

    print("<label for='fecha'>Fecha:</label>"); 
    print("<input class='inputs-form' type='date' id='fecha' name='fecha' disabled value='".$resultado['fecha']."'>");

    print("<label for='responsable'>Responsable:</label>");
    print("<input class='inputs-form' type='text' id='responsable' disabled name='responsable' value='".$resultado['responsable']."'>");

    print("<label for='tipo'>Tipo:</label>");
    print("<input class='inputs-form' type='text' id='tipo' disabled name='tipo' value='".$resultado['tipo']."'>");

  print("<div class = btn-form>");
    print("<input type='button' id='btn-editar' name='btn-editar' value='Editar'>");
    print("<a href='index.php'><input id='btn-cancelar' type='button' value='Cancelar'></a>");
    print("<input type='submit' id='btn-actTarea' name='btn-actualizarTarea' value='Actualizar'>");  
    print("<input type='submit' id='btn-eliminar' name='btn-eliminarTarea' value='Eliminar'>");
  print("</div>");
  
  print("</form>");
  
} else if($nfilas === 0){
  print("<p>No hay tareas disponibles</p>");
}

if(array_key_exists('btn-actualizarTarea',$_POST)){
  
  $obj_actTarea = new tareas();
  $tarea = $obj_actTarea->actTarea(
    
    $id_tarea, 
    $_REQUEST['tarea'],
    $_REQUEST['descripcion'], 
    $_REQUEST['estado'],
    $_REQUEST['fecha'],
    $_REQUEST['responsable'],
    $_REQUEST['tipo']);

  header("Location: index.php");
  exit;

}else if (array_key_exists('btn-eliminarTarea',$_POST)){
  
  $obj_eliminarTarea = new tareas();
  $tarea = $obj_eliminarTarea->eliminarTarea($id_tarea);

  header("Location: index.php");
  exit;

}

?>
<script src="/build/js/bundle.min.js"></script>

</body>
</html>

