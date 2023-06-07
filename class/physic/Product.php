<?php
namespace Physic;
include_once __DIR__."\..\IProduct.php";
use Interface\IProduct as IProduct ;

abstract class Product implements IProduct{

    protected float $prix_HT;
    public int $TVA;
    protected float $prix_TTC;
    public string $name;
    public string $categorie;
    public int $stock;
    public string $description;

    function __construct( $name, $prix_HT, $TVA, $categorie, $stock, $description)
    {
        $this -> name = $name;
        $this -> prix_HT = $prix_HT;
        $this -> TVA = $TVA;
        $this -> categorie = $categorie;
        $this -> stock = $stock;
        $this -> description = $description;
        
    }
    public function getValo()
    {
        if ($this->stock > 0) { 
        return ($this->stock * $this->prix_HT ."€");  }   
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
        <td scope="row" ><p class="row1" ><?php echo $this -> stock?> restant(s)</p></td>
        <td scope="row" ><p class="row1" ><?php echo $this -> getValo()?></p></td>
        <td scope="row" ><p class="row1" ><?php echo $this -> description?></p></td>
        </tr>
        <?php
    }
    public static  function clone ($affiche, $name){
    return new Product(
        $name,
        $affiche-> getPriceHT(), 
        $affiche-> TVA, 
        $affiche-> categorie, 
        $affiche-> stock,
        "");}
}

