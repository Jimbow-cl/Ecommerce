<?php
namespace Physic;

include_once __DIR__."\Product.php";

class Book extends Product{
    public string $author;
    public string $format;

    public function __construct( $name, $prix_HT, $categorie, $stock, $description, $author, $format)
    {parent::__construct( $name, $prix_HT, 5.5, $categorie, $stock, $description);
        $this -> author = $author;
        $this -> format = $format;

}
public function displayBook()
    {
       ?>
        <tr class="row">
            <td scope="row" ><p class="row1" ><?php echo $this -> name ?></p></td>
            <td scope="row "><span class="row1" ><img class="img2 " src="public/int.png"/></span></td>
            <td scope="row" ><span class="row1" ><img class="img2 " src="public/int.png"/></span></td>
            <td scope="row" ><span class="row1" ><img class="img2 " src="public/int.png"/></span></td>
            <td scope="row" ><span class="row1" ><img class="img2 " src="public/int.png"/></span></td>
            <td scope="row" ><span class="row1" ><img class="img2 " src="public/int.png"/></span></td>
            <td scope="row" ><span class="row1" ><img class="img2 " src="public/int.png"/></span></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> description ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> author ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> format ?></p></td>
        </tr>
        <?php
    }
    public function displayProduct()
    {
       ?>
        <tr class="row">
            <td scope="row" ><p class="row1" ><?php echo $this -> name ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> getPriceHT() ?> €</p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> TVA ?> %</p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> getPriceTTC() ?> €</p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> categorie ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> stock ?> restant</p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> getValo()  ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> description ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> author ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> format ?></p></td>
        </tr>
        <?php
    }
}
