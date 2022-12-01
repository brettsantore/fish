<?php

namespace Santore\Fish\Config;

use Psr\Container\ContainerInterface;
use Santore\Fish\Contract\Repository\CatchRepositoryInterface;
use Santore\Fish\Controller\CatchListController;
use Santore\Fish\Report\Repository\CatchRepository;

return [
    CatchListController::class => function (ContainerInterface $container) {
        /** @var CatchRepositoryInterface $catchRepository */
        $catchRepository = $container->get(CatchRepositoryInterface::class);

        return new CatchListController($catchRepository);
    },
    CatchRepositoryInterface::class => function (ContainerInterface $container) {
        return new CatchRepository();
    },
];