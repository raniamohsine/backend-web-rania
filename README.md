# Backend Web

## StudentHub

StudentHub is mijn project voor het vak Backend Web.  
Het is een digitaal platform voor studenten, gemaakt met Laravel.

Op de website kunnen bezoekers nieuwsberichten lezen, FAQ’s bekijken, contact opnemen en publieke studentenprofielen bekijken. Gebruikers kunnen zich registreren, inloggen en hun eigen profiel aanpassen. Een administrator kan de inhoud van de website beheren.

## Wat kan je doen op de website?

- Nieuwsberichten bekijken
- FAQ’s bekijken per categorie
- Een contactformulier invullen
- Publieke studentenprofielen bekijken
- Registreren en inloggen
- Eigen profiel aanpassen
- Als admin nieuws beheren
- Als admin FAQ categorieën en vragen beheren
- Als admin gebruikers beheren
- Als admin rechten geven of verwijderen

## Technische onderdelen

Voor dit project heb ik gewerkt met Laravel en de MVC-structuur.

Ik heb gebruikgemaakt van:

- routes
- controllers
- models
- Blade views
- migrations
- seeders
- Eloquent relaties
- middleware
- validatie
- Laravel Breeze voor authenticatie

Het project bevat ook verschillende relaties tussen tabellen, zoals gebruikers met profielen, FAQ categorieën met vragen en gebruikers met interesses.

## Admin account

Na het uitvoeren van de seeders is er een standaard admin account:

```text
Email: admin@ehb.be
Password: Password!321
```

## Installatie

Voer deze commando’s uit om het project lokaal te starten:

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link
npm run dev
php artisan serve
```

Daarna kan de website geopend worden via:

```text
http://127.0.0.1:8000
```

## Tools

Tijdens het maken van dit project heb ik deze tools gebruikt:

- Visual Studio Code
- Laravel
- PHP
- Laravel Breeze
- Composer
- NPM
- Blade
- Eloquent
- GitHub
- GitHub Desktop
- Laravel Herd / lokale PHP omgeving

## Gebruik van AI

Ik heb ChatGPT gebruikt als hulpmiddel tijdens het project.

ChatGPT heeft mij geholpen bij het verbeteren van taalfouten, het begrijpen van foutmeldingen en het controleren van de structuur.  
De code werd door mij stap voor stap opgebouwd, aangepast, getest en gepusht.

## Bronnen

Voor dit project heb ik gebruikgemaakt van:

- cursusmateriaal Backend Web
- Laravel documentatie
- Laravel Breeze documentatie
- eigen testen tijdens het programmeren
- ChatGPT als ondersteuning voor taalcorrectie en verduidelijking

## Auteur

Rania Mohsine