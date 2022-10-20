<?php

namespace App\Modules\Hcp\Service;

use App\Modules\Common\State\EntityProcessor;
use App\Modules\Hcp\Entity\Hcp;
use App\Modules\Hcp\Input\HcpCreateInput;

class HcpService
{
    public function __construct(private EntityProcessor $processor)
    {
    }

    public function create(HcpCreateInput $input)
    {
        return $this->processor->process($input, Hcp::class);
    }
}
