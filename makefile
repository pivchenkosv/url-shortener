test:
	composer run test
generate-key:
	composer run post-autoload-dump
	composer run post-root-package-install
	composer run post-create-project-cmd
codesniffer:
	composer run codesniffer
