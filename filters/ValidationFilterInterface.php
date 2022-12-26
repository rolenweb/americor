<?php

declare(strict_types=1);

namespace app\filters;

interface ValidationFilterInterface
{
    public function validate();
}