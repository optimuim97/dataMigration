# UNITECH MIGRATION

# TRAITER LES DONNÉES REÇU

    - Rendre convertir les données afin de permettre la soumission a l'API de création du compte APAYM et  API d'Apaym PRO.

# METTRE EN PLACE UNE API QUI PERMET DE FAIRE LA MIGRATIONS DES DONNÉES

## Si l'utilisateur a déjà un COMPTE APAYM

    - Garder les données de l'utilisateur dans une table (temporaires)
    - Permettre un merge sur une interface, à partir des données recueillir dans la table temporaire

    - Vérifier si l'utilisateur a un COMPTE APAYM PRO (à partir du registre de commerce, ou d'identifiants d'un compte APAYM PRO)
        Si le compte existe
            - Garder les données du business dans une table (temporaires)
            - Permettre un merge sur une interface, à partir des données recueillir dans la table temporaire
        Sinon
            - Créer un autre COMPTE APAYM PRO
            - Notifier l'utilisateur de la création de son COMPTE avec les informations lui permettant d'accéder à son espace APAYM PRO

## Si l'utilisateur n'existe pas dans la base de données

    - Créer son COMPTE APAYM
    - Notifier l'utilisateur de la création de son COMPTE APAYM
    - Utiliser l'API de changement de Design de carte afin d'appliquer le DESIGN DE LA CARTE DU COMMERCANT sur la carte APaym Ecobank CI

    - Vérifier si l'utilisateur a un COMPTE APAYM PRO (à partir du Registre de commerce, ou d'identifiants d'un compte APAYM PRO)
        Si le compte existe
            - Garder les données du business dans une table (temporaires)
            - Permettre un merge sur une interface, à partir des données recueillir dans la table temporaire
        Sinon
            - Créer un autre COMPTE APAYM PRO
            - Notifier l'utilisateur de la création de son COMPTE APAYM avec les informations lui permettant d'acceder a son espace sur APAYM PRO

## Definir les données retourner à UNITECH après chaque actions

# CONSOLE WEB

    - Permettant d'effectuer les fusions
    - Voir les différents ajouts

# BESOIN
    - Les données reçues de UNITECH
    - API Création de COMPTE APAYM
        Savoir Comment le changement de DESIGN de la carte d'effectuer et à quel moment. (Sachant ce qu'il s'agit d'une API)

    - API de Création de COMPTE APAYM PRO

# PARAMS
    Les Parametre required Apaym



