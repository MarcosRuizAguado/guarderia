<?php

class Mensajes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $ID;

    /**
     *
     * @var string
     * @Column(type="string", length=100, nullable=false)
     */
    protected $Titulo;

    /**
     *
     * @var string
     * @Column(type="string", length=500, nullable=false)
     */
    protected $Mensaje;

    /**
     *
     * @var string
     * @Column(type="string", length=11, nullable=false)
     */
    protected $De;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $Para;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $Fecha;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $Leido;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $Estado;

    /**
     * Method to set the value of field ID
     *
     * @param integer $ID
     * @return $this
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Method to set the value of field Titulo
     *
     * @param string $Titulo
     * @return $this
     */
    public function setTitulo($Titulo)
    {
        $this->Titulo = $Titulo;

        return $this;
    }

    /**
     * Method to set the value of field Mensaje
     *
     * @param string $Mensaje
     * @return $this
     */
    public function setMensaje($Mensaje)
    {
        $this->Mensaje = $Mensaje;

        return $this;
    }

    /**
     * Method to set the value of field De
     *
     * @param string $De
     * @return $this
     */
    public function setDe($De)
    {
        $this->De = $De;

        return $this;
    }

    /**
     * Method to set the value of field Para
     *
     * @param integer $Para
     * @return $this
     */
    public function setPara($Para)
    {
        $this->Para = $Para;

        return $this;
    }

    /**
     * Method to set the value of field Fecha
     *
     * @param string $Fecha
     * @return $this
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    /**
     * Method to set the value of field Leido
     *
     * @param integer $Leido
     * @return $this
     */
    public function setLeido($Leido)
    {
        $this->Leido = $Leido;

        return $this;
    }

    /**
     * Method to set the value of field Estado
     *
     * @param string $Estado
     * @return $this
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;

        return $this;
    }

    /**
     * Returns the value of field ID
     *
     * @return integer
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Returns the value of field Titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->Titulo;
    }

    /**
     * Returns the value of field Mensaje
     *
     * @return string
     */
    public function getMensaje()
    {
        return $this->Mensaje;
    }

    /**
     * Returns the value of field De
     *
     * @return string
     */
    public function getDe()
    {
        return $this->De;
    }

    /**
     * Returns the value of field Para
     *
     * @return integer
     */
    public function getPara()
    {
        return $this->Para;
    }

    /**
     * Returns the value of field Fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * Returns the value of field Leido
     *
     * @return integer
     */
    public function getLeido()
    {
        return $this->Leido;
    }

    /**
     * Returns the value of field Estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("guarderia");
        $this->belongsTo('Para', '\Padre', 'ID', ['alias' => 'Padre']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'mensajes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mensajes[]|Mensajes
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mensajes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
