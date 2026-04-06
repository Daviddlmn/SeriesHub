<?php
// require_once "../bd/bd.php";
class lanzamiento
{
    private $bd;
    private $lanzamiento;

    public function __construct()
    {
        $this->bd = conectar::con();
    }
    public function insertarLanzamiento($serie, $plataforma, $fecha)
    {
        $consulta = $this->bd->prepare("INSERT into lanzamientos VALUES (?,?,?)");
        $consulta->bind_param("iis", $serie, $plataforma, $fecha);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->affected_rows > 0){
            $consulta->close();
            return true;
        }else{
            $consulta->close();
            return false;
        }
    }
    public function modificarLanzamiento($serie, $plataforma, $fecha)
    {
        $consulta = $this->bd->prepare("UPDATE lanzamientos set fecha=? where serie=? and plataforma=?");
        $consulta->bind_param("sii", $fecha, $serie, $plataforma);
        $consulta->execute();
        $consulta->close();
        return $consulta;
    }
    public function borrarLanzamiento($serie, $plataforma)
    {
        $consulta = $this->bd->prepare("DELETE FROM lanzamientos where serie=? and plataforma=?");
        $consulta->bind_param("ii", $serie, $plataforma);
        $consulta->execute();
        $consulta->close();
        return $consulta;
    }
    public function buscarLanzamientoPorSerie($idSerie)
    {
        $consulta = $this->bd->prepare("SELECT plataformas.nombre, plataformas.logotipo,lanzamientos.fecha  from lanzamientos, plataformas where plataformas.id=lanzamientos.plataforma and serie=?");
        $consulta->bind_param("i", $idSerie);
        $consulta->bind_result($nombrePlataforma, $foto, $fechaLanzamiento);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows() > 0) {
            $i = 0;
            while ($consulta->fetch()) {
                $this->lanzamiento[$i]["nombre"] = $nombrePlataforma;
                $this->lanzamiento[$i]["foto"] = $foto;
                $this->lanzamiento[$i]["fecha"] = $fechaLanzamiento;
                $i++;
            }
            $consulta->close();
            return $this->lanzamiento;
        } else {
            $consulta->close();
            return $this->lanzamiento;
        }
    }
    public function buscarLanzamientoPorPlataforma($idPlataforma)
    {
        $consulta = $this->bd->prepare("SELECT plataformas.nombre, plataformas.logotipo, lanzamientos.fecha, series.nombre nombreSeries, series.foto, series.id  from plataformas, lanzamientos,series where lanzamientos.plataforma=plataformas.id and series.id=lanzamientos.serie and plataformas.id=? and series.activo='1'");
        $consulta->bind_param("i", $idPlataforma);
        $consulta->bind_result($nombre, $logo, $fecha,$nombreSerie,$fotoSerie,$idSerie);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows() > 0) {
            $i=0;
            while ($consulta->fetch()) {
                $this->lanzamiento[$i]["nombreLan"] = $nombre;
                $this->lanzamiento[$i]["logoLan"]= $logo;
                $this->lanzamiento[$i]["fechaLan"] = $fecha;
                $this->lanzamiento[$i]["nombreSerie"] = $nombreSerie;
                $this->lanzamiento[$i]["fotoSerie"] = $fotoSerie;
                $this->lanzamiento[$i]["idSerie"] = $idSerie;
                $i++;
            }
            $consulta->close();
            return $this->lanzamiento;
        } else {
            $consulta->close();
            return $this->lanzamiento;
        }
    }
    public function ultimosLanzamietos($idPlataforma)
    {
        $consulta = $this->bd->prepare("SELECT series.nombre, lanzamientos.fecha,series.foto,series.descripcion  from series, lanzamientos where series.id =lanzamientos.serie and lanzamientos.plataforma=? order by lanzamientos.fecha desc limit 4");
        $consulta->bind_param("i", $idPlataforma);
        $consulta->bind_result($nombreSerie,$fechaLanzamiento,$fotoSerie,$descripcion );
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows() > 0) {
            $i=0;
            while ($consulta->fetch()) {
                $this->lanzamiento[$i]["nombre"] = $nombreSerie;
                $this->lanzamiento[$i]["fecha"] = $fechaLanzamiento;
                $this->lanzamiento[$i]["foto"] = $fotoSerie;
                $this->lanzamiento[$i]["descripcion"] = $descripcion;
                $i++;
            }
            $consulta->close();
            return $this->lanzamiento;
        } else {
            $consulta->close();
            return $this->lanzamiento;
        }
    }
    public function listarSeriesPorPlataforma($idPlataforma)
    {
        $consulta = $this->bd->prepare("SELECT series.id, series.nombre,series.foto from series, lanzamientos where lanzamientos.serie=series.id and lanzamientos.plataforma=? and series.activo='1'");
        $consulta->bind_param("i", $idPlataforma);
        $consulta->bind_result($seriesId,$seriesNombre,$seriesFoto);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows() > 0) {
            $i=0;
            while ($consulta->fetch()) {
                $this->lanzamiento[$i]["id"] = $seriesId;
                $this->lanzamiento[$i]["nombre"] = $seriesNombre;
                $this->lanzamiento[$i]["foto"] = $seriesFoto;
                $i++;
            }
            $consulta->close();
            return $this->lanzamiento;
        } else {
            $consulta->close();
            return $this->lanzamiento;
        }
    }
    public function listarLanzamientos()
    {
        $consulta = $this->bd->query("SELECT series.nombre as nombreSerie, plataformas.nombre as nombrePlat, lanzamientos.serie as serieId, lanzamientos.plataforma as platId, lanzamientos.fecha from lanzamientos,series,plataformas where lanzamientos.serie=series.id and lanzamientos.plataforma=plataformas.id order by fecha desc");
            $this->lanzamiento[] = $consulta->fetch_all(MYSQLI_ASSOC);
        $consulta->close();
        return $this->lanzamiento;
    }
}
