.PHONY: qa lint cs csf phpstan

all:
	@$(MAKE) -pRrq -f $(lastword $(MAKEFILE_LIST)) : 2>/dev/null | awk -v RS= -F: '/^# File/,/^# Finished Make data base/ {if ($$1 !~ "^[#.]") {print $$1}}' | sort | egrep -v -e '^[^[:alnum:]]' -e '^$@$$' | xargs

vendor: composer.json composer.lock
	composer install

# QA

qa: cs phpstan

lint: vendor
	vendor/bin/parallel-lint --blame --colors src

cs: vendor
	vendor/bin/phpcs --cache=tmp/codesniffer.dat --standard=ruleset.xml --colors -nsp src

csf: vendor
	vendor/bin/phpcbf --cache=tmp/codesniffer.dat --standard=ruleset.xml --colors -nsp src

phpstan: vendor
	vendor/bin/phpstan analyse -l 7 -c phpstan.neon src
