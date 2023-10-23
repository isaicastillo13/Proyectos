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

        public function agregarTarea($titulo,$descripcion,$estado,$fecha,$editado,$responsable,$tipo){
            $sql = "call sp_agregar_tarea('".$titulo."','".$descripcion."','".$estado."','".$fecha."','".$editado."','".$responsable."','".$tipo."')";

            $consulta = $this->_db->query($sql);
            //$resultado = $consulta->fetch_all(MYSQLI_ASSOC);
           
                $this->_db->close();
            
        }

        public function listarTareas(){

            $sql = "call sp_listar_tareas()";
            $consulta = $this->_db->query($sql);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
            //var_dump($resultado);

                return $resultado;
                $resultado->close();
                $this->_db->close();

        }
        public function listarTareaFiltro($id_tarea){

            $sql = "call sp_listar_tareas_filtro('".$id_tarea."')";
            $consulta = $this->_db->query($sql);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Fallo la consulta";
            }else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }
        public function eliminarTarea(){

            $sql = "call sp_listar_tareas_filtro('".$id_tarea."')";
            $consulta = $this->_db->query($sql);
            $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

            if(!$resultado){
                echo "Fallo la consulta";
            }else{
                return $resultado;
                $resultado->close();
                $this->_db->close();
            }
        }
    }

    
?>