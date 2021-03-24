# Projet dessins dans le navigateur

## Liens utiles
* [SVG](https://www.alsacreations.com/tuto/lire/1421-svg-initiation-syntaxe-outils.html)

## Instructions

1. Créer des classes pour gérer différentes formes et les afficher au format SVG.
Il faudra pouvoir créer des rectangles, triangles, ellipses.
2. Créer une classe pour gérer le conteneur svg (ShapeContainer)
  * Les propriétés suivantes : width, height, shapes (la liste des formes du conteneur)
  * Une méthode addShape qui ajoutera une Shape à la liste des formes du conteneur
  * Une méthode render qui renvoie tout le code html du dessin
    Exemple :
    ```
    <svg width="800" height="600">
        <rect x="100" y="100" width="200" height="150" fill="limegreen" opacity="0.8"></rect>
        <ellipse cx="350" cy="350" rx="40" ry="80" fill="firebrick" opacity="0.7"></ellipse>
    </svg>
    ```

* Créer à chaque fois les constructeurs et getter/setter de chaque classe
* S'il existe des propriétés communes entre chacune des classes, créer une classe mère qui sera héritée par les autres classes
* Créer un autoloader pour charger automatiquement nos classes
* [BONUS] Utiliser les namespaces pour gérer les classes

## La suite

* Créer des formes depuis un formulaire
* Sauvegarder les différentes formes dans des fichiers