# Gestion du Parc Informatique

Application web Laravel permettant de gérer le matériel informatique d'une organisation avec deux rôles : **Administrateur** et **Employé**.

## 🚀 Fonctionnalités

- Authentification (Laravel Breeze)
- Gestion des utilisateurs et des rôles (Admin / Employé)
- Gestion des équipements (claviers, souris, écrans, etc.)
- Suivi de l'historique d’utilisation des équipements
- Gestion des demandes d'articles par les employés
- Interface responsive avec SASS et Bootstrap
- Notifications et statuts de demande

## 📁 Structure du projet

- `app/Models` : Modèles Eloquent (User, Equipement, Demande, etc.)
- `database/migrations` : Migrations pour les tables
- `resources/views` : Vues Blade (interface utilisateur)
- `routes/web.php` : Routes de l'application
- `resources/sass/app.scss` : Style global en SASS

## ⚙️ Installation

### 1. Cloner le projet

```bash
git clone https://github.com/votre-utilisateur/gestion-parc-informatique.git
cd gestion-parc-informatique
