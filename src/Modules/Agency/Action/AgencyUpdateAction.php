<?php

namespace App\Modules\Agency\Action;

use App\Modules\Agency\Input\AgencyUpdateInput;
use App\Modules\Agency\Service\AgencyService;
use Symfony\Component\Routing\Annotation\Route;

class AgencyUpdateAction
{
    public function __construct(private AgencyService $agencyService)
    {
    }

    #[Route(path: '/agencies/{agencyUuid}', name: 'agencies.update', methods: ['PATCH'])]
    public function __invoke(string $agencyUuid, AgencyUpdateInput $agencyUpdateInput)
    {

        $agency = $this->agencyService->update($agencyUuid, $agencyUpdateInput);

    }
}
