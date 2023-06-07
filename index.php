<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">

            $(function() {
                $("#categorie").on("change", function() {
                        if ($(this).val() === "vide") {
                        $("[data-parent]").hide();
                        } else {
                        $("div[data-parent='" + $(this).val() + "']").show().siblings("[data-parent]").hide();
                        }
                    });
                 
                 $( "#target" ).on( "click", function() {
                 alert( "Formulaire effacé" );
                 $("[data-parent]").hide();
                });
            });
</script>
    <title>E-commerce</title>
</head>
<body>
    

    
 <?php
 include_once __DIR__."\class\physic\Product.php";
 include_once __DIR__.'\class\virtual\Product.php';
 include_once __DIR__."\class\physic\Book.php";
 include_once __DIR__."\class\physic\Video.php";
 use Physic\Game as Game;
 use Physic\Book as Book;
 use Virtual\Product as Product;
?>


 <h1>Bienvenue sur votre site de E-commerce!</h1>


 <form action="index.php" method="POST">

    <label for="name">Nom du produit: </label>
    <input id="name" name="name"/>

    <label for="prix_HT">Prix HT: </label>
    <input id="prix_HT" name="prix_HT"/>

    <label for="categorie">Catégorie: </label>
        <select id="categorie" name="categorie">
            <option value="vide" selected="selected">choisissez</option>
            <option value="book">Book</option>
            <option value="Jeu Vidéo">Jeu Vidéo</option>
            <option value="Virtuel">Produit Virtuel</option>
            <!-- <option value="autre">Autre</option> -->
        </select>

    <label for="stock">Stock: </label>
    <input type="number" id="stock" name="stock"/>

    <label for="description">Description: </label>
    <input id="description" name="description"/>
    <input type="reset" class="mybutton2" id="target" value="Reset" name="reset" />

    <div data-parent="book">
        <label for="Author">Auteur(e): </label>
        <input id="Author" name="author"/>

        <label for="Format">Format: </label>
        <select id="Format" name="format">
            <option value="">-- Format? --</option>
            <option value="Poche">Poche</option>
            <option value="Grand">Grand</option>
            <option value="Très grand">Très Grand</option>
         </select>
         <input type="submit" class="myButton" name="submit"/>

    </div>
    <div data-parent="Jeu Vidéo">
        <label for="ageMin">Age: </label>
        <select id="ageMin" name="ageMin">
                <option value="12">12</option>
                <option value="16">16</option>
                <option value="18">18</option>
            </select>
            <input id="ageClient" name="ageClient" placeholder="Age du client"/>
        <label for="type">Type de Jeu: </label>
            <select id="type" name="type">
                <option value="">-- Type? --</option>
                <option value="RPG">RPG</option>
                <option value="FPS">FPS</option>
            </select>
            <input id="critics" name="critics" type="number" min="1" max="5" placeholder="Critique"/>
            <input type="submit" class="myButton" name="submit"/>  
    </div>
    <div data-parent="Virtuel">
        <select id="TVA" name="TVA">
            <option value="">-- TVA --</option>
            <option value="5.5">5.5%</option>
            <option value="20">20%</option>
            <option value="0">Exoneré</option>
         </select>
            <input type="submit" class="myButton" name="submit"/>  
    </div>
    
</form>
<?php 
// si le boutton Submit renvoie le form, alors: 

    if ($_SERVER["REQUEST_METHOD"] === "POST") { 

// détermine si la variable est vide ou pas       
        if (empty($_POST["name"])) {
?>
                     <div><p class="clignote" > Oups, merci de remplir les champs!</p></div>
                <?php }

        else{ 
            // si le choix se porte sur la categorie sur "book"
            if ($_POST["categorie"] == "book"){
            $bookAffiche = new Book(
                $_POST["name"],
                $_POST["prix_HT"], 
                $_POST["categorie"], 
                $_POST["stock"],
                $_POST["description"],
                $_POST["author"],
                $_POST["format"]

            );
?>
                    <div class="tableau">
                    <table id="table">
                        <thead >
                            <tr id="tete">
                                <th scope="col">Nom du Produit : </th>
                                <th scope="col">Prix Hors Taxe : </th>
                                <th scope="col"> TVA : </th>
                                <th scope="col"> Prix TTC : </th>
                                <th scope="col"> Catégorie du produit : </th>
                                <th scope="col"> Stock : </th>
                                <th scope="col"> Valeur du stock : </th>
                                <th scope="col"> Description : </th>
                                <th scope="col"> Auteur : </th>
                                <th scope="col"> Format : </th>
                            </tr>
                        </thead>
                        <tbody>
<?php
            $bookAffiche -> displayBook();
            $bookAffiche -> displayProduct();
            
        }
        // si le choix se porte sur la categorie sur "jeu"
        else if ($_POST["categorie"] == "Jeu Vidéo"){
            $gameAffiche = new Game(
                $_POST["name"],
                $_POST["prix_HT"], 
                $_POST["TVA"], 
                $_POST["categorie"], 
                $_POST["stock"],
                $_POST["description"],
                $_POST["type"],
                $_POST["ageMin"],
                $_POST["critics"],
                $_POST["ageClient"]

            );
            ?>
                    <div class="tableau">
                    <table id="table">
                        <thead >
                            <tr id="tete">
                                <th scope="col">Nom du Produit : </th>
                                <th scope="col">Prix Hors Taxe : </th>
                                <th scope="col"> TVA : </th>
                                <th scope="col"> Prix TTC : </th>
                                <th scope="col"> Catégorie du produit : </th>
                                <th scope="col"> Stock : </th>
                                <th scope="col"> Valeur du stock : </th>
                                <th scope="col"> Description : </th>
                                <th scope="col"> Type : </th>
                                <th scope="col"> Age : </th>
                                <th scope="col"> Moy Critiques : </th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php

            $gameAffiche -> displayProduct();
            
        }
                //si le choix se porte sur la categorie sur "autre"
                else if ($_POST["categorie"] == "Virtuel"){
                     $affiche = new Product(
                        $_POST["name"],
                        $_POST["prix_HT"], 
                        $_POST["TVA"], 
                        $_POST["categorie"], 
                        $_POST["description"] );

            ?>
            <div class="tableau">
            <table id="table">
                <thead >
                    <tr id="tete">
                        <th scope="col">Nom du Produit : </th>
                        <th scope="col">Prix Hors Taxe : </ th>
                        <th scope="col"> TVA : </th>
                        <th scope="col"> Prix TTC : </th>
                        <th scope="col"> Catégorie du produit : </th>
                        <th scope="col"> Description : </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                     $affiche -> displayProduct();
            ?>
                </tbody>
                </table>

            </div>
            <?php
}
}}

 ?>  
 <footer>
   © Copyright Jimmy CL 2023
 </footer>
</body>
</html>