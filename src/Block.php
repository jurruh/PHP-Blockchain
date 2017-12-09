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
     * @param mixed $index
     */
    public function setIndex($index)
    {
        $this->index = $index;
    }

    /**
     * @return mixed
     */
    public function getPreviousHash()
    {
        return $this->previousHash;
    }

    /**
     * @param mixed $previousHash
     */
    public function setPreviousHash($previousHash)
    {
        $this->previousHash = $previousHash;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }


}