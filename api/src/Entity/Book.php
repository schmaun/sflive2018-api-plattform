<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;

/**
 * Class Book
 * @package App\Entity
 * @ApiResource(
 *     collectionOperations={
 *          "get",
 *          "post"
 *     },
 *     normalizationContext={"groups"={"Book:read"}},
 *     denormalizationContext={"groups"={"Book:write"}},
 *     itemOperations={"get"}
 * )
 * @ApiFilter(SearchFilter::class, properties={"title": "partial"})
 * @ApiFilter(PropertyFilter::class)
 * @ORM\Entity
 */
class Book
{

    /**
     * @ApiProperty(identifier=true)
     * @Groups({"Book:read", "Book:write"})
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $id;

    /**
     * @ApiProperty(iri="http://schema.org/name")
     * @Groups({"Book:read", "Book:write"})
     *
     * @ORM\Column
     *
     * @var string
     */
    private $title;

    /**
     * @Groups({"Book:read", "Book:write"})
     * @ORM\Column
     * @var string
     */
    private $description;

    /**
     * @ApiProperty(iri="http://schema.org/Author")
     * @Groups({"Book:read", "Book:write"})
     * @ORM\OneToOne(targetEntity=Author::class)
     *
     * @var Author
     */
    private $author;

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Book
     */
    public function setTitle(string $title): Book
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Book
     */
    public function setDescription(string $description): Book
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @param Author $author
     * @return Book
     */
    public function setAuthor(Author $author): Book
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }
}