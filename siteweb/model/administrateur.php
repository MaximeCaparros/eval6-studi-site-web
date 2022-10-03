<?php
class administrateur{

	private int $id ;
	private string $nom;
	private string $prenom;
	private string $adresseMail;
	private string $mdp;
	private string $dateCrea;

    public function __construct(int $id,string $nom, string $prenom,string $adresseMail,string $mdp,string $dateCrea)
    {
        $this->id=$id;
        $this->nom= $nom;
        $this->prenom=$prenom;
        $this->adresseMail= $adresseMail;
        $this->mdp=$mdp;
        $this->dateCrea= $dateCrea;
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
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getAdresseMail(): string
    {
        return $this->adresseMail;
    }

    /**
     * @param string $adresseMail
     */
    public function setAdresseMail(string $adresseMail): void
    {
        $this->adresseMail = $adresseMail;
    }

    /**
     * @return string
     */
    public function getMdp(): string
    {
        return $this->mdp;
    }

    /**
     * @param string $mdp
     */
    public function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }

    /**
     * @return string
     */
    public function getDateCrea(): string
    {
        return $this->dateCrea;
    }

    /**
     * @param string $dateCrea
     */
    public function setDateCrea(string $dateCrea): void
    {
        $this->dateCrea = $dateCrea;
    }


}
	
?>