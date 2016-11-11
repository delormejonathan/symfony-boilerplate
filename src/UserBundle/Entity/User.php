<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use JsonSerializable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */
class User extends BaseUser implements JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="firstname", type="string", length=255, nullable=true)
     */
    protected $firstname;

    /**
     * @ORM\Column(name="lastname", type="string", length=255, nullable=true)
     */
    protected $lastname;

    private $fullname;

    public function jsonSerialize()
    {
        return array(
            'id'        => $this->getId(),
            'lastname'  => $this->getLastname(),
            'firstname' => $this->getFirstname(),
            'fullname'  => $this->getFullname(),
        );
    }

    public function getFullname()
    {
        return $this->lastname . ' ' . $this->firstname;
    }
}
