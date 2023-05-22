<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactsRepository::class)]
class Contacts

{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    // firstName dans la table contacts (database)

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(
        message : 'Le prénom ne peut pas être vide.'
    )]

    private ?string $firstName = null;

    // lastName dans la table contacts (database)

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(
        message : 'Le nom ne peut pas être vide.'
    )]
    private ?string $lastName = null;

    // email dans la table contacts (database)

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(
        message : 'L\'email ne peut pas être vide.'
    )]

    private ?string $email = null;

    // message dans la table contacts (database)

    #[ORM\Column(type : Types::TEXT)]
    #[Assert\Length(
        min: 2,
        max: 50,
        minMessage: 'Votre message est trop court',
        maxMessage: 'votre message est trop long',
    )]

    private ?string $message = null;

    // objects dans la table contacts (database)

    #[ORM\Column(length: 255)]
    private ?string $object = null;

    // phone dans la table contacts (database)

    #[ORM\Column(length: 10, nullable:true)]
    #[Assert\NotBlank(
        message : 'Le numéro de téléphone ne peut pas être vide.'
    )]

    // function prédéfinie avec 1 msg stipulant de renseigner 1 phone number français 

    #[Assert\Regex('^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$^
    ',
    message : "Veuillez renseigner un numéro de téléphone français"
    )]

    private ?string $phone = null;


    
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(string $object): self
    {
        $this->object = $object;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }
}
