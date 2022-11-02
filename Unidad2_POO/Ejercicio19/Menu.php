<?php
class Menu{
    private $opciones; //Array de opciones
    private $colorF; //String
    private $colorT; //String
    
    function __construct($opciones, $colorF, $colorT){
        $this->opciones = $opciones;
        $this->colorF = $colorF;
        $this->colorT = $colorT;
    }
    
    function pintar(){
        echo "<table><tr>";
        foreach ($this->opciones as $o){
            echo "<td style='background-color:".$this->colorF."; color:".$this->colorT."'>$o</td>";  
        }
        echo "</tr></table>";
    }
    
    /**
     * @return mixed
     */
    public function getOpciones()
    {
        return $this->opciones;
    }

    /**
     * @return mixed
     */
    public function getColorF()
    {
        return $this->colorF;
    }

    /**
     * @return mixed
     */
    public function getColorT()
    {
        return $this->colorT;
    }

    /**
     * @param mixed $opciones
     */
    public function setOpciones($opciones)
    {
        $this->opciones = $opciones;
    }

    /**
     * @param mixed $colorF
     */
    public function setColorF($colorF)
    {
        $this->colorF = $colorF;
    }

    /**
     * @param mixed $colorT
     */
    public function setColorT($colorT)
    {
        $this->colorT = $colorT;
    }


    
}
?>