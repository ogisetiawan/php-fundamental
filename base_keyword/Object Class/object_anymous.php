<?php
/**
 * Anymous; fungsi yang tidak memilika namanya, dan must diinstance ke var baru //$var=function( ){};
 * Lambda; variabel baru yang dibuat instansinya pada method
 * Closures; pemakaian variabel diluar function tersebut(use $var)
 */
echo "==== Anymous Object ===\r";
$e='Closures';
    $anymous =  //anymous function
    function($a) use ($e) //use closures varibale
	{
	    return $e.$a*10/2;
	};
$anymous2 = $anymous; //anymous function dapat diberi varibel baru.
echo $anymous(6),"\n",$anymous2(200); //lambda variabel;

echo "\n==== Complex Anymous,Closures and scoping ===\r";
class Cart
{
	//contanta property
    const PRICE_BUTTER  = 1.00;
    const PRICE_MILK    = 3.00;
    const PRICE_EGGS    = 6.95;

    protected $products = array();//array untuk simpan data setetlah diset
    public function add($product, $quantity)
    {
        $this->products[$product] = $quantity; //passing ke dalam array()=[element=value]
        echo "$product = $quantity\n";
    }
    
    public function getQuantity($product)
    {
        return isset($this->products[$product]) ? $this->products[$product] : FALSE; //ternary
    }
    
    public function getTotal($tax)
    {
        $total;//total masih kosong
        $callback = //anymous function
            function ($quantity, $product) use ($tax, &$total) //get variabel closures $tax and refrence $total
            {
                $pricePerItem = constant(__CLASS__ . "::PRICE_" .strtoupper($product));//get property harga per-product
                $total += ($pricePerItem * $quantity) * ($tax + 1.0);
            };
        
        array_walk($this->products, $callback);
        return round($total, 0);//round; membulatkan nilai
    }
}

$my_cart = new Cart;

// Add some items to the cart
echo "Barang yang anda beli:\n";
$my_cart->add('butter', 1);
$my_cart->add('milk', 3);
$my_cart->add('eggs', 6);

print "$".$my_cart->getTotal(0.10) . "\n"; //passing method($tax)
