<?php
require_once('conectar.php');

class tareas extends conectarDB{
    protected $id_tarea;
    protected $titulo;
    protected $descripcion;
    protected $estado;
    protected $fecha;
    protected $editado;
    protected $responsable;
    protected $tipo;

    public function __construct(){
        parent::__construct();
    }

    public function agregarTarea($titulo, $descripcion, $estado, $fecha, $editado, $responsable, $tipo){
        $sql = "call sp_agregar_tarea('".$titulo."','".$descripcion."','".$estado."','".$fecha."','".$editado."','".$responsable."','".$tipo."')";

        $consulta = $this->_db->query($sql);
        $this->_db->close();
    }

    public function listarTareas(){
        $sql = "call sp_listar_tareas()";
        $consulta = $this->_db->query($sql);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        // Cierra la consulta y la conexión después de obtener los resultados
        $consulta->close();
        $this->_db->close();

        return $resultado;
    }

    public function listarTareaFiltro($id_tarea){
        $sql = "call sp_listar_tareas_filtro('".$id_tarea."')";
        $consulta = $this->_db->query($sql);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        // Cierra la consulta y la conexión después de obtener los resultados
        $consulta->close();
        $this->_db->close();

        if(!$resultado){
            echo "Fallo la consulta";
        } else {
            return $resultado;
        }
    }

    public function actTarea(int $id_tarea, $titulo, $descripcion, $estado, string $fecha, $responsable, $tipo){
        $sql = "call sp_actualizar_datos_por_id(
            '".$id_tarea."',
            '".$titulo."',
            '".$descripcion."',
            '".$estado."',
            '".$fecha."',
            '".$responsable."',
            '".$tipo."')";

        $consulta = $this->_db->query($sql);
        $this->_db->close();
    }

    public function eliminarTarea($id_tarea) {
        $sql = "call sp_eliminar_tarea('" . $id_tarea . "')";
        $consulta = $this->_db->query($sql);
    
        $consulta = $this->_db->query($sql);
        $this->_db->close();
    }    
}
?>
