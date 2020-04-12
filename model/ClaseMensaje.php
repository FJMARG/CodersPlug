<?php

class ClaseMensaje{
    private $type;      // Nombre de clases, ej. de Bootstrap.
    private $msj;       // Mensaje a mostrar.
    private $display;   // Descriptor (exito, advertencia, error, informativo, etc).
    private $continue;  // Variable para control (valores true o false);
 
	public function __construct($tipo, $msj, $display, $continue){
        $this->type = $tipo;
        $this->msj = $msj;
        $this->display = $display;
        $this->continue = $continue;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getMsj()
    {
        return $this->msj;
    }

    public function getDisplay()
    {
        return $this->display;
    }

    public function setDisplay($valor)
    {
        $this->display = $valor;
    }

    public function isContinue()
    {
        return $this->continue;
    }

    public function setContinue($valor)
    {
        $this->continue = $valor;
    }
}