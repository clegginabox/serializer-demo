<?php

namespace App\Modules\Hcp\Input;

use App\Modules\Common\Input\JsonSerializableInputInterface;

class HcpCreateInput implements JsonSerializableInputInterface
{
    private string $firstName;

    private string $lastName;

    private string $phoneNumber;

    private string $emailPrimary;

    private string $address1;

    private string $address2;

    private string $city;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return HcpCreateInput
     */
    public function setFirstName(string $firstName): HcpCreateInput
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return HcpCreateInput
     */
    public function setLastName(string $lastName): HcpCreateInput
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return HcpCreateInput
     */
    public function setPhoneNumber(string $phoneNumber): HcpCreateInput
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailPrimary(): string
    {
        return $this->emailPrimary;
    }

    /**
     * @param string $emailPrimary
     * @return HcpCreateInput
     */
    public function setEmailPrimary(string $emailPrimary): HcpCreateInput
    {
        $this->emailPrimary = $emailPrimary;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress1(): string
    {
        return $this->address1;
    }

    /**
     * @param string $address1
     * @return HcpCreateInput
     */
    public function setAddress1(string $address1): HcpCreateInput
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress2(): string
    {
        return $this->address2;
    }

    /**
     * @param string $address2
     * @return HcpCreateInput
     */
    public function setAddress2(string $address2): HcpCreateInput
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return HcpCreateInput
     */
    public function setCity(string $city): HcpCreateInput
    {
        $this->city = $city;

        return $this;
    }
}
