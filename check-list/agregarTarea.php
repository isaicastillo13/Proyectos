<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Tareas</title>
    <link rel="stylesheet" href="/build/css/app.css">

</head>
<body>
    <form class="form-agregarTarea" name="agregarTarea" action="http://localhost:3000/agregarTarea.php" method="post">

        <h1>Agregar tarea</h1>

        <label for="">Tarea</label>
        <input type="text" name="tarea" required>

        <label for="">Descripcion</label>
        <textarea name="descripcion" id="" cols="30" rows="10" required></textarea>

        <label for="estados">Estado</label>
        <select id="estados" name="estados" required>
            <option value="Completada">Completada</option>
            <option value="Pendiente">Pendiente</option>
            <option value="En progreso">En progreso</option>
            <option value="" selected disabled>--Seleccionar--</option>
        </select>

        <label for="">Fecha</label>
        <input type="date" name="fecha" required>

        <label for="">Responsable</label>
        <input type="text" name="responsable" required>

        <label for="">Tipo</label>
        <input type="text" name="tipo" required>
        
        <div class= btn-form>
    
        <input name="btn-agregarTarea" id="btn-agregarTarea" type="submit" value="Agregar">        
        <a href="index.php"><input id="btn-cancelar" type="button" value="Cancelar"></a>

        </div>
    
    </form>
    <?php
        require_once('class/tareas.php');
        if(array_key_exists('btn-agregarTarea',$_POST)){
            $obj_Agregartarea = new tareas();
            $tarea = $obj_Agregartarea->agregarTarea(
                $_REQUEST['tarea'],
                $_REQUEST['descripcion'],
                $_REQUEST['estados'],
                $_REQUEST['fecha'],
                'no',
                $_REQUEST['responsable'],
                $_REQUEST['tipo']);

            header("Location: index.php");
            exit;
        }
    ?>
</body>
</html>