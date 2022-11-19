#!/usr/bin/make
SHELL = /bin/bash
UID := $(shell id -u)
GID := $(shell id -g)
up:
	UID_GID="$(UID):$(GID)" docker compose up -d --build --remove-orphans
down:
	UID_GID="$(UID):$(GID)" docker compose down --remove-orphans
prune:
	UID_GID="$(UID):$(GID)" docker system prune --volumes -a --force
bash:
	docker exec -it -u0 php bash
