<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Guessers;

use TheDigitalMedium\ApiHelperCommand\Generator\ColumnDefinition;
use TheDigitalMedium\ApiHelperCommand\Generator\Contracts\GuesserInterface;

class FactoryMethodGuesserInterface implements GuesserInterface
{
    public function __construct(private ColumnDefinition $definition)
    {
    }

    public function guess(): string
    {
        if ($this->definition->isEmailType()) {
            return $this->getEmailFactoryMethod();
        }

        if ($this->definition->isEnumType()) {
            return $this->getEnumFactoryMethod();
        }

        return $this->guessByType() . '()';
    }

    private function guessByType(): string
    {
        return match ($this->definition->getType()) {
            'string', 'char' => 'firstName',
            'integer', 'unsignedInteger', 'bigInteger', 'unsignedBigInteger',
            'mediumInteger', 'tinyInteger', 'smallInteger', 'foreignId' => 'randomNumber',
            'boolean' => 'boolean',
            'decimal', 'double', 'float' => 'randomFloat',
            'date', 'dateTime', 'dateTimeTz', 'timestamp', 'timestampTz', 'datetime' => 'dateTime',
            'time', 'timeTz' => 'time',
            'uuid' => 'uuid',
            default => 'text',
        };
    }

    private function getEnumFactoryMethod(): string
    {
        $enumValuesString = "'" . implode("', '", $this->definition->getEnumValues()) . "'";

        return "randomElement([{$enumValuesString}])";
    }

    private function getEmailFactoryMethod(): string
    {
        return 'safeEmail()';
    }
}
