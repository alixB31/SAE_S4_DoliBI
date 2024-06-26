<?php 
/** @var mixed $repartition */
/** @var mixed $soldeTotal */
if (!isset($_SESSION['droitBanque']) || $_SESSION['droitBanque'] == false) {
    header("Location: ../dolibi/index.php");
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">  
        <link rel="stylesheet" href="static\bootstrap-4.6.2-dist\css\bootstrap.css">
        <link rel="stylesheet" href="static\css\common.css">
        <link rel="stylesheet" href="static\fontawesome-free-6.2.1-web/css/all.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
        <title>Gestion Banque</title>
    </head>
    <header>
        <div class ="row">
            <div class ="offset-md-3 offset-sm-4 col-4 d-none d-md-block d-sm-block">
                <hspan class="titre">Doli-BI</hspan>
            </div>
            <div class ="offset-5 col-4 d-md-none d-sm-none">
                <hspan class="titre">Doli-BI</hspan>
            </div> 
            <div class="offset-md-2 offset-sm-1 col-md-2 col-sm-2 d-none d-md-block d-sm-block  ">
                <a href="?controller=UtilisateurCompte&action=deconnexion">
                    <button name="deconnexion" class="btn btn-deco d-none d-md-block d-sm-block">
                        <i class="fa-solid fa-power-off"></i>
                        Déconnexion
                    </button>
                </a>
            </div>
            <div class="col-3">
                <a href="?controller=UtilisateurCompte&action=deconnexion">
                    <button name="deconnexion" class="btn-deco-rond d-md-none d-sm-none">
                        <i class="fa-solid fa-power-off"></i>
                    </button>
                </a>
            </div>
        </div>
    </header>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="menu">
                    <button class="menu-button">Stock</button>
                    <ul class="menu-list">
                    <?php if ($_SESSION['droitStock']){ ?>
                        <li class="rotate-text"><a href="?controller=Stock&action=voirPalmaresFournisseurs" class="active">Palmarès fournisseur</a></li>
                        <li class="rotate-text"><a href="?controller=Stock&action=voirMontantEtQuantiteFournisseurs" class="active">Montant et quantité fournisseur</a></li>
                        <li class="rotate-text"><a href="?controller=Stock&action=voirEvolutionStockArticle" class="active">Évolution stock article</a></li>
                    <?php }else { ?>
                        <li class="rotate-text">Palmarès fournisseur</li>
                        <li class="rotate-text">Montant et quantité fournisseur</li>
                        <li class="rotate-text">Évolution stock article</li>
                    <?php } ?>
                    </ul>
                    <button class="menu-button">Banque</button>
                    <ul class="menu-list">
                    <?php if ($_SESSION['droitBanque']){ ?>
                        <li class="rotate-text"><a href="?controller=Banque&action=voirListeSoldesBancaireProgressif" class="active">Liste des soldes progressifs d'un ou plusieurs comptes bancaires</a></li>
                        <li class="rotate-text"><a href="?controller=Banque&action=voirGraphiqueSoldeBancaire" class="active">Graphique d'évolution des soldes des comptes bancaires</a></li>
                        <li class="rotate-text <?php if (isset($_GET['action']) && $_GET['action'] == 'voirDiagrammeRepartition' || ($_SERVER['REQUEST_METHOD'] == 'POST')) echo 'active'; ?>"><a href="?controller=Banque&action=voirDiagrammeRepartition">Diagramme sectoriel des comptes bancaires</a></li>
                    <?php }else { ?>
                        <li class="rotate-text">Liste des soldes progressifs d'un ou plusieurs comptes bancaires</li>
                        <li class="rotate-text">Graphique d'évolution des soldes des comptes bancaires</li>
                        <li class="rotate-text">Diagramme sectoriel des comptes bancaires</li>
                    <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="row row-gauche">
                <?php
                    $donneesJSON = null;
                    if($repartition != []) {
                        $donneesJSON = json_encode($repartition);
                    }
                ?>
               <div class="chart-container col-md-6" id="graphique">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="col-md-6">
                    <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nom de la banque</th>
                                <th>Solde actuel</th>
                                <th>Pourcentage sur le solde total</th>
                            </tr>
                            <?php
                                $soldeTotal = 0;
                                // Calcul du solde total de toutes les banques
                                foreach ($repartition as $element) {
                                    // Ne prend pas en compte les banques avec un solde négatif ou nul
                                    if ($element['solde'] > 0) {
                                    $soldeTotal += $element['solde'];
                                    $soldeTotal += $element['solde'];
                                            $soldeTotal += $element['solde'];
                                    }
                                }
                                // Calcule du pourcentage de chaque banque
                                foreach ($repartition as $element) {
                                    // Ne prend pas en compte les banques avec un solde négatif ou nul
                                    if ($element['solde'] > 0) {
                                        $pourcentage = ($element['solde'] / $soldeTotal) * 100;
                                    } else {
                                        $pourcentage = 0;
                                    }
                                    echo "<tr>
                                            <td>".$element['banque'].'</td>
                                            <td class="texte-droite">'.number_format(floatval($element['solde']), 2).'</td>
                                            <td class="texte-droite">'.number_format($pourcentage, 2)." %</td>
                                        </tr>";
                                }
                            ?>
                    </table>
                </div>
            <span id="donnees" class="invisible"><?php echo $donneesJSON; ?></span>
            </div>
        </div>
        <script src="js/scriptBanque.js"></script>
    </body>
</html>