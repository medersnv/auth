<?php

namespace App\Services;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class GetUser
{
    /**
     * @var TokenStorageInterface
     */
    private $storage;


    /**
     * GetUser Constructor
     */
    public function __construct(TokenStorageInterface $storage)
    {
        $this->storage = $storage;
    }

    public function getUser(){
        dump($this->storage->getToken()->getUser());
    }
}