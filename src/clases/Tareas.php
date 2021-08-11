<?php
require_once 'Conexion.php';
class Tareas extends Conexion
{

    private $id_tarea;
    private $titulo;
    private $fecha;
    private $hora;
    private $descripcion;
    private $tabla = "tareas";
    private $conn;

    public function __construct()
    {
        $this->conn = $this->conectar();
    }


    public function listarTareas()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->tabla");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function insertarTareas($titulo,  $fecha,  $hora, $descripcion)
    {
        $this->titulo = $titulo;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->descripcion = $descripcion;
        $sql = "INSERT INTO $this->tabla(titulo, fecha, hora, descripcion) VALUES(:titulo, :fecha, :hora, :descripcion)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":titulo", $this->titulo, PDO::PARAM_STR);
        $stmt->bindValue(":fecha", $this->fecha, PDO::PARAM_STR);
        $stmt->bindValue(":hora",  $this->hora, PDO::PARAM_STR);
        $stmt->bindValue(":descripcion",  $this->descripcion, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function obtenerid_Tareas($id)
    {
        $this->id_tarea = $id;
        $stmt = $this->conn->prepare("SELECT * FROM $this->tabla WHERE id_tarea = :id_tarea");
        $stmt->bindValue(":id_tarea", $this->id_tarea, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function eliminarTareas($id)
    {
        $this->id_tarea = $id;
        $stmt = $this->conn->prepare("DELETE FROM $this->tabla WHERE id_tarea = :id_tarea");
        $stmt->bindValue(":id_tarea", $this->id_tarea, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizarTareas($titulo,  $fecha,  $hora, $descripcion ,$id)
    {
        $this->titulo = $titulo;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->descripcion = $descripcion;
        $this->id_tarea = $id;
        $stmt = $this->conn->prepare("UPDATE $this->tabla SET titulo = :titulo, fecha = :fecha, hora = :hora, descripcion = :descripcion WHERE id_tarea = :id_tarea");
        $stmt->bindValue(":titulo", $this->titulo, PDO::PARAM_STR);
        $stmt->bindValue(":fecha", $this->fecha, PDO::PARAM_STR);
        $stmt->bindValue(":hora",  $this->hora, PDO::PARAM_STR);
        $stmt->bindValue(":descripcion",  $this->descripcion, PDO::PARAM_STR);
        $stmt->bindValue(":id_tarea", $this->id_tarea, PDO::PARAM_INT);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
