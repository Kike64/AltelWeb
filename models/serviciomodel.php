<?php

class ServicioModel extends Model implements IModel {

    private $id;
    private $cuenta;
    private $fecha_alta;
    private $nombre;
    private $status;
    private $problema;
    private $fecha_realizar;
    private $hora_realizar;
    private $capturo_alta;
    private $costo;
    private $tecnico;
    private $capturo_baja;
    private $fecha_baja;
    private $observacion_problema;
    private $direccion;
    private $colonia;
    private $entre_calles;
    private $file;
    private $observacion_servicio;
    private $status_recorrido;
    private $seguimiento;
    private $folio;
    private $no_reagendaciones;


    public function __construct(){
        parent::__construct();

        $this->cuenta = 0;
        $this->fecha_alta = 0;
        $this->nombre = '';
        $this->status = 0;
        $this->problema = '';
        $this->fecha_realizar = 0;
        $this->hora_realizar = 0;
        $this->capturo_alta = '';
        $this->costo = 0;
        $this->tecnico = '';
        $this->capturo_baja = '';
        $this->fecha_baja = 0;
        $this->observacion_problema = '';
        $this->direccion = '';
        $this->colonia = '';
        $this->entre_calles = '';
        $this->file = '';
        $this->observacion_servicio = '';
        $this->status_recorrido = 0;
        $this->seguimiento = '';
        $this->folio = '';
        $this->no_reagendaciones = 0;

    }


    public function save(){
        try{
            $query = $this->prepare('INSERT INTO servicios (cuenta, fecha_alta, nombre, status, problema, fecha_realizar, hora_realizar, capturo_alta, costo, tecnico, capturo_baja, fecha_baja, observacion_problema, direccion, colonia, entre_calles, file, observacion_servicio, status_recorrido, seguimiento, folio, no_reagendaciones) VALUES(:cuenta, :fecha_alta, :nombre, :status, :problema, :fecha_realizar, :hora_realizar, :capturo_alta, :costo, :tecnico, :capturo_baja, :fecha_baja, :observacion_problema, :direccion, :colonia, :entre_calles, :file, :observacion_servicio, :status_recorrido, :seguimiento, :folio, :no_reagendaciones)');
            $query->execute([
                'cuenta' => $this->cuenta,
                'fecha_alta' => $this->fecha_alta,
                'nombre' => $this->nombre,
                'status' => $this->status,
                'problema' => $this->problema,
                'fecha_realizar' =>$this->fecha_realizar,
                'hora_realizar' =>  $this->hora_realizar,
                'capturo_alta' =>  $this->capturo_alta,
                'costo' =>  $this->costo,
                'tecnico' => $this->tecnico,
                'capturo_baja' => $this->capturo_baja,
                'fecha_baja' => $this->fecha_baja,
                'observacion_problema' => $this->observacion_problema,
                'direccion' => $this->direccion,
                'colonia' => $this->colonia,
                'entre_calles' => $this->entre_calles,
                'file' => $this->file,
                'observacion_servicio' => $this->observacion_servicio,
                'status_recorrido' => $this->status_recorrido,
                'seguimiento' => $this->seguimiento,
                'folio' => $this->folio,
                'no_reagendaciones' => $this->no_reagendaciones
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
            $query = $this->query('SELECT * FROM servicios ORDER BY id DESC');

            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new ServicioModel();
                $item->setId($p['id']);
                $item->setCuenta($p['cuenta']);
                $item->setFecha_alta($p['fecha_alta']);
                $item->setNombre($p['nombre']);
                $item->setStatus($p['status']);
                $item->setProblema($p['problema']);
                $item->setFecha_realizar($p['fecha_realizar']);
                $item->setHora_realizar($p['hora_realizar']);
                $item->setCapturo_alta($p['capturo_alta']);
                $item->setCosto($p['costo']);
                $item->setTecnico($p['tecnico']);
                $item->setCapturo_baja($p['capturo_baja']);
                $item->setFecha_baja($p['fecha_baja']);
                $item->setObservacion_problema($p['observacion_problema']);
                $item->setDireccion($p['direccion']);
                $item->setColonia($p['colonia']);
                $item->setEntre_calles($p['entre_calles']);
                $item->setFile($p['file']);
                $item->setObservacion_servicio($p['observacion_servicio']);
                $item->setStatus_recorrido($p['status_recorrido']);
                $item->setSeguimiento($p['seguimiento']);
                $item->setFolio($p['folio']);
                $item->setNo_reagendaciones($p['no_reagendaciones']);
                

                array_push($items, $item);
            }
            return $items;


        }catch(PDOException $e){
            echo $e;
        }
    }

    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM servicios WHERE id = :id');
            $query->execute([ 'id' => $id]);
            $servicio = $query->fetch(PDO::FETCH_ASSOC);
            //$item = new ServicioModel();

            $this->setId($servicio['id']);
            $this->setCuenta($servicio['cuenta']);
            $this->setFecha_alta($servicio['fecha_alta']);
            $this->setNombre($servicio['nombre']);
            $this->setStatus($servicio['status']);
            $this->setProblema($servicio['problema']);
            $this->setFecha_realizar($servicio['fecha_realizar']);
            $this->setHora_realizar($servicio['hora_realizar']);
            $this->setCapturo_alta($servicio['capturo_alta']);
            $this->setCosto($servicio['costo']);
            $this->setTecnico($servicio['tecnico']);
            $this->setCapturo_baja($servicio['capturo_baja']);
            $this->setFecha_baja($servicio['fecha_baja']);
            $this->setObservacion_problema($servicio['observacion_problema']);
            $this->setDireccion($servicio['direccion']);
            $this->setColonia($servicio['colonia']);
            $this->setEntre_calles($servicio['entre_calles']);
            $this->setFile($servicio['file']);
            $this->setObservacion_servicio($servicio['observacion_servicio']);
            $this->setStatus_recorrido($servicio['status_recorrido']);
            $this->setSeguimiento($servicio['seguimiento']);
            $this->setFolio($servicio['folio']);
            $this->setNo_reagendaciones($servicio['no_reagendaciones']);


            return $this;
        }catch(PDOException $e){
            return false;
        }
    }

    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM servicios WHERE id = :id');
            $query->execute([ 'id' => $id]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE servicios SET cuenta = :cuenta, fecha_alta = :fecha_alta, nombre = :nombre, status = :status, problema = :problema, fecha_realizar = :fecha_realizar, hora_realizar = :hora_realizar, capturo_alta = :capturo_alta, costo = :costo, tecnico = :tecnico, capturo_baja = :capturo_baja, fecha_baja = :fecha_baja, observacion_problema = :observacion_problema, direccion = :direccion, colonia = :colonia, entre_calles = :entre_calles, file = :file, observacion_servicio = :observacion_servicio, status_recorrido = :status_recorrido, seguimiento = :seguimiento, folio = :folio, no_reagendaciones = :no_reagendaciones WHERE id = :id');
            $query->execute([
                'id' => $this->id,
                'cuenta' => $this->cuenta,
                'fecha_alta' => $this->fecha_alta,
                'nombre' => $this->nombre,
                'status' => $this->status,
                'problema' => $this->problema,
                'fecha_realizar' =>$this->fecha_realizar,
                'hora_realizar' =>  $this->hora_realizar,
                'capturo_alta' =>  $this->capturo_alta,
                'costo' =>  $this->costo,
                'tecnico' => $this->tecnico,
                'capturo_baja' => $this->capturo_baja,
                'fecha_baja' => $this->fecha_baja,
                'observacion_problema' => $this->observacion_problema,
                'direccion' => $this->direccion,
                'colonia' => $this->colonia,
                'entre_calles' => $this->entre_calles,
                'file' => $this->file,
                'observacion_servicio' => $this->observacion_servicio,
                'status_recorrido' => $this->status_recorrido,
                'seguimiento' => $this->seguimiento,
                'folio' => $this->folio,
                'no_reagendaciones' => $this->no_reagendaciones

                ]);
            return true;
        }catch(PDOException $e){
            echo $e;
            return false;
        }
    }

    public function from($array){
        $this->id = $array['id'];
        $this->cuenta = $array['cuenta'];
        $this->fecha_alta = $array['fecha_alta'];
        $this->nombre = $array['nombre'];
        $this->status = $array['status'];
        $this->problema = $array['problema'];
        $this->fecha_realizar = $array['fecha_realizar'];
        $this->hora_realizar = $array['hora_realizar'];
        $this->capturo_alta = $array['capturo_alta'];
        $this->costo = $array['costo'];
        $this->tecnico = $array['tecnico'];
        $this->capturo_baja = $array['capturo_baja'];
        $this->fecha_baja = $array['fecha_baja'];
        $this->observacion_problema = $array['observacion_problema'];
        $this->direccion = $array['direccion'];
        $this->colonia = $array['colonia'];
        $this->entre_calles = $array['entre_calles'];
        $this->file = $array['file'];
        $this->observacion_servicio = $array['observacion_servicio'];
        $this->status_recorrido = $array['status_recorrido'];
        $this->seguimiento = $array['seguimiento'];
        $this->folio = $array['folio'];
        $this->no_reagendaciones = $array['no_reagendaciones'];
    }

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCuenta(){
		return $this->cuenta;
	}

	public function setCuenta($cuenta){
		$this->cuenta = $cuenta;
	}

	public function getFecha_alta(){
		return $this->fecha_alta;
	}

	public function setFecha_alta($fecha_alta){
		$this->fecha_alta = $fecha_alta;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getProblema(){
		return $this->problema;
	}

	public function setProblema($problema){
		$this->problema = $problema;
	}

	public function getFecha_realizar(){
		return $this->fecha_realizar;
	}

	public function setFecha_realizar($fecha_realizar){
		$this->fecha_realizar = $fecha_realizar;
	}

	public function getHora_realizar(){
		return $this->hora_realizar;
	}

	public function setHora_realizar($hora_realizar){
		$this->hora_realizar = $hora_realizar;
	}

	public function getCapturo_alta(){
		return $this->capturo_alta;
	}

	public function setCapturo_alta($capturo_alta){
		$this->capturo_alta = $capturo_alta;
	}

	public function getCosto(){
		return $this->costo;
	}

	public function setCosto($costo){
		$this->costo = $costo;
	}

	public function getTecnico(){
		return $this->tecnico;
	}

	public function setTecnico($tecnico){
		$this->tecnico = $tecnico;
	}

	public function getCapturo_baja(){
		return $this->capturo_baja;
	}

	public function setCapturo_baja($capturo_baja){
		$this->capturo_baja = $capturo_baja;
	}

	public function getFecha_baja(){
		return $this->fecha_baja;
	}

	public function setFecha_baja($fecha_baja){
		$this->fecha_baja = $fecha_baja;
	}

	public function getObservacion_problema(){
		return $this->observacion_problema;
	}

	public function setObservacion_problema($observacion_problema){
		$this->observacion_problema = $observacion_problema;
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

	public function getEntre_calles(){
		return $this->entre_calles;
	}

	public function setEntre_calles($entre_calles){
		$this->entre_calles = $entre_calles;
	}

	public function getFile(){
		return $this->file;
	}

	public function setFile($file){
		$this->file = $file;
	}

	public function getObservacion_servicio(){
		return $this->observacion_servicio;
	}

	public function setObservacion_servicio($observacion_servicio){
		$this->observacion_servicio = $observacion_servicio;
	}

	public function getStatus_recorrido(){
		return $this->status_recorrido;
	}

	public function setStatus_recorrido($status_recorrido){
		$this->status_recorrido = $status_recorrido;
	}

	public function getSeguimiento(){
		return $this->seguimiento;
	}

	public function setSeguimiento($seguimiento){
		$this->seguimiento = $seguimiento;
	}

	public function getFolio(){
		return $this->folio;
	}

	public function setFolio($folio){
		$this->folio = $folio;
	}

	public function getNo_reagendaciones(){
		return $this->no_reagendaciones;
	}

	public function setNo_reagendaciones($no_reagendaciones){
		$this->no_reagendaciones = $no_reagendaciones;
	}
}
?>