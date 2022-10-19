<?php

namespace App\Modules\Agency\Service;

use App\Modules\Agency\Entity\Agency;
use App\Modules\Agency\Input\AgencyCreateInput;
use App\Modules\Agency\Input\AgencyUpdateInput;
use App\Modules\Common\State\EntityProcessor;

class AgencyService
{
    public function __construct(private EntityProcessor $processor)
    {
    }

    public function create(AgencyCreateInput $input)
    {
        return $this->processor->process($input, Agency::class);
    }

    public function update(string $agencyUuid, AgencyUpdateInput $agencyUpdateInput)
    {
        // @todo get Agency from repo
        $agency = (new Agency())
            ->setName('An agency')
            ->setNotes('some agency somewhere');

        return $this->processor->process($agencyUpdateInput, Agency::class, $agency);
    }
}
