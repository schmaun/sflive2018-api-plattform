<?php

namespace App\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Serializer\Filter\PropertyFilter;

/**
 * Class User
 * @package App\Entity
 *
 * @ApiResource(
 *     collectionOperations={
 *          "get",
 *          "post"={"accessControl"="is_granted('ROLE_ADMIN')"}
 *     },
 *     itemOperations={
 *          "get"
 *     },
 *     normalizationContext={"groups"={"Book:read"}},
 *     denormalizationContext={"groups"={"Book:write"}},
 *     attributes={
 *          "access_control"="is_granted('ROLE_USER')"
 *     }
 * )
 * @ORM\Entity
 */
class User implements UserInterface
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
    protected $id;

    /**
     * @var string
     */
    protected $plainPassword;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $fullName;

    /**
     * @var string
     */
    protected $username;

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    /**
     * Returns the password used to authenticate the user.
     *
     * This should be the encoded password. On authentication, a plain-text
     * password will be salted, encoded, and then compared to this value.
     *
     * @return string The password
     */
    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
