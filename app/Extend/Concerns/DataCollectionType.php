<?php

namespace App\Extend\Concerns;

use ReflectionClass;
use ReflectionProperty;
use InvalidArgumentException;

/**
 * Contract for a custom data collection types.
 *
 * Types are added by adding a `type.php` file in the collection directory.
 * The type should return a new anonymous class. While they are currently not checked against this type,
 * it's recommended to extend this class to ensure compatible constructors and utilize automatic deserialization.
 */
abstract class DataCollectionType
{
    /**
     * Automatically construct the data collection type from an array of collection data.
     *
     * @param array<string, mixed> $data Where mixed type is generally scalar or array.
     */
    public function __construct(array $data = [])
    {
        $schema = static::schema();

        foreach ($schema as $key => $type) {
            // Todo: Validate the key against the class properties
            //       - Validate all required properties are set
            //       - Validate properties are set to the correct type
            // Todo: Set nullable properties to null if not set
            // Todo: Add method hooks to run before/after construction

            if (array_key_exists($key, $data)) {
                $this->{$key} = $data[$key];
            } else {
                if (str_starts_with($type, '?')) {
                    $this->{$key} = null;
                } else {
                    throw new InvalidArgumentException(sprintf("Missing required property '%s' for %s.", $key, static::class));
                }
            }
        }
    }

    /**
     * Get the class properties and their types using reflection.
     *
     * @return array<string, 'class-string'|'array'|'bool'|'callable'|'float'|'int'|'null'|'object'|'string'|'false'|'iterable'|'mixed'|'never'|'true'|'void'|'parent'|'self'|'static'> Associative array of property names over their types.
     */
    protected static function schema(): array
    {
        $reflection = new ReflectionClass(static::class);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        $schema = [];

        foreach ($properties as $property) {
            $type = $property->getType()->getName();

            if ($property->getType()->allowsNull()) {
                $type = '?'.$type; // Indicate nullable type
            }

            $schema[$property->getName()] = $type;
        }

        return $schema;
    }
}
