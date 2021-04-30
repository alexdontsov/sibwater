include .env
export

COMPOSE :=
USE_DOCKER_SYNC := NO

ifeq ($(OS),Windows_NT)
	COMPOSE := docker-compose
else
	UNAME_S := $(shell uname -s)
	COMPOSE := docker-compose

	ifeq ($(UNAME_S),Darwin)
		ifeq ($(shell which docker-sync),)
		else
			USE_DOCKER_SYNC := YES
		endif
	endif
endif

.DEFAULT_GOAL := help

#COLORS
GREEN  := $(shell tput -Txterm setaf 2)
WHITE  := $(shell tput -Txterm setaf 7)
YELLOW := $(shell tput -Txterm setaf 3)
RESET  := $(shell tput -Txterm sgr0)

# Add the following 'help' target to your Makefile
# And add help text after each target name starting with '\#\#'
# A category can be added with @category
HELP_FUN = \
    %help; \
    while(<>) { push @{$$help{$$2 // 'options'}}, [$$1, $$3] if /^([a-zA-Z\-]+)\s*:.*\#\#(?:@([a-zA-Z\-]+))?\s(.*)$$/ }; \
    print "usage: make [target]\n\n"; \
    for (sort keys %help) { \
    print "${WHITE}$$_:${RESET}\n"; \
    for (@{$$help{$$_}}) { \
    $$sep = " " x (32 - length $$_->[0]); \
    print "  ${YELLOW}$$_->[0]${RESET}$$sep${GREEN}$$_->[1]${RESET}\n"; \
    }; \
    print "\n"; }

.PHONY: cc
cc: ##@app Clear and warmup cache
	$(COMPOSE_RUN_SF) "rm -rf var/cache/* && php bin/console cache:warmup"