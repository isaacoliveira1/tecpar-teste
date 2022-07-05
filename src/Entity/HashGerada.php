<?php

namespace App\Entity;

use App\Repository\HashGeradaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HashGeradaRepository::class)
 */
class HashGerada
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $data;

    /**
     * @ORM\Column(type="integer")
     */
    private $num;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $chave;

    /**
     * @ORM\Column(type="integer")
     */
    private $tentativas;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $valorEntrada;

    public function __construct(){
        $this->data = new \DateTime('@'.strtotime('now'));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getData(): ?\DateTimeInterface
    {
        return $this->data;
    }

    public function setData(\DateTimeInterface $data): self
    {
        $this->data = $data;

        return $this;
    }

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function setNum(int $num): self
    {
        $this->num = $num;

        return $this;
    }

    public function getChave(): ?string
    {
        return $this->chave;
    }

    public function setChave(string $chave): self
    {
        $this->chave = $chave;

        return $this;
    }

    public function getTentativas(): ?int
    {
        return $this->tentativas;
    }

    public function setTentativas(int $tentativas): self
    {
        $this->tentativas = $tentativas;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getValorEntrada(): ?string
    {
        return $this->valorEntrada;
    }

    public function setValorEntrada(string $valorEntrada): self
    {
        $this->valorEntrada = $valorEntrada;

        return $this;
    }
}
