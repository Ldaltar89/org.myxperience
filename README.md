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

### Create a new symfony

```bash
symfony new . --version="7.0.*" --webapp
composer require symfony/uid
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

#### Audit fields

```bash
isActive -> boolean -> not null
---
createdAt -> datetime  -> not null
createdBy -> string(100)  -> not null
---
updateddAt -> datetime  -> nulleable
updateddBy -> string(100)  -> nulleable
---
```

#### After creating the entity updated the ID field

```php
  #[ORM\Id]
  #[ORM\GeneratedValue(strategy: 'CUSTOM')]
  #[ORM\Column(type: UuidType::NAME, unique: true)]
  #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
  private ?Uuid $id = null;

  ...

  // Search by getId() and replace it with this
  public function getId(): ?Uuid
  {
    return $this->id;
  }
```

#### Create migration to update database

```bash
symfony console make:migration
```

#### To run the migration

```bash
symfony console doctrine:migrations:migrate
```

```bash
symfony console make:crud Season
```

#### After creating the crud add the default values before persist

```php
// on create method
    if ($form->isSubmitted() && $form->isValid()) {
      //
      $season->setCreatedBy('system');
      $season->setCreatedAt(new \DateTime());
      // ...
    }
// on update method
    if ($form->isSubmitted() && $form->isValid()) {
      $season->setUpdatedBy('system');
      $season->setUpdatedAt(new \DateTime());
      // ...
    }
```

---

#### To enter to the database

```bash
docker-compose exec database /bin/bash
mysql -u xperience -p'xp3ri3nc3' xperience
show tables;
```

<!-- symfony console make:fixture SeasonFixture -->

#### To create Controller

```bash
symfony console make:controller SeasonController
```

#### To create Service

```bash
symfony console make:service SeasonService
```

#### To create Form

```bash
symfony console make:form SeasonFormType Season
```

#### Clear cache

```bash
# composer run-script cache:clear
symfony console cache:clear
```

#### after downloading changes

```bash
composer update
```
