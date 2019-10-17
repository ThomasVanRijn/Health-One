<?php


class patient
{
    private $naam;
    private $id;
    private $verzekeringsnummer;


    function __construct()
    {
        $this->id = filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * @return mixed
     */
    public function getVerzekeringsnummer()
    {
        return $this->verzekeringsnummer;
    }

    /**
     * @param mixed $verzekeringsnummer
     */
    public function setVerzekeringsnummer($verzekeringsnummer)
    {
        $this->verzekeringsnummer = $verzekeringsnummer;
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}