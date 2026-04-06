<?php
require_once "../bd/bd.php";
class socios
{
    private $bd;
    private $socio;

    public function __construct()
    {
        $this->bd = conectar::con();
    }
    public function insertarSocios($nombre, $nick, $pass)
    {
        $consulta = $this->bd->prepare("INSERT into socios VALUES (null,?,?,?,'1')");
        $pass = md5(md5(md5(md5(md5($pass)))));
        $consulta->bind_param("sss", $nombre, $nick, $pass);
        $consulta->execute();
        $consulta->close();
    }
    public function modificarSocio($nombre, $nick, $pass, $id)
    {
        $consulta = $this->bd->prepare("UPDATE socios set nombre=?,nick=?,pass=? where id=? and activo='1'");
        $consulta->bind_param("sssi", $nombre, $nick, $pass, $id);
        $consulta->execute();
        $consulta->close();
    }
    public function desactivarSocio($id)
    {
        $consulta = $this->bd->prepare("UPDATE socios set activo='0' where id=?");
        $consulta->bind_param("i", $id);
        $consulta->execute();
        $consulta->close();
    }
    public function buscarSocio($nombre)
    {
        $nombre = "%" . $nombre . "%";
        $consulta = $this->bd->prepare("SELECT id, nombre, nick, pass from socios where nombre like ? and activo='1'");
        $consulta->bind_param("s", $nombre);
        $consulta->bind_result($id, $nombreSocio, $nick, $pass);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows() > 0) {
            $i = 0;
            while ($consulta->fetch()) {
                $this->socio[$i]["id"] = $id;
                $this->socio[$i]["nombreSocio"] = $nombreSocio;
                $this->socio[$i]["nick"] = $nick;
                $this->socio[$i]["pass"] = $pass;
                $i++;
            }
            $consulta->close();
            return $this->socio;
        } else {
            $consulta->close();
            return $this->socio;

        }
    }
    public function loginSocio($nick, $pass)
    {
        $passMd5 = md5(md5(md5(md5(md5($pass)))));
        $consulta = $this->bd->prepare("SELECT id from socios where nick=? and pass=?");
        $consulta->bind_param("ss", $nick, $passMd5);
        $consulta->bind_result($id);
        $consulta->execute();
        $consulta->store_result();
        if ($consulta->num_rows > 0) {
            $consulta->fetch();
            $consulta->close();
            return $this->socio=$id;
        } else {
            $consulta->close();
            return -1;
        }
    }
    public function listarSocios()
    {
        $consulta = $this->bd->query("SELECT nombre, nick, id  from socios where id <> 0 and activo='1'");
        if ($consulta->num_rows > 0) {
            $this->socio = $consulta->fetch_all(MYSQLI_ASSOC);
            $consulta->close();
            return $this->socio;
        }else{
            $consulta->close();
            return $this->socio;
        }
    }
}

?>