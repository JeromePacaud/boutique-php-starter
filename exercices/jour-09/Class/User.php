<?php

require_once "Address.php";

class User
{
    private string $name;
    private string $email;
    private Datetime $registrationDate;

    /** @var Address[] */
    private array $addresses;

    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
        $this->registrationDate = new DateTime();
    }

    public function addAddress(Address $address): void
    {
        $this->addresses[] = $address;
    }

    //  Getters

    /** @return Address[] */
    public function getAddress(): array
    {
        return $this->addresses;
    }

    public function getDefaultAddress(): Address | null
    {
        if (!empty($this->addresses)) {
            return $this->addresses[0];
        }

        return null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return $this->email;
        }

        return "";
    }

    public function getRegistrationDate(): string
    {
        return $this->registrationDate->format("d-m-Y");
    }
}
