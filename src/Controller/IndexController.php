<?php

namespace Santore\Fish\Controller;

use Laminas\Diactoros\Response\JsonResponse;
use Laminas\Diactoros\ServerRequest;
use Psr\Http\Message\ResponseInterface;
use Santore\Fish\Contract\Repository\CatchRepositoryInterface;

class IndexController
{
    public function __construct(
        private readonly CatchRepositoryInterface $catchRepository
    ) {
    }

    public function __invoke(ServerRequest $request): ResponseInterface
    {
        return new JsonResponse($this->catchRepository->getAll());
    }
}