<?php
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class Book
 * @package App\Entity
 * @ApiResource(
 *     collectionOperations={
 *          "get",
 *          "post"
 *     },
 *     itemOperations={
 *          "get"
 *     },
 *     normalizationContext={"groups"={"Book:read"}},
 *     denormalizationContext={"groups"={"Book:write"}}
 * )
 */
class Book
{

    /**
     * @ApiProperty(identifier=true)
     * @Groups({"Book:read", "Book:write"})
     * @var int
     */
    private $id;

    /**
     * @ApiProperty(iri="http://schema.org/name")
     * @Groups({"Book:read", "Book:write"})
     * @var string
     */
    private $title;

    /**
     * @Groups({"Book:read"})
     * @var string
     */
    private $description;

    /**
     * @Groups({"Book:read", "Book:write"})
     * @var Author
     */
    private $author;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Book
     */
    public function setId(int $id): Book
    {
        $this->id = $id;
        return $this;
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