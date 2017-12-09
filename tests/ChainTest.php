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


    public function testInvalidIndexBlockChain(){
        $chain = new \Blockchain\Chain();

        $firstBlock = new \Blockchain\Block(0, null, time(), 'Example data 1');
        $chain->addBlock($firstBlock);

        $interruptingBlock = new \Blockchain\Block(0, null, time(), 'Example data interrupt');
        $chain->addBlock($interruptingBlock);

        $secondBlock = new \Blockchain\Block(1, $firstBlock->getHash(), time(), 'Example data 2');
        $chain->addBlock($secondBlock);

        $this->assertFalse($chain->isValid());
    }

    public function testInvalidHashBlockChain(){
        $chain = new \Blockchain\Chain();

        $firstBlock = new \Blockchain\Block(0, null, time(), 'Example data 1');
        $chain->addBlock($firstBlock);

        $secondBlock = new \Blockchain\Block(1, 'this is not a valid hash', time(), 'Example data 2');
        $chain->addBlock($secondBlock);

        $this->assertFalse($chain->isValid());
    }

    public function testChangedBlockChain(){
        $chain = new \Blockchain\Chain();

        $firstBlock = new \Blockchain\Block(0, null, time(), 'Example data 1');
        $chain->addBlock($firstBlock);

        $secondBlock = new \Blockchain\Block(1, $firstBlock->getHash(), time(), 'Example data 2');
        $chain->addBlock($secondBlock);

        $firstBlock->setData('Changed data');

        $this->assertFalse($chain->isValid());
    }


}