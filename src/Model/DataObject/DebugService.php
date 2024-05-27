<?php

namespace App\Model\DataObject;

use Pimcore\Bundle\ApplicationLoggerBundle\ApplicationLogger;
use Pimcore\Model\DataObject\Service;

class DebugService extends Service
{
    public function __construct(private readonly ApplicationLogger $logger)
    {
        parent::__construct();
    }

    final public function beginTransaction(): void
    {
        parent::beginTransaction();
        $this->logger->debug('Beginning transaction');
    }
}
