.PHONY: qa lint cs csf phpstan

all:
	@awk 'BEGIN {FS = ":.*##"; printf "Usage:\n  make \033[36m<target>\033[0m\n\nTargets:\n"}'
	@grep -h -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[36m%-20s\033[0m %s\n", $$1, $$2}'

# QA

qa: cs phpstan ## Check code quality - coding style and static analysis

lint: ## Check PHP files syntax
	vendor/bin/parallel-lint --blame --colors src

cs: ## Check PHP files coding style
	vendor/bin/phpcs --cache=var/tmp/codesniffer.dat --standard=ruleset.xml --extensions=php,phtml --colors -nsp src

csf: ## Fix PHP files coding style
	vendor/bin/phpcbf --cache=var/tmp/codesniffer.dat --standard=ruleset.xml --extensions=php,phtml --colors -nsp src

phpstan: ## Analyse code with PHPStan
	vendor/bin/phpstan analyse -l 7 -c phpstan.neon src
