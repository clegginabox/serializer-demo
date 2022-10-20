<?php

namespace App\Modules\Hcp\Action;

use App\Modules\Hcp\Input\HcpCreateInput;
use App\Modules\Hcp\Service\HcpService;
use Symfony\Component\Routing\Annotation\Route;

class CreateHcpAction
{
    public function __construct(private HcpService $hcpService)
    {
    }

    #[Route(path: '/hcp', name: 'hcp.create', methods: ['POST'])]
    public function __invoke(HcpCreateInput $input)
    {
        $this->hcpService->create($input);
    }
}
