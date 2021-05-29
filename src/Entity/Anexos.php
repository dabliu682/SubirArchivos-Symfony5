<?php

namespace App\Entity;

use App\Repository\AnexosRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnexosRepository::class)
 * @ORM\Table(name="archivos.anexos")
 */
class Anexos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $fecha;

    /**
     * @ORM\Column(type="time")
     */
    private $hora;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $anexo1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ext1;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $anexo2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ext2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $anexo3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ext3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $anexo4;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ext4;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->fecha;
    }

    public function setFecha(\DateTimeInterface $fecha): self
    {
        $this->fecha = $fecha;

        return $this;
    }

    public function getHora(): ?\DateTimeInterface
    {
        return $this->hora;
    }

    public function setHora(\DateTimeInterface $hora): self
    {
        $this->hora = $hora;

        return $this;
    }

    public function getAnexo1(): ?string
    {
        return $this->anexo1;
    }

    public function setAnexo1(?string $anexo1): self
    {
        $this->anexo1 = $anexo1;

        return $this;
    }

    public function getExt1(): ?string
    {
        return $this->ext1;
    }

    public function setExt1(?string $ext1): self
    {
        $this->ext1 = $ext1;

        return $this;
    }

    public function getAnexo2(): ?string
    {
        return $this->anexo2;
    }

    public function setAnexo2(?string $anexo2): self
    {
        $this->anexo2 = $anexo2;

        return $this;
    }

    public function getExt2(): ?string
    {
        return $this->ext2;
    }

    public function setExt2(?string $ext2): self
    {
        $this->ext2 = $ext2;

        return $this;
    }

    public function getAnexo3(): ?string
    {
        return $this->anexo3;
    }

    public function setAnexo3(?string $anexo3): self
    {
        $this->anexo3 = $anexo3;

        return $this;
    }

    public function getExt3(): ?string
    {
        return $this->ext3;
    }

    public function setExt3(?string $ext3): self
    {
        $this->ext3 = $ext3;

        return $this;
    }

    public function getAnexo4(): ?string
    {
        return $this->anexo4;
    }

    public function setAnexo4(?string $anexo4): self
    {
        $this->anexo4 = $anexo4;

        return $this;
    }

    public function getExt4(): ?string
    {
        return $this->ext4;
    }

    public function setExt4(?string $ext4): self
    {
        $this->ext4 = $ext4;

        return $this;
    }
}
