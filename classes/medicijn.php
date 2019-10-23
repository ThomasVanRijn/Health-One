<?php


class medicijn
{
    private $id;
    private $naam;
    private $werking;
    private $bijwerking;
    private $verzekerd;

    function __construct()
    {
        $this->id = filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);
        $this->verzekerd = filter_var($this->verzekerd, FILTER_VALIDATE_BOOLEAN);
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
    public function getWerking()
    {
        return $this->werking;
    }

    /**
     * @param mixed $werking
     */
    public function setWerking($werking)
    {
        $this->werking = $werking;
    }

    /**
     * @return mixed
     */
    public function getBijwerking()
    {
        return $this->bijwerking;
    }

    /**
     * @param mixed $bijwerking
     */
    public function setBijwerking($bijwerking)
    {
        $this->bijwerking = $bijwerking;
    }

    /**
     * @return mixed
     */
    public function getVerzekerd()
    {
        return $this->verzekerd;
    }

    /**
     * @param mixed $verzekerd
     */
    public function setVerzekerd($verzekerd)
    {
        $this->verzekerd = $verzekerd;
    }
}