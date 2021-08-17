# book-catalog

## Application for managing the information of a catalog of books

Doctrine command line:

## Update schema

```
php bin/console make:migration
```

```
php bin/console doctrine:migrations:migrate
```

```
php vendor/bin/doctrine orm:schema-tool:update --force
```

## Unit Tests:

```
./vendor/bin/phpunit --colors tests
```

## Test coverage

```
./vendor/bin/phpunit --coverage-text tests
```
