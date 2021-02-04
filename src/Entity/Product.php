<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProductRepository;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 * @UniqueEntity(
 *      "code",
 *      message="Este codigo ya esta en uso"
 * )
 * @UniqueEntity(
 *      "name",
 *      message="Este nombre ya esta en uso"
 * )
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message = "Este campo no puede estar vacío")
     * @Assert\Length(
     *      min = 4,
     *      max = 10,
     *      minMessage = "El codigo debe tener almenos {{ limit }} caracteres",
     *      maxMessage = "El codigo no debe ser superio a  {{ limit }} caracteres"
     * )
     * @Assert\Type(
     *     type="alnum",
     *     message="El código solo puede contener caracteres alfanuméricos"
     * )
     */
    private $code;

    /**
     * @ORM\Column(type="string", length=255)
     * * @Assert\NotBlank(message = "Este campo no puede estar vacío")
     * @Assert\Length(
     *      min = 4,
     *      minMessage = "El nombre debe tener almenos {{ limit }} caracteres",
     * )
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message = "Este campo no puede estar vacío")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     * * @Assert\NotBlank(message = "Este campo no puede estar vacío")
     */
    private $brand;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     * * @Assert\NotBlank(message = "Este campo no puede estar vacío")
     */
    private $category;

    /**
     * @ORM\Column(type="float")
     * @Assert\NotBlank(message = "Este campo no puede estar vacío")
     * @Assert\Positive(message = "El costo del producto debe ser positivo y diferente de cero")
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): self
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
