# Installation

The easiest way to run project is using docker and few simple steps:

- ```cd .docker-local```
- ```make build-setup```
- Configure your parameters in ```.env``` file
    - Register [HERE](https://registration.shippingapis.com) and copy the username from the email sent
      after registration to ```USPS_USERNAME```
- ```make build-construct```
- ```make update-project```

This will start the cli-server on port `80`, and bind it to all network interfaces. You can then visit the site
at `http://localhost`

Later you can use commands ```make down``` and ```make up``` to stop and run application.

Use `http://localhost:8080` to access adminer. Enter credentials you set in .env file.
After address saved, it will be stored in database table `addresses`.