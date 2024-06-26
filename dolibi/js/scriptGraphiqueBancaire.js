// Tableau des couleurs prédéfinies
const colors = ['#FF5733', '#33FF57', '#5733FF', '#FFFF33', '#33FFFF', '#FF33FF', '#FF5733', '#33FF57', '#5733FF', '#FFFF33']; // Ajoutez autant de couleurs que nécessaire

const ctx = document.getElementById('myChart');
var selectElement = document.getElementById('histoOuCourbe');
var choix = selectElement.value;
// Extrais les données JSON et les stocker dans une variable JavaScript
var donnees = JSON.parse(document.getElementById('donnees').textContent);
var nomBanques = JSON.parse(document.getElementById('donneesBanques').textContent);
var idBanques = JSON.parse(document.getElementById('donneesIdBanques').textContent);
var dates = JSON.parse(document.getElementById('donneesDates').textContent);

// Tableaux pour stocker les dates et les montants par indice

var montantsParIndice = {};
var couleursParIndide = {};

// Parcourir toutes les données
for (var indice in donnees) {
    if (donnees.hasOwnProperty(indice)) {
        montantsParIndice[indice] = [];
        couleursParIndide[indice] = [];
        couleursParIndide[indice].push(colors[indice]);
        var innerObject = donnees[indice];
        for (var key in innerObject) {
            if (innerObject.hasOwnProperty(key)) {
                // Ajouter le montant au tableau correspondant à l'indice
                montantsParIndice[indice].push(innerObject[key].montant);
                
            }
        }
    }
}

// Initialisation des datasetss
var datasets = [];

// Boucle pour générer les datasets
for (var i = 0; i < nomBanques.length; i++) {
    datasets.push({
        label: nomBanques[i],
        data: montantsParIndice[idBanques[i]], 
        borderColor: couleursParIndide[idBanques[i]], // Génère une couleur aléatoire
        borderWidth: 1
    });
}

// Création du graphique avec les datasets générés
// Vous pouvez maintenant utiliser la variable choix pour décider quelle action effectuer
if (choix === 'courbe') {
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: datasets
        }
    });
} 
if (choix === 'histo') {
    new Chart(ctx, {
        type: 'bar',
        data: {
          labels: dates,
          datasets: datasets
        }
    });
}


// Fonction pour générer une couleur aléatoire
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
















