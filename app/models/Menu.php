<?php

class Menu extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     * @Primary
     * @Column(type="string", nullable=false)
     */
    protected $Fecha;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $Dia_semana;

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
     * Method to set the value of field Dia_semana
     *
     * @param string $Dia_semana
     * @return $this
     */
    public function setDiaSemana($Dia_semana)
    {
        $this->Dia_semana = $Dia_semana;

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
     * Returns the value of field Fecha
     *
     * @return string
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * Returns the value of field Dia_semana
     *
     * @return string
     */
    public function getDiaSemana()
    {
        return $this->Dia_semana;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("guarderia");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'menu';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Menu[]|Menu
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Menu
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
