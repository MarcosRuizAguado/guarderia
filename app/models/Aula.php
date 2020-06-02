<?php

class Aula extends \Phalcon\Mvc\Model {

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $CodAula;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    protected $Nombre;
    protected $Logo;

    /**
     * Method to set the value of field CodAula
     *
     * @param integer $CodAula
     * @return $this
     */
    public function setCodAula($CodAula) {
        $this->CodAula = $CodAula;

        return $this;
    }
    function getLogo() {
        return $this->Logo;
    }

    function setLogo($Logo) {
        $this->Logo = $Logo;
    }

        /**
     * Method to set the value of field Nombre
     *
     * @param string $Nombre
     * @return $this
     */
    public function setNombre($Nombre) {
        $this->Nombre = $Nombre;

        return $this;
    }

    /**
     * Returns the value of field CodAula
     *
     * @return integer
     */
    public function getCodAula() {
        return $this->CodAula;
    }

    /**
     * Returns the value of field Nombre
     *
     * @return string
     */
    public function getNombre() {
        return $this->Nombre;
    }

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("guarderia");
        $this->belongsTo('CodAula', '\Nino', 'CodAlum', ['alias' => 'Nino']);
        $this->hasMany('CodAula', 'Nino', 'CodAula', ['alias' => 'Nene']);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'aula';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aula[]|Aula
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aula
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
