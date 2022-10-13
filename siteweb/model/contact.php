<?php
class contact{
	private int $id;
	private string $nom;
	private string $prenom;
	private string $dateN;
	private string $nomC;
	private string $nationalite;

    /**
     * @param int $id
     * @param string $nom
     * @param string $prenom
     * @param string $dateN
     * @param string $nomC
     * @param string $nationalite
     */
    public function __construct(int $id, string $nom, string $prenom, string $dateN, string $nomC, string $nationalite)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateN = $dateN;
        $this->nomC = $nomC;
        $this->nationalite = $nationalite;
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
    public function getDateN(): string
    {
        return $this->dateN;
    }

    /**
     * @param string $dateN
     */
    public function setDateN(string $dateN): void
    {
        $this->dateN = $dateN;
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
    public function getNationalite(): string
    {
        return $this->nationalite;
    }

    /**
     * @param string $nationalite
     */
    public function setNationalite(string $nationalite): void
    {
        $this->nationalite = $nationalite;
    }




}
	
?>