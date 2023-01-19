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

### Create table

```sql
CREATE TABLE addresses
(
    id             INT AUTO_INCREMENT primary key NOT NULL,
    address_line_1 varchar(255) NOT NULL,
    address_line_2 varchar(255) NOT NULL,
    city           varchar(255) NOT NULL,
    state          varchar(255) NOT NULL,
    zip_code       varchar(255) NOT NULL
);
```
