<?php

namespace TheDigitalMedium\ApiHelperCommand\Generator\Contracts;

interface PathResolverInterface
{
    public function folderPath(): string;

    public function fileName(): string;

    public function getFullPath(): string;
}
