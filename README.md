# StayFinder 🏡

StayFinder est une application web de réservation de biens immobiliers, conçue pour offrir à la fois une expérience fluide pour le visiteur et un back-office complet pour l’administrateur.  

---

## ✨ Fonctionnalités principales

- **Exploration de biens**  
  Affichage d’une grille responsive de cartes de propriétés (image, titre, description courte, prix à la nuit).  

- **Réservation**  
  Formulaire de réservation intégré à la page, avec validation des dates.  

- **Mes Réservations**  
  Espace utilisateur pour consulter, accéder au détail et annuler ses réservations.  

- **Administration des biens**  
  CRUD complet des propriétés (titre, description, prix, image) via un panel Filament sécurisé.  

---

## 🚀 Architecture et composants

### Modèles (Eloquent)

- **Property**  
  Définit un bien avec :  
  - `name`, `description`, `price_per_night`, `image`  
  - Mass-assignment autorisé via `$fillable`  
  - Casting du prix en `float`  

- **Booking**  
  Représente une réservation :  
  - `user_id`, `property_id`, `start_date`, `end_date`  
  - Relations `user()` et `property()`  
  - Conversion des dates en objets Carbon via `$casts`  

- **User**  
  Utilisateur Breeze + booléen `is_admin` pour l’accès admin.  
  Relation `bookings()` pour retrouver ses réservations.  

### Routes & Contrôleurs

- **Front public**  
  - `/` → `PropertyController@index` (liste)  
  - `/properties/{property}` → `PropertyController@show` (détail)  

- **Réservation (auth)**  
  - `GET  /properties/{property}/bookings/create` → formulaire (`BookingController@create`)  
  - `POST /properties/{property}/bookings`       → enregistrement (`BookingController@store`)  

- **Mes Réservations (auth)**  
  - `GET    /bookings`           → liste (`BookingController@index`)  
  - `DELETE /bookings/{booking}` → annulation (`BookingController@destroy`)  

- **Admin (auth + is_admin)**  
  Filament se charge des routes `/admin/...` pour la gestion des biens.  

### Vues & Composants Blade

- **Layout principal**  
  Header fixe, navigation adaptative (visiteur/utilisateur/admin), contenu central, footer épuré.  

- **Composant `<x-button>`**  
  Générique, prend en charge `<a>` ou `<button>`, props `href`, `color`, `type`.  

- **Composant `<x-property-card>`**  
  Carte de bien : image, titre, description tronquée, prix, bouton “Réserver”.  

- **Pages de réservation**  
  - `bookings/create.blade.php` : injection du composant Livewire `<livewire:booking-manager>`.  
  - `bookings/index.blade.php` : affichage des réservations de l’utilisateur.  

### Back-office Filament

- **Resource Property**  
  - Formulaire : champs `name`, `description`, `price_per_night`, upload d’`image`.  
  - Table : colonnes vignettes, nom, tarif.  
- **Sécurité**  
  Gate `viewFilament` (utilisateur `is_admin`), guard `web` de Breeze.  

### Interactivité Livewire

- **Composant `BookingManager`**  
  - Propriétés : `$property`, `$start_date`, `$end_date`  
  - Validation en temps réel, soumission AJAX, redirection vers “Mes Réservations”.  

---

## 📤 Livrables

- Code source complet (controllers, models, vues, composants, resources Filament, composant Livewire)  
- Documentation (ce README) décrivant chaque partie  
- UI fonctionnelle pour visiteur, utilisateur et admin  

---

## 📧 Auteur

**Amine Barradouane**  
amine.barradouane@gmail.com  


