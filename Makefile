# Makefile for running PHPUnit tests

# Name of the PHPUnit executable
PHPUNIT = ./vendor/bin/phpunit

# Directory where your test files are located
TEST_DIR = tests

# Run all PHPUnit tests
all_tests:
	$(PHPUNIT) $(TEST_DIR)

# Help target: Display available targets
help:
	@echo "Available targets:"
	@echo "  all_tests       Run all PHPUnit tests"
	@echo "  help       Display this help message"

.PHONY: test help
