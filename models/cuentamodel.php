<?php

class CuentaModel extends Model implements IModel{

    private $id;
    private $no_cuenta;
    private $fecha_alta;
    private $fecha_baja;
    private $nombre;
    private $direccion;
    private $colonia;
    private $cruces;
    private $lugar_cobro;
    private $notas;
    private $maps;
    private $email_1;
    private $email_2;

    public function __construct(){
        parent::__construct();

        $this->setId('');
        $this->setNo_cuenta('');
        $this->setFecha_alta('');
        $this->setFecha_baja('');
        $this->setNombre('');
        $this->setDireccion('');
        $this->setColonia('');
        $this->setCruces('');
        $this->setLugar_cobro('');
        $this->setNotas('');
        $this->setMaps('');
        $this->setEmail_1('');
        $this->setEmail_2('');

    }
    
    public function save(){
        try{
            $query = $this->prepare('INSERT INTO cuenta (no_cuenta, fecha_alta, fecha_baja, nombre, direccion, colonia, cruces, lugar_cobro, notas, maps, email_1, email_2) VALUES(no_cuenta, fecha_alta, fecha_baja, nombre, direccion, colonia, cruces, lugar_cobro, notas, maps, email_1, email_2)');
            $query->execute([
                'no_cuenta' => $this->$no_cuenta,
                'fecha_alta' => $this->$fecha_alta,
                'fecha_baja' => $this->$fecha_baja,
                'nombre' => $this->$nombre,
                'direccion' => $this->$direccion,
                'colonia' => $this->$colonia,
                'cruces' => $this->$cruces,
                'lugar_cobro' => $this->$lugar_cobro,
                'notas' => $this->$notas,
                'maps' => $this->$maps,
                'email_1' => $this->$email_1,
                'email_2' => $this->$email_2
                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }
    
    public function getAll(){
        $items = [];

        try{
            $query = $this->query('SELECT * FROM cuenta');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new CuentaModel();
                $item->setId($p['id']);
                $item->setNo_cuenta($p['no_cuenta']);
                $item->setFecha_alta($p['fecha_alta']);
                $item->setFecha_baja($p['fecha_baja']);
                $item->setNombre($p['nombre']);
                $item->setDireccion($p['direccion']);
                $item->setColonia($p['colonia']);
                $item->setCruces($p['cruces']);
                $item->setLugar_cobro($p['lugar_cobro']);
                $item->setNotas($p['notas']);
                $item->setMaps($p['maps']);
                $item->setEmail_1($p['email_1']);
                $item->setEmail_2($p['email_2']);                

                array_push($items, $item);
            }
            return $items;


        }catch(PDOException $e){
            echo $e;
        }
    }

    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM cuenta WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $p = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($p['id']);
            $this->setNo_cuenta($p['no_cuenta']);
            $this->setFecha_alta($p['fecha_alta']);
            $this->setFecha_baja($p['fecha_baja']);
            $this->setNombre($p['nombre']);
            $this->setDireccion($p['direccion']);
            $this->setColonia($p['colonia']);
            $this->setCruces($p['cruces']);
            $this->setLugar_cobro($p['lugar_cobro']);
            $this->setNotas($p['notas']);
            $this->setMaps($p['maps']);
            $this->setEmail_1($p['email_1']);
            $this->setEmail_2($p['email_2']);    


            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM cuenta WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE cuenta SET no_cuenta = :no_cuenta, fecha_alta = :fecha_alta, fecha_baja = :fecha_baja, nombre = :nombre, direccion = :direccion, colonia = :colonia, cruces = :cruces, lugar_cobro = :lugar_cobro, notas = :notas, maps = :maps, email_1 = :email_2');
            $query->execute([
                'no_cuenta' => $this->$no_cuenta,
                'fecha_alta' => $this->$fecha_alta,
                'fecha_baja' => $this->$fecha_baja,
                'nombre' => $this->$nombre,
                'direccion' => $this->$direccion,
                'colonia' => $this->$colonia,
                'cruces' => $this->$cruces,
                'lugar_cobro' => $this->$lugar_cobro,
                'notas' => $this->$notas,
                'maps' => $this->$maps,
                'email_1' => $this->$email_1,
                'email_2' => $this->$email_2

                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function from($array){
        $this->setId($array['id']);
        $this->setNo_cuenta($array['no_cuenta']);
        $this->setFecha_alta($array['fecha_alta']);
        $this->setFecha_baja($array['fecha_baja']);
        $this->setNombre($array['nombre']);
        $this->setDireccion($array['direccion']);
        $this->setColonia($array['colonia']);
        $this->setCruces($array['cruces']);
        $this->setLugar_cobro($array['lugar_cobro']);
        $this->setNotas($array['notas']);
        $this->setMaps($array['maps']);
        $this->setEmail_1($array['email_1']);
        $this->setEmail_2($array['email_2']); 
    }

    public function getByCuenta($cuenta){
        try{
            $query = $this->prepare('SELECT * FROM cuenta WHERE no_cuenta = :cuenta');
            $query->execute([ 'cuenta' => $cuenta]);
            $p = $query->fetch(PDO::FETCH_ASSOC);

            $this->setId($p['id']);
            $this->setNo_cuenta($p['no_cuenta']);
            $this->setFecha_alta($p['fecha_alta']);
            $this->setFecha_baja($p['fecha_baja']);
            $this->setNombre($p['nombre']);
            $this->setDireccion($p['direccion']);
            $this->setColonia($p['colonia']);
            $this->setCruces($p['cruces']);
            $this->setLugar_cobro($p['lugar_cobro']);
            $this->setNotas($p['notas']);
            $this->setMaps($p['maps']);
            $this->setEmail_1($p['email_1']);
            $this->setEmail_2($p['email_2']);    


            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getNo_cuenta(){
        return $this->no_cuenta;
    }

    public function setNo_cuenta($no_cuenta){
        $this->no_cuenta = $no_cuenta;
    }

    public function getFecha_alta(){
        return $this->fecha_alta;
    }

    public function setFecha_alta($fecha_alta){
        $this->fecha_alta = $fecha_alta;
    }

    public function getFecha_baja(){
        return $this->fecha_baja;
    }

    public function setFecha_baja($fecha_baja){
        $this->fecha_baja = $fecha_baja;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getColonia(){
        return $this->colonia;
    }

    public function setColonia($colonia){
        $this->colonia = $colonia;
    }

    public function getCruces(){
        return $this->cruces;
    }

    public function setCruces($cruces){
        $this->cruces = $cruces;
    }

    public function getLugar_cobro(){
        return $this->lugar_cobro;
    }

    public function setLugar_cobro($lugar_cobro){
        $this->lugar_cobro = $lugar_cobro;
    }

    public function getNotas(){
        return $this->notas;
    }

    public function setNotas($notas){
        $this->notas = $notas;
    }

    public function getMaps(){
        return $this->maps;
    }

    public function setMaps($maps){
        $this->maps = $maps;
    }

    public function getEmail_1(){
        return $this->email_1;
    }

    public function setEmail_1($email_1){
        $this->email_1 = $email_1;
    }

    public function getEmail_2(){
        return $this->email_2;
    }

    public function setEmail_2($email_2){
        $this->email_2 = $email_2;
    }


}    
?>