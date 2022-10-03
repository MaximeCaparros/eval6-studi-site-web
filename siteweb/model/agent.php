<?php
class agent{
	private int $id ;
	private int $idSpecialite ;
	private string $nom;
	private string $prenom;
	private string $dateN;
	private int $codeId;
	private string $nationalite;

    /**
     * @param int $id
     * @param int $idSpecialite
     * @param string $nom
     * @param string $prenom
     * @param string $dateN
     * @param int $codeId
     * @param string $nationalite
     */
    public function __construct(int $id, int $idSpecialite, string $nom, string $prenom, string $dateN, int $codeId, string $nationalite)
    {
        $this->id = $id;
        $this->idSpecialite = $idSpecialite;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateN = $dateN;
        $this->codeId = $codeId;
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
     * @return int
     */
    public function getIdSpecialite(): int
    {
        return $this->idSpecialite;
    }

    /**
     * @param int $idSpecialite
     */
    public function setIdSpecialite(int $idSpecialite): void
    {
        $this->idSpecialite = $idSpecialite;
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
     * @return int
     */
    public function getCodeId(): int
    {
        return $this->codeId;
    }

    /**
     * @param int $codeId
     */
    public function setCodeId(int $codeId): void
    {
        $this->codeId = $codeId;
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