<?php
namespace Physic;
include_once __DIR__."\Product.php";


class Game extends Product{
    public string $type;
    public int $ageMin;
    public string $critics;
    public int $ageClient;

    public function __construct($name, $prix_HT, $TVA, $categorie, $stock, $description, $type, $ageMin, $critics, $ageClient)
    {parent::__construct( $name, $prix_HT, 20, $categorie, $stock, $description);
        $this -> type = $type;
        $this -> ageMin = $ageMin;
        $this -> critics = $critics;
        $this -> ageClient = $ageClient;

}
public function verifAge() {
    if (($this -> ageClient) >= ($this -> ageMin)) {
         return "<span class=\"achatok\">Achat possible, (PEGI ".$this -> ageMin.")</span>";}
    
    else
    {return "<span class=\"achatnok\">Achat impossible, Trop jeune (PEGI ".$this -> ageMin.")</span>";}
}

    public function displayProduct()
    {
       ?>
        <tr class="row ">
            <p><?php echo $this ->verifAge() ?></p> 
            <td scope="row" ><p class="row1" ><?php echo $this -> name ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> getPriceHT() ?> €</p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> TVA ?> %</p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> getPriceTTC() ?> €</p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> categorie?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> stock ?> restant(s)</p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> getValo() ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> description ?></p></td>
            <td scope="row" ><p class="row1" ><?php echo $this -> type ?></p></td>
            <td scope="row" ><p class="<?php echo $this -> ageMin?>" >PEGI <?php echo $this -> ageMin ?></p></td>
            <td scope="row" ><img class="row1 rate" src="public/<?php echo $this -> critics ?>.png" /></td>
        </tr>
        <?php
    }
}
