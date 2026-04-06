<?php

class plataformas
{
    private $bd;
    private $plataforma;

    public function __construct()
    {
        $this->bd = conectar::con();
    }
    public function insertarPlataforma($nombre, $logotipo)
    {
        $consulta = $this->bd->prepare("INSERT into plataformas VALUES (null,?,'1',?)");
        $consulta->bind_param("ss", $nombre, $logotipo);
        $consulta->execute();
        $consulta->close();
    }
    public function modificarplataforma($id, $nombre, $logotipo)
    {
        $consulta = $this->bd->prepare("UPDATE plataformas set nombre=?,logotipo=? where id=?");
        $consulta->bind_param("ssi", $nombre, $logotipo, $id);
        $consulta->execute();
        $consulta->close();
    }

    public function buscarPlataforma($nombre)
    {
        $nombre = "%" . $nombre . "%";
        $consulta = $this->bd->prepare("SELECT id, nombre, activo, logotipo FROM plataformas WHERE nombre LIKE ?");
        $consulta->bind_param("s", $nombre);
        $consulta->bind_result($id, $nombrePlataforma, $activo, $logo);
        $consulta->execute();
        $consulta->store_result();
    
        $resultados = [];
    
        if ($consulta->num_rows() > 0) {
            while ($consulta->fetch()) {
                $plataforma = [
                    "id" => $id,
                    "nombre" => $nombrePlataforma,
                    "activo" => $activo,
                    "logo" => $logo
                ];
                $this->plataforma[] = $plataforma;
            }
        }
    
        $consulta->close();
        return $this->plataforma;
    }
    
    //NO SE MUESTRA
    public function listarPlataformas()
    {
        $consulta = $this->bd->query("SELECT * from plataformas where activo='1'");
        return $this->plataforma=$consulta->fetch_all(MYSQLI_ASSOC);
    }
}


?>