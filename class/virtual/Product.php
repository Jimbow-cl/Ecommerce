<?php
namespace Virtual;
include_once __DIR__."\..\IProduct.php";
use Interface\IProduct as IProduct ;

 class Product implements IProduct{

    protected float $prix_HT;
    public int $TVA;
    protected float $prix_TTC;
    public string $name;
    public string $categorie;
    public string $description;

    function __construct( $name, $prix_HT, $TVA, $categorie, $description)
    {
        $this -> name = $name;
        $this -> prix_HT = $prix_HT;
        $this -> TVA = $TVA;
        $this -> categorie = $categorie;
        $this -> description = $description;
        
    }

    public function getPriceHT()
    {
       return( $this -> prix_HT);
    }


    public function getPriceTTC()
    {
       return($this -> prix_TTC = ($this -> prix_HT * (1+($this -> TVA/100))));
    }
    
    public function displayProduct()
    {
       ?> 
       <tr class="row">
       <td scope="row" ><p class="row1" ><?php echo $this -> name?></p></td>
        <td scope="row" ><p class="row1" ><?php echo $this -> getPriceHT()?> €</p></td>
        <td scope="row" ><p class="row1" ><?php echo $this -> TVA?> %</p></td>
        <td scope="row" ><p class="row1" ><?php echo $this -> getPriceTTC()?> €</p></td>
        <td scope="row" ><p class="row1" ><?php echo $this -> categorie?></p></td>
        <td scope="row" ><p class="row1" ><?php echo $this -> description?></p></td>
        </tr>
        <?php
    }
}

