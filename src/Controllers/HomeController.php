<?php

namespace App\Controllers;

use App\DTO\AddressDTO;
use App\Services\SaveAddressService;
use App\Services\StateService;
use App\Services\ValidateAddressService;
use Core\View\Json;
use Core\View\Template;
use Exception;

class HomeController
{
    /**
     * @return Template
     */
    public function index(): Template
    {
        return new Template('home', [
            'states' => (new StateService())->run(),
        ]);
    }

    /**
     * @return Json
     * @throws Exception
     */
    public function validate(): Json
    {
        return new Json((new ValidateAddressService())->run($this->getAddressDto()));
    }

    public function save(): Json
    {
        return new Json((new SaveAddressService())->run($this->getAddressDto()));
    }

    private function getAddressDto(): AddressDTO
    {
        return new AddressDTO(
            $_POST['address_line_1'],
            $_POST['address_line_2'],
            $_POST['city'],
            $_POST['state'],
            $_POST['zip_code'],
        );
    }
}
