<?php

class Ficha extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $CodAlum;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $Fecha;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $Comida_primero;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $Comida_segundo;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $Comida_postre;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $Merienda;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=false)
     */
    protected $Pipi;

    /**
     *
     * @var string
     * @Column(type="string", length=2, nullable=false)
     */
    protected $Caca;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $Caca_num;

    /**
     *
     * @var string
     * @Column(type="string", length=250, nullable=false)
     */
    protected $Observaciones;

    /**
     * Method to set the value of field CodAlum
     *
     * @param integer $CodAlum
     * @return $this
     */
    public function setCodAlum($CodAlum)
    {
        $this->CodAlum = $CodAlum;

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
     * Method to set the value of field Comida_primero
     *
     * @param string $Comida_primero
     * @return $this
     */
    public function setComidaPrimero($Comida_primero)
    {
        $this->Comida_primero = $Comida_primero;

        return $this;
    }

    /**
     * Method to set the value of field Comida_segundo
     *
     * @param string $Comida_segundo
     * @return $this
     */
    public function setComidaSegundo($Comida_segundo)
    {
        $this->Comida_segundo = $Comida_segundo;

        return $this;
    }

    /**
     * Method to set the value of field Comida_postre
     *
     * @param string $Comida_postre
     * @return $this
     */
    public function setComidaPostre($Comida_postre)
    {
        $this->Comida_postre = $Comida_postre;

        return $this;
    }

    /**
     * Method to set the value of field Merienda
     *
     * @param string $Merienda
     * @return $this
     */
    public function setMerienda($Merienda)
    {
        $this->Merienda = $Merienda;

        return $this;
    }

    /**
     * Method to set the value of field Pipi
     *
     * @param string $Pipi
     * @return $this
     */
    public function setPipi($Pipi)
    {
        $this->Pipi = $Pipi;

        return $this;
    }

    /**
     * Method to set the value of field Caca
     *
     * @param string $Caca
     * @return $this
     */
    public function setCaca($Caca)
    {
        $this->Caca = $Caca;

        return $this;
    }

    /**
     * Method to set the value of field Caca_num
     *
     * @param integer $Caca_num
     * @return $this
     */
    public function setCacaNum($Caca_num)
    {
        $this->Caca_num = $Caca_num;

        return $this;
    }

    /**
     * Method to set the value of field Observaciones
     *
     * @param string $Observaciones
     * @return $this
     */
    public function setObservaciones($Observaciones)
    {
        $this->Observaciones = $Observaciones;

        return $this;
    }

    /**
     * Returns the value of field CodAlum
     *
     * @return integer
     */
    public function getCodAlum()
    {
        return $this->CodAlum;
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
     * Returns the value of field Comida_primero
     *
     * @return string
     */
    public function getComidaPrimero()
    {
        return $this->Comida_primero;
    }

    /**
     * Returns the value of field Comida_segundo
     *
     * @return string
     */
    public function getComidaSegundo()
    {
        return $this->Comida_segundo;
    }

    /**
     * Returns the value of field Comida_postre
     *
     * @return string
     */
    public function getComidaPostre()
    {
        return $this->Comida_postre;
    }

    /**
     * Returns the value of field Merienda
     *
     * @return string
     */
    public function getMerienda()
    {
        return $this->Merienda;
    }

    /**
     * Returns the value of field Pipi
     *
     * @return string
     */
    public function getPipi()
    {
        return $this->Pipi;
    }

    /**
     * Returns the value of field Caca
     *
     * @return string
     */
    public function getCaca()
    {
        return $this->Caca;
    }

    /**
     * Returns the value of field Caca_num
     *
     * @return integer
     */
    public function getCacaNum()
    {
        return $this->Caca_num;
    }

    /**
     * Returns the value of field Observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->Observaciones;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("guarderia");
        $this->belongsTo('CodAlum', '\Nino', 'CodAlum', ['alias' => 'Nino']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'ficha';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ficha[]|Ficha
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Ficha
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
