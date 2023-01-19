<?php

namespace App\Services;

use App\DTO\AddressDTO;
use Core\DB;

class SaveAddressService
{
    /**
     * @param AddressDTO $dto
     * @return array
     */
    public function run(AddressDTO $dto): array
    {
        $stmt = (DB::getConnection())->prepare($this->getSlq());

        return [
            'success' => $stmt->execute([
                $dto->addressLine1,
                $dto->addressLine2,
                $dto->city,
                $dto->state,
                $dto->zipCode
            ]),
        ];
    }

    private function getSlq(): string
    {
        return 'INSERT INTO addresses (`address_line_1`, `address_line_2`, `city`, `state`, `zip_code`) VALUES (?, ?, ?, ?, ?)';
    }
}
