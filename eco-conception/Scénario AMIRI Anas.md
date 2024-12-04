# Jérôme Moly

## Acte métier
Obtenir le prix d'un hôtel ayant au moins 4 étoiles et 9 de note client à Berlin le 31/12/2024 et à moins de 300€ la nuit.

## Solution
Consultation du site [hotels.com](https://fr.hotels.com/)

## Scénario

**Ouvrir le plugin, taper about:blank dans la barre d'adresse, vider le cache, activer les bonnes pratiques**

### Première page : Accueil
1. Arrivée sur la page d'acceuil [page d'acceuil](https://fr.hotels.com/)
2. Taper "Berlin" dans la boite destination
3. Choisir le 31/12/2024 en date d'arrivée et le 01/01/2025 comme date de départ

**Mesure 1**

4. Cliquer sur "Rechercher"

### Deuxième page : Liste
**Mesure 2**

5. Définir le filtre prix maximum à 300€
### 3e page (l'url a changé) : Liste
**Mesure 3**

6. Choisir "Hôtel" comme option d'hébergement

### 4e page (l'url a changé) : Liste
**Mesure 4**

7. Cliquer sur le premier hôtel qui n'est pas une pub et qui a une note > 9
### 5e page : Détail hôtel

8. Défiler pour vérifier les caractéristiques de la chambre. 

**Mesure 5 : C'est une nouvelle fenêtre, réouvrir le plugin mais NE PAS vider le cache !**

9. Si OK fin du scénario. Si pas OK retour en arrière et sélectionner l'hôtel suivant dans la liste.

**FIN**

## Premier run ecoindex
| Mesure | Requêtes | Taille | DOM | Ecoindex | Eau | CO2 | BP Rouges | BP Jaunes | BP Vertes |
|--------|----------|--------|-----|----------|-----|-----|-----------|-----------|-----------|
|       1|       358|    5229| 1653|      9,49| 4,22| 2,81|         13|          0|          8|
|       2|       194|    3340| 8404|      9,76| 4,21| 2,80|         12|          1|          8|
|       3|       302|    4396| 8428|      6.47| 4.31| 2.87|         13|          0|          8|
|       4|       396|    5373| 8427|      5.77| 4.33| 2.88|         13|          0|          8|
|       5|       150|    2492| 2726|     13.89| 4.08| 2.72|         11|          1|          9|

## 2e run ecoindex
| Mesure | Requêtes | Taille | DOM | Ecoindex | Eau | CO2 | BP Rouges | BP Jaunes | BP Vertes |
|--------|----------|--------|-----|----------|-----|-----|-----------|-----------|-----------|
|       1|          |        |     |          |     |     |           |           |           |
|       2|          |        |     |          |     |     |           |           |           |
|       3|          |        |     |          |     |     |           |           |           |
|       4|          |        |     |          |     |     |           |           |           |
|       5|          |        |     |          |     |     |           |           |           |

## 3e run ecoindex
| Mesure | Requêtes | Taille | DOM | Ecoindex | Eau | CO2 | BP Rouges | BP Jaunes | BP Vertes |
|--------|----------|--------|-----|----------|-----|-----|-----------|-----------|-----------|
|       1|          |        |     |          |     |     |           |           |           |
|       2|          |        |     |          |     |     |           |           |           |
|       3|          |        |     |          |     |     |           |           |           |
|       4|          |        |     |          |     |     |           |           |           |
|       5|          |        |     |          |     |     |           |           |           |

