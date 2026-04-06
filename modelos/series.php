<?php
require_once "../bd/bd.php";
class series
{
    private $bd;
    private $serie;

    public function __construct()
    {
        $this->bd = conectar::con();
    }
    public function insertarSerie($nombre, $descripcion, $foto)
    {
        $consulta = $this->bd->prepare("INSERT into series VALUES (null,?,?,?,'1')");
        $consulta->bind_param("sss", $nombre, $descripcion, $foto);
        $consulta->execute();
        $consulta->store_result();
        $consulta->fetch();
        $consulta->close();
        return $this->serie;
    }
    public function modificarSerie($nombre, $descripcion, $foto, $id)
    {
        $consulta = $this->bd->prepare("UPDATE series set nombre=?,descripcion=?,foto=? where id=? and activo='1'");
        $consulta->bind_param("sssi", $nombre, $descripcion, $foto, $id);
        $consulta->execute();
        $consulta->store_result();
        $consulta->close();
        return $this->serie;
    }
    public function desactivarSerie($id)
    {
        $consulta = $this->bd->prepare("UPDATE series set activo='0' where id=?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $consulta->store_result();
        $consulta->close();
        return $this->serie;
    }
    public function buscarSeriePorNombre($nombre)
    {
        $nombre = "%" . $nombre . "%";
        $consulta = $this->bd->prepare("SELECT nombre, descripcion, foto , id FROM series WHERE nombre LIKE ? AND activo = '1'");
        $consulta->bind_param("s", $nombre);
        $consulta->bind_result($nombreSerie, $descripcion, $foto,$id);
        echo $nombreSerie;
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows > 0) {
            $i = 0;
            while ($consulta->fetch()) {
                $this->serie[$i]['nombre'] = $nombreSerie;
                $this->serie[$i]['descripcion'] = $descripcion;
                $this->serie[$i]['foto'] = $foto;
                $this->serie[$i]['id'] = $id;
                $i++;
            }
            $consulta->close();
            return $this->serie;
        } else {
            $consulta->close();
            return -1;
        }
    }
    public function buscarSeriePorId($id)
    {
        $consulta = $this->bd->prepare("SELECT nombre,descripcion,foto from series where id=? and activo='1'");
        $consulta->bind_param("s", $id);
        $consulta->bind_result($nombreSerie, $descripcion, $foto);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows > 0) {
            $i = 0;
            while ($consulta->fetch()) {
                $this->serie[$i]['nombre'] = $nombreSerie;
                $this->serie[$i]['descripcion'] = $descripcion;
                $this->serie[$i]['foto'] = $foto;
                $i++;
            }
            $consulta->close();
            // print_r($this->serie);
            return $this->serie;
        } else {
            $consulta->close();
            return -1;
        }
    }
    public function listarSeries()
    {
        $consulta = $this->bd->query("SELECT * from series where activo='1'");
        if ($consulta->num_rows > 0) {
            $this->serie=$consulta->fetch_all(MYSQLI_ASSOC);
            $consulta->close();
            return $this->serie;
        }else{
            $consulta->close();
            return -1;
        }
    }

    
}
