# Divi Child Theme - Antenne Jeunes Gabrielle Dinard

## Thème utilisé

Ce thème enfant est basé sur **Divi** d'Elegant Themes. Il hérite de toutes les fonctionnalités du thème parent tout en permettant des personnalisations spécifiques pour l'Antenne Jeunes de Gabrielle Dinard.

## Installation locale

1. **Prérequis** : WordPress installé avec le thème Divi activé
2. **Upload** : Copier le dossier `divi-child` dans `/wp-content/themes/`
3. **Activation** : Aller dans Apparence > Thèmes et activer "Divi Child"
4. **Configuration** : Le thème est prêt à utiliser

## Personnalisations

### Type de contenu personnalisé
- **Événements** : Type de contenu personnalisé pour gérer les événements de l'antenne
- Accessible via le menu d'administration WordPress
- Support des titres, contenus et images à la une
- **Champ date personnalisé** pour définir la date de l'événement

### Page d'accueil
- Affichage automatique des 6 derniers événements
- Boucle WordPress personnalisée utilisant les fonctions WordPress standards
- Styles CSS intégrés pour une présentation moderne

### Fonctions WordPress utilisées
- **`the_title()`** : Affichage des titres d'événements
- **`the_content()`** : Affichage du contenu des événements
- **`get_posts()`** : Récupération des événements depuis la base de données
- **`wp_enqueue_style()`** : Chargement des styles CSS parent et enfant
- **`get_post_meta()`** : Récupération des métadonnées (date personnalisée)
- **`get_the_date()`** : Affichage des dates de publication

### Fonctions personnalisées
- `divi_child_get_events($limit)` : Récupère les événements avec `get_posts()`
- `divi_child_display_events($limit)` : Affiche les événements formatés
- `divi_child_enqueue_styles()` : Enqueue automatique des styles avec `wp_enqueue_style()`

### Styles
- Import du style Divi parent
- Styles personnalisés pour les sections événements
- Design moderne avec dégradés et effets hover
- Responsive et optimisé pour tous les écrans
