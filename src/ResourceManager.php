<?php

namespace Nacosvel\TransactionManager;

class ResourceManager
{
    protected mixed $connection;

    public function __construct()
    {
        //
    }

    public function __invoke(mixed $connection): static
    {
        $this->connection = $connection;
        return $this;
    }

    public function getName(): string
    {
        return $this->connection->getName();
    }

    public function beginTransaction(): string
    {
        return 'beginTransaction';
    }

    /**
     * Dynamically pass methods to the default connection.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call(string $method, array $parameters)
    {
        return call_user_func_array([$this->connection, $method], $parameters);
    }

}
