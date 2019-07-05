test:
	composer run test
generate-key:
	composer run post-autoload-dump
	composer run post-root-package-install
	composer run post-create-project-cmd
lint:
	composer run codesniffer
migration:
	php artisan migrate
