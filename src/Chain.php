<?php
namespace Blockchain;

class Chain
{

    private $blocks = [];

    public function addBlock(Block $block){
        $this->blocks[] = $block;
    }

    public function isValid(){
        $previousHash = null;

        /** @var Block $block */
        foreach($this->blocks as $block){
            if($block->getPreviousHash() !== $previousHash){
                return false;
            }

            $previousHash = $block->getHash();
        }

        return true;
    }

}