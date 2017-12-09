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

        return hash('sha256', json_encode(get_object_vars($this)));

    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getPreviousHash()
    {
        return $this->previousHash;
    }

}