<?php
class specialite
{
    private int $id;
    private string $nomSpe;

        public function __construct(int $id,string $nomSpe)
        {
            $this->id=$id;
            $this->nomSpe= $nomSpe;
        }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNomSpe(): string
    {
        return $this->nomSpe;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $nomSpe
     */
    public function setNomSpe(string $nomSpe): void
    {
        $this->nomSpe = $nomSpe;
    }
}
	
