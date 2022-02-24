<?php

namespace BaseModel;


use JetBrains\PhpStorm\Pure;
use NilPortugues\Sql\QueryBuilder\Builder\BuilderInterface;
use NilPortugues\Sql\QueryBuilder\Builder\GenericBuilder;
use ObjectManager\ObjectManagerInterface;
use ObjectManager\ObjectManager;

class BaseModel implements BaseModelInterface
{
    protected ?int $id = null;
    protected BuilderInterface $queryBuilder;
    protected static ?ObjectManagerInterface $manager = null;

    public function __construct()
    {
        $this->queryBuilder = new GenericBuilder();
        return $this;
    }

    public function delete(): string
    {
        if ($this->id) {
            $query = $this->queryBuilder->delete()
                ->setTable($this->className());
            $query
                ->where()
                ->equals('id', $this->id)
                ->end();
            return $this->queryBuilder->write($query);
        }
        throw new \Error('Объкект не удален, т.к нет певичного ключа');
    }

    public function save()
    {
//        echo 'User saved' . PHP_EOL;
    }

    /**
     * @param string $fieldName
     * @param $value
     * @return $this
     */
    public function set(string $fieldName, $value): static
    {
        if ($this->fieldExist($fieldName)) {
            $fieldType = gettype($this->$fieldName);
            var_dump($fieldType);
            if (gettype($value) !== $fieldType) {
                echo 'WARNING: The <' . $fieldName . '> value type does not match the data type of the field "' . $fieldName . '"' . PHP_EOL;
                $value = settype($value, $fieldType);
            }
            $this->$fieldName = $value;
            return $this;
        }
        throw new \Error($fieldName . ' field not in ' . $this->className() . ' model.');
    }

    /**
     * @param $fieldName
     * @return mixed
     */
    public function get($fieldName): mixed
    {
        if ($this->fieldExist($fieldName)) {
            return $this->$fieldName;
        }
        throw new \Error($fieldName . ' field not in ' . $this->className() . ' model.');
    }

    #[Pure] protected function fieldExist($fieldName): bool
    {
        return array_key_exists($fieldName, $this->classVars());
    }

    #[Pure] protected function className(): string
    {
        return get_class($this);
    }

    #[Pure] protected function classVars(): array
    {
        return get_class_vars($this->className());
    }

    public static function manager(): ObjectManagerInterface
    {
        if (!self::$manager) {
            self::$manager = new ObjectManager();
        }
        return self::$manager;
    }
}