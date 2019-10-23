<?php


class recept
{
    private $naam;
    private $medicijnID;
    private $hoeveelheid;
    private $datum;
    private $herhaalrecept;
    private $afgehandeld;

    function __construct()
    {
        $this->medicijnID = filter_var($this->medicijnID, FILTER_SANITIZE_NUMBER_INT);
        $this->datum = new DateTime($this->datum, new DateTimeZone('Europe/Amsterdam'));
        $this->herhaalrecept = filter_var($this->herhaalrecept, FILTER_VALIDATE_BOOLEAN);
        $this->afgehandeld = filter_var($this->afgehandeld, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return mixed
     */
    public function getAfgehandeld()
    {
        return $this->afgehandeld;
    }

    /**
     * @param mixed $afgehandeld
     */
    public function setAfgehandeld($afgehandeld)
    {
        $this->afgehandeld = $afgehandeld;
    }

    /**
     * @return mixed
     */
    public function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param mixed $naam
     */
    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    /**
     * @return mixed
     */
    public function getMedicijnID()
    {
        return $this->medicijnID;
    }

    /**
     * @param mixed $medicijnID
     */
    public function setMedicijnID($medicijnID)
    {
        $this->medicijnID = $medicijnID;
    }

    /**
     * @return mixed
     */
    public function getHoeveelheid()
    {
        return $this->hoeveelheid;
    }

    /**
     * @param mixed $hoeveelheid
     */
    public function setHoeveelheid($hoeveelheid)
    {
        $this->hoeveelheid = $hoeveelheid;
    }

    /**
     * @return mixed
     */
    public function getDatum()
    {
        return $this->datum;
    }

    /**
     * @param mixed $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }

    /**
     * @return mixed
     */
    public function getHerhaalrecept()
    {
        return $this->herhaalrecept;
    }

    /**
     * @param mixed $herhaalrecept
     */
    public function setHerhaalrecept($herhaalrecept)
    {
        $this->herhaalrecept = $herhaalrecept;
    }


}