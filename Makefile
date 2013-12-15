PROJECT = "Time Tracker"

all: 
	@ echo "Preparing '${PROJECT}'";
	
	@ echo "  - Checking 'bin'";
	@ if ! [ -d bin ]; then \
		mkdir bin; \
	fi

	@ echo "  - Checking 'bin/composer.phar'";
	@ if ! [ -f bin/composer.phar ]; then \
		curl -s https://getcomposer.org/installer | php -- --install-dir=bin; \
		php bin/composer.phar install; \
	fi

test:
	@ echo "Unit Testing '${PROJECT}'";
	bin/phpunit  && bin/behat -f progress;

coverage:
	@ echo "Generating Code Coverage for '${PROJECT}'"; \
	bin/phpunit --coverage-html=coverage;