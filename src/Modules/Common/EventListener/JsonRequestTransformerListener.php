<?php

declare(strict_types=1);

namespace App\Modules\Common\EventListener;

use JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;

final class JsonRequestTransformerListener
{
    public function onKernelRequest(RequestEvent $event): void
    {
        $request = $event->getRequest();

        if ($this->supports($request) === false) {
            return;
        }

        if (empty($request->getContent())) {
            return;
        }

        try {
            $data = json_decode((string) $request->getContent(), true, 512, JSON_THROW_ON_ERROR);

            if (is_array($data)) {
                $request->request->replace($data);
            }
        } catch (JsonException $exception) {
            $event->setResponse(new JsonResponse(['message' => $exception->getMessage()], Response::HTTP_BAD_REQUEST));
        }
    }

    private function supports(Request $request): bool
    {
        return true;
    }
}
