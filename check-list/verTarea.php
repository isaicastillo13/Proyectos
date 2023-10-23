<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Tarea</title>
</head>
<body>
<?php
    require_once('class/tareas.php');
    $id_tarea = $_GET['id'];

    $obj_tareas = new tareas();
    $tareas = $obj_tareas->listarTareaFiltro($id_tarea);

    $nfilas = count($tareas);

    if($nfilas > 0){

        print( "<form class= action=''>");

            foreach($tareas as $resultado){

                    print(
                       
                        "<label for='id-tarea'>ID:</label>".
                        "<input class='inputs-form' type='text' id= 'id-tarea' disabled value=".$resultado['id_tarea'].">".
                        
                        "<label for='titulo-tarea'>Tarea:</label>".
                        "<input class='inputs-form' type='text' id= 'titulo-tarea' disabled value=".$resultado['titulo'].">".
                        
                        "<label for='id-tarea'>Descripcion:</label>".
                        "<textarea name='descripcion' id='' cols='30' rows='10' disabled required>".$resultado['descripcion']."</textarea>".
                        
                        "<label for='estados'>Estado</label>".
                        "<select class='inputs-form' id='estados' name='estados'>".
                        "<option value='Completada'>Completada</option>".
                        "<option value='Pendiente'>Pendiente</option>".
                        "<option value='En progreso'>En progreso</option>".
                        "<option value=".$resultado['estado']." selected disabled>".$resultado['estado']."</option>".
                        "</select>".
                        
                        "<label for='id-tarea'>Fecha:</label>".
                        "<input class='inputs-form' type='date' id= 'id-tarea' disabled value=".$resultado['fecha'].">".
                        
                        "<label for='id-tarea'>Responsable:</label>".
                        "<input class='inputs-form' type='text' id= 'id-tarea' disabled value=".$resultado['responsable'].">".
                        
                        "<label for='id-tarea'>Tipo:</label>".
                        "<input class='inputs-form' type='text' id= 'id-tarea' disabled value=".$resultado['tipo'].">"  
                    );
                    
            }
        }else if($nfilas === 0){
            print("<p>No hay tareas disponibles</p>");  
        }
        echo "<div class = botones-form>";
        echo "<input type='button' id= 'btn-editar'  name='' value='Editar'>";
        echo "<input type='button' id= 'btn-eliminar'  name='eliminarTarea' value='Eliminar'>";

        echo "</div>";

        print("</form>");

        if(array_key_exists('btn-actualizarTarea',$_POST)){
            $obj_Agregartarea = new tareas();
            $tarea = $obj_Agregartarea->agregarTarea($_REQUEST['tarea'],$_REQUEST['descripcion'],$_REQUEST['estados'],$_REQUEST['fecha'],'no',$_REQUEST['responsable'],$_REQUEST['tipo']);

            header("Location: index.php");
            exit;
        }



?>


</body>
</html>
<script src="script.js"></script>

