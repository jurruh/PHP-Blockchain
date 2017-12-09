# PHP Blockchain
This repository contains a basic PHP blockchain implementation.

Example usage:
```php
//Create the chain
$chain = new \Blockchain\Chain();

//Add some blocks to te chain
$firstBlock = new \Blockchain\Block(0, null, time(), 'Example data 1');
$chain->addBlock($firstBlock);

$secondBlock = new \Blockchain\Block(1, $firstBlock->getHash(), time(), 'Example data 2');
$chain->addBlock($secondBlock);

//Check if valid
if($chain->isValid()){
    //The chain is valid
}
```
