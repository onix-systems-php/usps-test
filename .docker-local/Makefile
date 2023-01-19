-include .env
export $(shell sed 's/=.*//' .env)

.DEFAULT_GOAL := help

PROJECT_DIR ?= /var/www/html/

dc := docker-compose -p $(APP_SLUG)
dr := $(dc) run --rm
de := $(dc) exec
det := $(dc) exec -T

UNAME_S := $(shell uname -s)
ifeq ($(UNAME_S),Darwin)
	dei := $(det)
else
	dei := $(de)
endif

dephp := $(dei) -w "$(PROJECT_DIR)" php

.PHONY: help
help: ## Display help
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' Makefile | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

.PHONY: get-composer-command
get-composer-command: ## COMMON: Get composer command
	@printf "$(dephp) composer "

.PHONY: config
build-setup: ## BUILD: Step1 - Create application configs
	@printf "$$BGreen Create application configs $$ColorOff \n"
	cp -n ../.env.example ../.env || true
	ln -sfn ../.env ./.env
	mkdir -p ./conf/postgres/db-data
	@printf "$$BGreen \n\n Do not forget set passwords in .env file $$ColorOff \n\n"

.PHONY: build
build-construct: ## BUILD: Step2 - Build app containers
	@printf "$$BGreen Build containers (time for a coffee break ☕ !) $$ColorOff \n"
	$(dc) up -d --build
	docker logs -f $(APP_SLUG)-php-1

.PHONY: up
up: ## CONTAINER: Start application
	$(dc) up -d

.PHONY: down
down: ## CONTAINER: Stop application
	$(dc) down

.PHONY: console-php
php-console: ## CONTAINER: Go into php console
	$(de) php /bin/bash

.PHONY: console-web
web-console: ## CONTAINER: Go into web console
	$(de) web /bin/bash

.PHONY: console-db
db-console: ## CONTAINER: Go into db console
	$(de) db /bin/bash

.PHONY: update-project
update-project: ## DEV: Install dependencies
	$(dephp) composer -n install