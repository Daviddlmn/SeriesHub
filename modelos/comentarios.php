<?php
// require_once "../bd/bd.php";
class comentarios
{
    private $bd;
    private $comentario;

    public function __construct()
    {
        $this->bd = conectar::con();
    }
    public function insertarComentario($socio, $serie, $fecha, $texto){
        $consulta = $this->bd->prepare("insert into comentario (socio, serie, fecha, texto) values (?,?,?,?)");
        $consulta->bind_param("iiss", $socio, $serie, $fecha, $texto);
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
    public function borrarComentario($socio, $serie, $fecha)
    {
        $consulta = $this->bd->prepare("DELETE FROM comentario where socio=? and serie=? and fecha=?");
        $consulta->bind_param("iis", $socio, $serie, $fecha);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->affected_rows > 0) {
            $consulta->close();
            return true;
        }else{
            $consulta->close();
            return false;
        }
    }
    public function buscarComentarioPorSerie($idSerie)
    {
        $consulta = $this->bd->prepare("select series.nombre nombreSerie, foto, socios.nombre nombreSocio,series.id seriesId, socios.id sociosId, fecha, texto from comentario, socios, series where socio=socios.id and serie=series.id and serie=?;");
        $consulta->bind_param("i", $idSerie);
        $consulta->execute();
        $this->comentario = $consulta->get_result(); //Es como un fetch
        // $comentariosEncontradosPorID= $comentario->fetch_all(MYSQLI_ASSOC);
        return $this->comentario->fetch_all(MYSQLI_ASSOC); //Esto devuelve una matri<

        //OTRA FROMA DE HACERLO
    }
    public function ultimosCincoComentarios()
    {
        $consulta = $this->bd->query("SELECT series.nombre nombreSerie,series.foto,socios.nombre, socios.nick,comentario.fecha,comentario.texto from series,comentario,socios where comentario.serie=series.id and comentario.socio=socios.id order by comentario.fecha desc limit 5");
        return $this->comentario = $consulta->fetch_all(MYSQLI_ASSOC);
    }

    public function listarComentarios()
    {
        $listado = $this->bd->query("select series.nombre nombreSerie, foto, socios.nombre nombreSocio,series.id seriesId, socios.id sociosId, fecha, texto from comentario, socios, series where socio=socios.id and serie=series.id;");
        $this->comentario = $listado->fetch_all(MYSQLI_ASSOC);
        if ($this->comentario) {
            return $this->comentario;
        }
    }

    public function comprobarComentario($idSocio, $idSerie)
    {
        $consulta = $this->bd->prepare("select * from comentario where socio=? and serie=?");
        echo $this->bd->error;
        $consulta->bind_param("ii", $idSocio, $idSerie);
        $consulta->bind_result($idSocio, $idSerie, $fecha, $texto);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}






?>