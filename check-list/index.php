<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-List</title>
    <link rel="stylesheet" href="/build/css/app.css">
    
</head>
<body>
    
    <h1>Tareas por Realizar</h1>
    <button id="btn-agregar_tarea" onclick="window.location.href = 'http://localhost:3000/agregarTarea.php'">Agregar nueva tarea</button>
    <?php
        require_once('class/tareas.php');

        $obj_tareas = new tareas();
        $tareas = $obj_tareas->listarTareas();

        //var_dump($tareas);

        $nfilas = count($tareas);

        if($nfilas > 0){

        print("<div class='lista-tareas' >");
        print("<ul>");
            foreach($tareas as $resultado){
                $url = "http://localhost:3000/actEliminarTarea.php?id=" . $resultado['id_tarea'];

                    print(
                        "<a href='$url'>".
                        "<li>".
                            "<h3 id= 'titulo-tarea'>".$resultado['titulo']." | "."</h3>".
                            "<h4 id= 'estado-tarea'>".$resultado['estado']."</h4>".
                            "<h4 id= 'estado-tarea'>".date("j/n/y",strtotime($resultado['fecha']))."</h4>".
                        "</li>".
                        "</a>");

            }
        }else if($nfilas === 0){
            print("<p>No hay tareas disponibles</p>");  
        }
        print("</ul>");
        print("</div>");
    ?>
    

</body>
</html>