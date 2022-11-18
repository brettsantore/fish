<?php

namespace Santore\Fish;

use Closure;
use Psr\Container\ContainerInterface;
use Santore\Fish\Report\Exception\ServiceNotFound;
use function array_key_exists;

class Container implements ContainerInterface
{
    private array $container;

    public function __construct(array $config)
    {
        foreach ($config as $id => $value) {
            $this->container[ $id ] = $value;
        }
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            throw ServiceNotFound::withId($id);
        }

        $callable = $this->container[$id];

        if ($callable instanceof Closure) {
            return $callable($this);
        }

        $factory = new $callable;

        return $factory($this);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->container);
    }
}