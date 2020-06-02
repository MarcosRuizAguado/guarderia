<?php

class Padre extends \Phalcon\Mvc\Model
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
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $codAlum;

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
     * @Column(type="string", length=100, nullable=false)
     */
    protected $Email;

    /**
     *
     * @var string
     * @Column(type="string", length=25, nullable=false)
     */
    protected $Contra;
    
    protected $rol;

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
    
    public function setRol($rol){
        $this->rol = $rol;
    }

    /**
     * Method to set the value of field codAlum
     *
     * @param integer $codAlum
     * @return $this
     */
    public function setCodAlum($codAlum)
    {
        $this->codAlum = $codAlum;

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
     * Method to set the value of field Email
     *
     * @param string $Email
     * @return $this
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Method to set the value of field Contraseña
     *
     * @param string $Contraseña
     * @return $this
     */
    public function setContra($Contra)
    {
        $this->Contra = $Contra;

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
    
    public function getRol()
    {
        return $this->rol;
    }
    

    /**
     * Returns the value of field codAlum
     *
     * @return integer
     */
    public function getCodAlum()
    {
        return $this->codAlum;
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
     * Returns the value of field Email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Returns the value of field Contraseña
     *
     * @return string
     */
    public function getContra()
    {
        return $this->Contra;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("guarderia");
        $this->hasMany('codAlum','nino','CodAlum');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'padre';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Padre[]|Padre
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Padre
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public function constructor($ID, $codAlum, $Nombre, $Apellido1, $Apellido2, $Email, $Contra, $rol) {
        $this->ID = $ID;
        $this->codAlum = $codAlum;
        $this->Nombre = $Nombre;
        $this->Apellido1 = $Apellido1;
        $this->Apellido2 = $Apellido2;
        $this->Email = $Email;
        $this->Contra = $Contra;
        $this->rol = $rol;
    }

}
