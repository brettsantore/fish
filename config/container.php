<?php

namespace Santore\Fish\Config;

use Psr\Container\ContainerInterface;
use Santore\Fish\Contract\Repository\CatchRepositoryInterface;
use Santore\Fish\Controller\IndexController;
use Santore\Fish\Repository\CatchRepository;

return [
    IndexController::class          => function (ContainerInterface $container) {
        /** @var CatchRepositoryInterface $catchRepository */
        $catchRepository = $container->get(CatchRepositoryInterface::class);

        return new IndexController($catchRepository);
    },
    CatchRepositoryInterface::class => function (ContainerInterface $container) {
        return new CatchRepository();
    },
];