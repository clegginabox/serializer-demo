<?php

namespace App\Modules\Agency\Action;

use App\Modules\Agency\Input\AgencyCreateInput;
use App\Modules\Agency\Service\AgencyService;
use Symfony\Component\Routing\Annotation\Route;

class AgencyCreateAction
{
    public function __construct(private AgencyService $agencyService)
    {
    }

    #[Route(path: '/agencies', name: 'agencies.create', methods: ['POST'])]
    public function __invoke(AgencyCreateInput $input)
    {
        $agency = $this->agencyService->create($input);
    }
}
