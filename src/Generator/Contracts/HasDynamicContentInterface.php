<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Contracts;

interface HasDynamicContentInterface
{
    public function getContent(): array;
}
