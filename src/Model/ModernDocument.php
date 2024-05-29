<?php

namespace App\Model;

use Pimcore\Model\Document;

final class ModernDocument extends Document
{
    const KEY_PREFIX = 'pimcore';

    public function setKey(string $key): static
    {
        $this->key = self::KEY_PREFIX . $key;

        return $this;
    }

    public function getKey(): string
    {
        return self::KEY_PREFIX . $this->key;
    }
}
