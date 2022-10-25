<?php

namespace App\Modules\Common\ParamConverter;

use App\Modules\Common\Input\JsonSerializableInputInterface;
use App\Modules\Common\Serializer\JsonRequestSerializer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class JsonRequestInputConverter implements ParamConverterInterface
{
    private array $requestBodyMethods = [
        Request::METHOD_POST,
        Request::METHOD_PATCH,
        Request::METHOD_PUT,
    ];

    public function __construct(private JsonRequestSerializer $jsonRequestSerializer, private ValidatorInterface $validator)
    {
    }

    /**
     * @inheritDoc
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        if (in_array($request->getMethod(), $this->requestBodyMethods, true)) {
            $requestData = $request->request->all()['data'];
            
            if (isset($requestData['relationships'])) {
                $relationshipData = array_combine(
                    array_map(static fn ($key) => $key, array_keys($requestData['relationships'])),
                    array_map(static fn ($data) => $data['data'], $requestData['relationships'])
                );
            }

            $requestParams = array_merge($requestData['attributes'], $relationshipData ?? []);

            $requestObject = $this->jsonRequestSerializer->denormalize(
                $requestParams,
                $configuration->getClass()
            );

            $errors = $this->validator->validate($requestObject);

            if (count($errors) > 0) {
                throw new \RuntimeException((string) $errors);
            }

            $request->attributes->set($configuration->getName(), $requestObject);

            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function supports(ParamConverter $configuration)
    {
        if (!$configuration->getClass()) {
            return false;
        }

        $interfaces = class_implements($configuration->getClass());

        return isset($interfaces[JsonSerializableInputInterface::class]);
    }
}
