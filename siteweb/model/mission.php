<?php
class mission{
	private int $id;
    private int $idCible;
    private int $idAgent;
    private int $idContact;
    private int $idPlanque;
    private string $titre;
    private string $descr;
    private string $nomC;
    private string $pays;
    private string $typeMission;
    private string $statut;
    private int $specialite;
    private string $dateDebut;
    private string $dateFin;

    /**
     * @param int $id
     * @param int $idCible
     * @param int $idAgent
     * @param int $idContact
     * @param int $idPlanque
     * @param string $titre
     * @param string $descr
     * @param string $nomC
     * @param string $pays
     * @param string $typeMission
     * @param string $statut
     * @param int $specialite
     * @param string $dateDebut
     * @param string $dateFin
     */
    public function __construct(int $id, int $idCible, int $idAgent, int $idContact, int $idPlanque, string $titre, string $descr, string $nomC, string $pays, string $typeMission, string $statut, int $specialite, string $dateDebut, string $dateFin)
    {
        $this->id = $id;
        $this->idCible = $idCible;
        $this->idAgent = $idAgent;
        $this->idContact = $idContact;
        $this->idPlanque = $idPlanque;
        $this->titre = $titre;
        $this->descr = $descr;
        $this->nomC = $nomC;
        $this->pays = $pays;
        $this->typeMission = $typeMission;
        $this->statut = $statut;
        $this->specialite = $specialite;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdCible(): int
    {
        return $this->idCible;
    }

    /**
     * @param int $idCible
     */
    public function setIdCible(int $idCible): void
    {
        $this->idCible = $idCible;
    }

    /**
     * @return int
     */
    public function getIdAgent(): int
    {
        return $this->idAgent;
    }

    /**
     * @param int $idAgent
     */
    public function setIdAgent(int $idAgent): void
    {
        $this->idAgent = $idAgent;
    }

    /**
     * @return int
     */
    public function getIdContact(): int
    {
        return $this->idContact;
    }

    /**
     * @param int $idContact
     */
    public function setIdContact(int $idContact): void
    {
        $this->idContact = $idContact;
    }

    /**
     * @return int
     */
    public function getIdPlanque(): int
    {
        return $this->idPlanque;
    }

    /**
     * @param int $idPlanque
     */
    public function setIdPlanque(int $idPlanque): void
    {
        $this->idPlanque = $idPlanque;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDescr(): string
    {
        return $this->descr;
    }

    /**
     * @param string $descr
     */
    public function setDescr(string $descr): void
    {
        $this->descr = $descr;
    }

    /**
     * @return string
     */
    public function getNomC(): string
    {
        return $this->nomC;
    }

    /**
     * @param string $nomC
     */
    public function setNomC(string $nomC): void
    {
        $this->nomC = $nomC;
    }

    /**
     * @return string
     */
    public function getPays(): string
    {
        return $this->pays;
    }

    /**
     * @param string $pays
     */
    public function setPays(string $pays): void
    {
        $this->pays = $pays;
    }

    /**
     * @return string
     */
    public function getTypeMission(): string
    {
        return $this->typeMission;
    }

    /**
     * @param string $typeMission
     */
    public function setTypeMission(string $typeMission): void
    {
        $this->typeMission = $typeMission;
    }

    /**
     * @return string
     */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /**
     * @param string $statut
     */
    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    /**
     * @return string
     */
    public function getSpecialite(): string
    {
        return $this->specialite;
    }

    /**
     * @param string $specialite
     */
    public function setSpecialite(string $specialite): void
    {
        $this->specialite = $specialite;
    }

    /**
     * @return string
     */
    public function getDateDebut(): string
    {
        return $this->dateDebut;
    }

    /**
     * @param string $dateDebut
     */
    public function setDateDebut(string $dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return string
     */
    public function getDateFin(): string
    {
        return $this->dateFin;
    }

    /**
     * @param string $dateFin
     */
    public function setDateFin(string $dateFin): void
    {
        $this->dateFin = $dateFin;
    }




}
	
?>