<?php

require_once 'Address.php';

class User
{
    private string $name;
    private string $email;
    private string $role;
    private string $password;
    private DateTime $registrationDate;

    /** @var Address[] */
    private array $addresses = [];

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

    /**
     * @return Address[]
     */
    public function getAddresses(): array
    {
        return $this->addresses;
    }

    public function getDefaultAddress(): ?Address
    {
        return $this->addresses[0] ?? null;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getRegistrationDate(): string
    {
        return $this->registrationDate->format('d/m/Y H:i');
    }
}
