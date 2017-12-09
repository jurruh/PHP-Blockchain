<?php
use PHPUnit\Framework\TestCase;

/**
 * @covers Chain
 */
class ChainTest extends TestCase
{
    public function testValidBlockChain()
    {
        $chain = new \Blockchain\Chain();

        $firstBlock = new \Blockchain\Block(0, null, time(), 'Example data 1');
        $chain->addBlock($firstBlock);

        $secondBlock = new \Blockchain\Block(1, $firstBlock->getHash(), time(), 'Example data 2');
        $chain->addBlock($secondBlock);

        $this->assertTrue($chain->isValid());
    }


    public function testInvalidBlockChain(){
        $chain = new \Blockchain\Chain();

        $firstBlock = new \Blockchain\Block(0, null, time(), 'Example data 1');
        $chain->addBlock($firstBlock);

        $interruptingBlock = new \Blockchain\Block(1, null, time(), 'Example date interrupt');
        $chain->addBlock($interruptingBlock);

        $secondBlock = new \Blockchain\Block(1, $firstBlock->getHash(), time(), 'Example data 2');
        $chain->addBlock($secondBlock);

        $this->assertFalse($chain->isValid());
    }

}