# Audit RGPD CNIL – Groupe Speed Cloud

## Présentation

Cette application permet de réaliser deux types d’audits RGPD :
- **Audit simplifié** (minimum légal, checklist visuelle, score automatique, rapport imprimable)
- **Audit complet** (formulaire exhaustif, tous champs CNIL, pour une conformité maximale)

Chaque audit est enregistré en base SQLite, avec score, auteur et type d’audit.

## Installation

### Prérequis
- PHP >= 7.4
- Composer
- Extensions PHP : `pdo_sqlite`, `curl`, `json`, `mbstring`
- Un compte Google Cloud pour l’authentification OAuth2

### Étapes

1. **Cloner le dépôt**

```bash
git clone <votre-url-git> && cd rgpdaudit
```

2. **Installer les dépendances**

```bash
composer install
```

3. **Configurer Google OAuth**

- Créez un projet sur [Google Cloud Console](https://console.cloud.google.com/)
- Activez l’API "Google+ API" et créez des identifiants OAuth 2.0
- Renseignez les valeurs dans `config.php` (voir `config.example.php`)

4. **Lancer le serveur local**

```bash
php -S localhost:8000
```

5. **Accéder à l’application**

Ouvrez [http://localhost:8000/audit_choix.php](http://localhost:8000/audit_choix.php)

## Fonctionnalités

- **Audit simplifié** :
    - Checklist visuelle (transparence, données, cookies, sécurité)
    - Score RGPD automatique (0 à 100)
    - Rapport imprimable pour le client
    - Lien vers le guide CNIL
- **Audit complet** :
    - Tous champs CNIL, guidage pour chaque champ
    - Score RGPD automatique
    - Rapport imprimable
- **Stockage** :
    - Tous les audits sont enregistrés en base SQLite (`rgpd_audits.sqlite`)
    - Historique, auteur, type, score, réponses

## Sécurité
- Accès réservé aux utilisateurs Google du domaine `@groupe-speed.cloud`

## Personnalisation
- Vous pouvez adapter les points de la checklist ou les champs du complet dans `audit_form.php`.

---

Pour toute question, contactez l’équipe Groupe Speed Cloud.
