<?php
class Usuario{
    private $id;
    private $email;
    private $clave;
    private $nombre;
    private $direccion;
    private $telefono;
    private $perfil;
    private $baja;
    
    /**
     * @return mixed
     */
    public function getBaja()
    {
        return $this->baja;
    }

    /**
     * @param mixed $baja
     */
    public function setBaja($baja)
    {
        $this->baja = $baja;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getClave()
    {
        return $this->clave;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param mixed $clave
     */
    public function setClave($clave)
    {
        $this->clave = $clave;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * @param mixed $perfil
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    
    function __construct($id,$email, $clave, $nombre, $direccion, $telefono,$perfil, $baja){
        $this->id=$id;
        $this->email=$email;
        $this->clave=$clave;
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->telefono=$telefono;
        $this->perfil=$perfil;
        $this->baja=$baja;
    }
    
}
?>