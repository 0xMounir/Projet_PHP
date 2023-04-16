<?php

class User {
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $password;
    private string $birthdate;
    private int $phone;
    private string $country;
    private string $profileImage;

    public function __construct(
        string $lastname,
        string $firstname,
        string $email,
        string $password,
        string $birthdate,
        int $phone,
        string $country,
        string $profileImage,
    ){
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
        $this->birthdate = $birthdate;
        $this->phone = $phone;
        $this->country = $country;
        $this->profileImage = $profileImage;
    }
}