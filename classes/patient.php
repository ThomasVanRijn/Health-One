<?php


class patient
{
    private $naam;
    private $id;
    private $geboortedatum;
    private $adres;
    private $email;
    private $telefoonnummer;



    function __construct()
    {
        $this->id = filter_var($this->id, FILTER_SANITIZE_NUMBER_INT);
        $this->geboortedatum = new DateTime($this->geboortedatum, new DateTimeZone('Europe/Amsterdam'));
        $this->telefoonnummer = filter_var($this->telefoonnummer, FILTER_SANITIZE_NUMBER_INT);
    }

    /**
     * @return mixed
     */
    public function getGeboortedatum()
    {
        return $this->geboortedatum;
    }

    /**
     * @param mixed $geboortedatum
     */
    public function setGeboortedatum($geboortedatum)
    {
        $this->geboortedatum = $geboortedatum;
    }

    /**
     * @return mixed
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * @param mixed $adres
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefoonnummer()
    {
        return $this->telefoonnummer;
    }

    /**
     * @param mixed $telefoonnummer
     */
    public function setTelefoonnummer($telefoonnummer)
    {
        $this->telefoonnummer = $telefoonnummer;
    }
    private $verzekeringsnummer;

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