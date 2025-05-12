StayFinder 🏡
StayFinder est une application web de réservation de biens immobiliers. Ce projet a été conçu avec Laravel, Livewire, TailwindCSS, Filament et Breeze, afin de démontrer la mise en œuvre d’un système complet de gestion, de réservation et d’administration.

✨ Fonctionnalités
🔐 Authentification des utilisateurs (Laravel Breeze)

📋 Liste des biens disponibles à la réservation

📅 Réservation de biens avec sélection de dates

👤 Espace utilisateur pour consulter ou annuler ses réservations

🛠️ Interface d'administration (Filament) pour gérer les biens et réservations

🎨 Interface responsive avec Blade + TailwindCSS

🚀 Technologies utilisées
Laravel 10

Laravel Breeze

Livewire

Filament Admin Panel

TailwindCSS

MySQL

Blade

⚙️ Installation du projet
1. Prérequis
Assurez-vous d'avoir installé :

PHP >= 8.1

Composer

Node.js & npm

MySQL

Git

2. Cloner et installer
bash
Copier
Modifier
git clone https://github.com/votre-utilisateur/stayfinder.git
cd stayfinder
composer install
npm install && npm run dev
cp .env.example .env
php artisan key:generate
Configurez votre base de données dans le fichier .env, puis lancez :

bash
Copier
Modifier
php artisan migrate
🔐 Authentification
L’authentification est gérée via Laravel Breeze (version Blade). Les utilisateurs peuvent :

S’inscrire

Se connecter

Accéder à leur espace de réservations

Réserver un bien

Annuler une réservation

🏠 Gestion des biens
Un bien possède :

Un nom

Une description

Un prix par nuit

Une image

Une relation avec les réservations

Extrait de migration :

php
Copier
Modifier
Schema::create('properties', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->text('description');
    $table->decimal('price_per_night', 8, 2);
    $table->timestamps();
});
📆 Réservation avec Livewire
Le composant Livewire permet de :

Choisir une période

Valider la réservation en AJAX

Annuler une réservation sans recharger la page

bash
Copier
Modifier
php artisan make:livewire BookingManager
🧑‍💼 Interface Admin (Filament)
L’espace admin est accessible aux administrateurs et permet de :

Gérer les biens : créer, modifier, supprimer

Gérer les réservations

Visualiser les données de manière simple et efficace

📸 Aperçu du projet
Interface utilisateur :

Admin panel :

Réservation effectuée :

✅ Fonctionnalités restantes à implémenter
Envoi de notifications mail

Gestion des indisponibilités

Règles de validation plus poussées

📤 Livrables
Ce projet répond aux attentes suivantes :

✔️ Authentification fonctionnelle (Breeze)

✔️ Gestion des biens & réservations (CRUD + relations)

✔️ UI utilisateur avec Blade + Tailwind

✔️ Composant Livewire dynamique

✔️ Admin Panel avec Filament

📧 Contact
Développé par Amine Barradouane
📬 amine.barradouane@gmail.com


