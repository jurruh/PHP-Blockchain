<?php
namespace Blockchain;


class Block
{
    private $index;

    private $previousHash;

    private $timestamp;

    private $data;

    public function __construct($index, $previousHash, $timestamp, $data)
    {
        $this->index = $index;
        $this->previousHash = $previousHash;
        $this->timestamp = $timestamp;
        $this->data = $data;
    }

    public function getHash(){

        return hash('sha256',json_encode($this));

    }

    /**
     * @return mixed
     */
    public function getPreviousHash()
    {
        return $this->previousHash;
    }

}