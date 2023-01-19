<?php

namespace App\DTO;

class AddressDTO
{
    public function __construct(
        public string $addressLine1,
        public string $addressLine2,
        public string $city,
        public string $state,
        public string $zipCode,
    ) {
    }
}
