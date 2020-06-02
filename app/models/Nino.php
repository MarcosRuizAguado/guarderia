<?php

class Nino extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $CodAlum;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $Nombre;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $Apellido1;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $Apellido2;

    /**
     *
     * @var string
     * @Column(type="string", length=250, nullable=true)
     */
    protected $Foto;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $CodAula;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=true)
     */
    protected $Ficha;

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
     * Method to set the value of field Nombre
     *
     * @param string $Nombre
     * @return $this
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    /**
     * Method to set the value of field Apellido1
     *
     * @param string $Apellido1
     * @return $this
     */
    public function setApellido1($Apellido1)
    {
        $this->Apellido1 = $Apellido1;

        return $this;
    }

    /**
     * Method to set the value of field Apellido2
     *
     * @param string $Apellido2
     * @return $this
     */
    public function setApellido2($Apellido2)
    {
        $this->Apellido2 = $Apellido2;

        return $this;
    }

    /**
     * Method to set the value of field Foto
     *
     * @param string $Foto
     * @return $this
     */
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;

        return $this;
    }

    /**
     * Method to set the value of field CodAula
     *
     * @param integer $CodAula
     * @return $this
     */
    public function setCodAula($CodAula)
    {
        $this->CodAula = $CodAula;

        return $this;
    }

    /**
     * Method to set the value of field Ficha
     *
     * @param integer $Ficha
     * @return $this
     */
    public function setFicha($Ficha)
    {
        $this->Ficha = $Ficha;

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
     * Returns the value of field Nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * Returns the value of field Apellido1
     *
     * @return string
     */
    public function getApellido1()
    {
        return $this->Apellido1;
    }

    /**
     * Returns the value of field Apellido2
     *
     * @return string
     */
    public function getApellido2()
    {
        return $this->Apellido2;
    }

    /**
     * Returns the value of field Foto
     *
     * @return string
     */
    public function getFoto()
    {
        return $this->Foto;
    }

    /**
     * Returns the value of field CodAula
     *
     * @return integer
     */
    public function getCodAula()
    {
        return $this->CodAula;
    }

    /**
     * Returns the value of field Ficha
     *
     * @return integer
     */
    public function getFicha()
    {
        return $this->Ficha;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("guarderia");
        $this->hasMany('CodAlum', 'Aula', 'CodAula', ['alias' => 'Aula']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'nino';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nino[]|Nino
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Nino
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
