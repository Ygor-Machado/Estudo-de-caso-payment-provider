<?php

namespace Beerandcode\Modulo5\Base;

use Psr\Container\ContainerInterface;
use ReflectionClass;

class Container implements ContainerInterface
{
    protected static $instance;
    protected array $services = [];
    public function get(string $id): mixed
    {
        $service = $this->resolve($id);

        return $this->getInstance($service);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }

    /**
     * @throws \ReflectionException
     */
    public function register(string $key, string $target): void
    {
        $target = $target ?? $key;

        $this->services[$key] = new ReflectionClass($target);
    }

    public static function getContainer(): Container
    {
        if(is_null(static::$instance)) {
            static::$instance = new static();
        }

        return static::$instance;
    }
    /**
     * @throws \ReflectionException
     */
    private function resolve(string $key): ReflectionClass
    {
        if($this->has($key)) {
            $service = $this->services[$key];

            if(is_callable($service)) {
                return $service();
            }

            return $service;
        }

        $this->services[$key] = new ReflectionClass($key);

        return $this->services[$key];
    }

    private function getInstance(ReflectionClass $service)
    {
        $constructor = $service->getConstructor();

        if(is_null($constructor) || $constructor->getNumberOfRequiredParameters() === 0) {
            return $service->newInstance();
        }

        $params = [];

        foreach ($constructor->getParameters() as $parameter) {
            if($paramType = $parameter->getType()) {
                $params[] = $this->get($paramType->getName());
            }
        }

        return $service->newInstanceArgs($params);
    }
}