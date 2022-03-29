<?php

namespace App\Service\Grpc\Contracts;

interface ClientFactory
{
    /**
     * @param  string $client
     * @return mixed
     */
    public function make(string $client);
}
