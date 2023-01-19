<?php

namespace App\Services;

use App\DTO\AddressDTO;
use Exception;
use USPS\Address;
use USPS\AddressVerify;

class ValidateAddressService
{
    /**
     * @param AddressDTO $dto
     * @return array
     * @throws Exception
     */
    public function run(AddressDTO $dto): array
    {
        return [
            'original' => $this->getOriginalAddress($dto),
            'usps' => $this->getUSPSAddress($dto),
        ];
    }

    /**
     * @param AddressDTO $dto
     * @return array[]
     */
    private function getOriginalAddress(AddressDTO $dto): array
    {
        return [
            'Address1' => $dto->addressLine1,
            'Address2' => $dto->addressLine2,
            'City' => $dto->city,
            'State' => $dto->state,
            'Zip5' => $dto->zipCode,
        ];
    }

    /**
     * @param AddressDTO $dto
     * @return array
     * @throws Exception
     */
    private function getUSPSAddress(AddressDTO $dto): array
    {
        $verify = new AddressVerify($_ENV['USPS_USERNAME']);

        $address = new Address();
        $address->setApt($dto->addressLine1);
        $address->setAddress($dto->addressLine2);
        $address->setCity($dto->city);
        $address->setState($dto->state);
        $address->setZip5($dto->zipCode);
        $address->setZip4('');

        $verify->addAddress($address);
        $verify->verify();
        $response = $verify->getArrayResponse();

        if (!empty($response['AddressValidateResponse']['Address']) && $verify->isSuccess()) {
            return $response['AddressValidateResponse']['Address'];
        }

        throw new Exception('Address is not valid');
    }
}
