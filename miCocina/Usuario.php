<?php

class Usuario
{
    private $id, $email, $nombre,$dir,$telf,$perfil,$baja;
    
    public function __construct($id, $email, $nombre,$dir,$telf,$perfil,$baja)
    {
        $this->id=$id;
        $this->email=$email;
        $this->nombre=$nombre;
        $this->dir=$dir;
        $this->telf=$telf;
        $this->perfil=$perfil;
        $this->baja=$baja;
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getDir()
    {
        return $this->dir;
    }

    /**
     * @return mixed
     */
    public function getTelf()
    {
        return $this->telf;
    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->perfil;
    }

    /**
     * @return mixed
     */
    public function getBaja()
    {
        return $this->baja;
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
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $dir
     */
    public function setDir($dir)
    {
        $this->dir = $dir;
    }

    /**
     * @param mixed $telf
     */
    public function setTelf($telf)
    {
        $this->telf = $telf;
    }

    /**
     * @param mixed $perfil
     */
    public function setPerfil($perfil)
    {
        $this->perfil = $perfil;
    }

    /**
     * @param mixed $baja
     */
    public function setBaja($baja)
    {
        $this->baja = $baja;
    }

    
    
}

