<?php
class Alumno{
    private $exp;
    private $nombre;
    private $fechaN;
    private $asig=array();
    
    //Añadir nota
    function addNota($asig,$nota) {
        $this->asig[$asig]=$nota;
    }
    //Mostrar
    function mostrar(){
        echo "<h3>Alumno:$this->nombre - $this->exp - ".
              date("d/m/Y",$this->fechaN).
              "</h3>";
        echo "<p>Asignaturas:</p><ul>";
        foreach ($this->asig as $a=>$n){
            echo "<li>$a:$n</li>";
        }
        echo "</ul>";
            
        
    }
    //Definimos el constructor
    function __construct($exp1,$nombre,$fechaN){
        //Si el parámetro del constructor se llama de forma diferente al atributo
        $this->exp=$exp1;
        //Si el parámetro del constructor se llama igual que el atributo
        $this->nombre=$nombre;
        $this->fechaN=$fechaN;
    }
    
    //Definimos el destructor
    //Se llama cuando el objeto se libera de la memoria
    //Esto pasa cuando hago un unset(objeto) o cuando finaliza el programa
    function __destruct(){
        echo "El alumno $this->exp se ha destruído";
    }
    
    /**
     * @return mixed
     */
    public function getExp()
    {
        return $this->exp;
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
    public function getFechaN()
    {
        return $this->fechaN;
    }

    /**
     * @return multitype:
     */
    public function getAsig()
    {
        return $this->asig;
    }

    /**
     * @param mixed $exp
     */
    public function setExp($exp)
    {
        $this->exp = $exp;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @param mixed $fechaN
     */
    public function setFechaN($fechaN)
    {
        $this->fechaN = $fechaN;
    }

    /**
     * @param multitype: $asig
     */
    public function setAsig($asig)
    {
        $this->asig = $asig;
    }

    
        
}
?>