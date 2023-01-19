# Installation

The easiest way to run project is using docker and few simple steps:

- ```cd .docker-local```
- ```make build-setup```
- (optional) configure your parameters in ```.env``` file
- ```make build-construct```
- ```make update-project```

This will start the cli-server on port `80`, and bind it to all network interfaces. You can then visit the site
at `http://localhost`

Later you can use commands ```make down``` and ```make up``` to stop and run application.

