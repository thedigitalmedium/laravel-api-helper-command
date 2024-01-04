<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Contracts;

interface ClassInfoInterface
{
    public function getNameSpace(): string;

    public function getClassName(): string;
}
