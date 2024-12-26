<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?int $pieces = null;

    #[ORM\Column]
    private ?int $m2 = null;

    #[ORM\Column(length: 255)]
    private ?string $habitation = null;

    #[ORM\Column(length: 255)]
    private ?string $foyer = null;

    #[ORM\Column(type: "json", nullable: true)]
    private ?array $styles = null;

    #[ORM\Column(type: "text")]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPieces(): ?int
    {
        return $this->pieces;
    }

    public function setPieces(int $pieces): self
    {
        $this->pieces = $pieces;
        return $this;
    }

    public function getM2(): ?int
    {
        return $this->m2;
    }

    public function setM2(int $m2): self
    {
        $this->m2 = $m2;
        return $this;
    }

    public function getHabitation(): ?string
    {
        return $this->habitation;
    }

    public function setHabitation(string $habitation): self
    {
        $this->habitation = $habitation;
        return $this;
    }

    public function getFoyer(): ?string
    {
        return $this->foyer;
    }

    public function setFoyer(string $foyer): self
    {
        $this->foyer = $foyer;
        return $this;
    }

    public function getStyles(): ?array
    {
        return $this->styles;
    }

    public function setStyles(?array $styles): self
    {
        $this->styles = $styles;
        return $this;
    }

    public function addStyle(string $style): self
    {
        if (!is_array($this->styles)) {
            $this->styles = [];
        }
        if (!in_array($style, $this->styles)) {
            $this->styles[] = $style;
        }
        return $this;
    }

    public function removeStyle(string $style): self
    {
        if (is_array($this->styles)) {
            $this->styles = array_filter($this->styles, function($s) use ($style) {
                return $s !== $style;
            });
        }
        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;
        return $this;
    }
}
