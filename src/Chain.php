<?php
namespace Blockchain;

class Chain
{

    private $blocks = [];

    public function addBlock(Block $block){
        $this->blocks[] = $block;
    }

    public function getBlock($index){
        return $this->blocks[$index];
    }

    public function isValid(){
        $previousHash = null;
        $previousIndex = -1;

        /** @var Block $block */
        foreach($this->blocks as $block){
            if($block->getPreviousHash() !== $previousHash || $previousIndex + 1 != $block->getIndex()){
                return false;
            }

            $previousHash = $block->getHash();
            $previousIndex = $block->getIndex();
        }

        return true;
    }

}