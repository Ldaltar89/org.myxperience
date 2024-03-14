Doc: https://www.twilio.com/en-us/blog/get-started-docker-symfony

#### To run the project use

```bash
docker-compose up -d --build
```

#### To enter to the php container use

```bash
docker-compose exec php /bin/bash
```

#### Command to ensure that your setup meets the requiremenst for a Symphony app

```bash
symfony check:requirements
```

> If it meets the requirements, you will see the following output in the terminal.

OK]  
 Your system is ready to run Symfony projects

### Create a new symphony

```bash
symfony new . --version="7.0.*" --webapp
```

#### Add some development dependencies

```bash
composer req --dev maker ormfixtures fakerphp/faker
composer req doctrine twig
composer req form validator
composer req annotations
```

#### Create an env file

```bash
cp .env .env.local
```

#### Add to the env.local the DATABASE_URL

```bash
DATABASE_URL="mysql://root:xxxx@xxxxx:3306/xxxxx?serverVersion=8.0"
```

### Symphony Database commands

#### Create entity

```bash
symfony console make:entity Season
```

#### Create migration to update database

```bash
symfony console make:migration
```

#### To run the migration

```bash
symfony console doctrine:migrations:migrate
composer require stof/doctrine-extensions-bundle
composer require symfony/maker-bundle --dev
composer require form validator security-csrf annotations
```

#### To enter to the database

```bash
docker-compose exec database /bin/bash
mysql -u xperience -p'xp3ri3nc3' xperience
show tables;
```

composer require orm-fixtures --dev

<!-- symfony console make:fixture SeasonFixture -->

symfony console make:controller SeasonController
symfony console make:service SeasonService

#### Clear cache on error 502

```bash
composer run-script cache:clear
```

#### Create form

```bash
symfony console make:form SeasonFormType Season
```
