<?php

namespace Santore\Fish\Config;

use League\Event\EventDispatcher;
use PDO;
use Psr\Container\ContainerInterface;
use Psr\EventDispatcher\EventDispatcherInterface;
use Santore\Fish\Contract\Repository\CatchRepositoryInterface;
use Santore\Fish\Contract\Repository\RodRepositoryInterface;
use Santore\Fish\Controller\CatchListController;
use Santore\Fish\Domain\Repository\RodRepository;
use Santore\Fish\Domain\Rod\AcquireRodAction;
use Santore\Fish\Report\Repository\CatchRepository;

return [
    CatchListController::class      => function (ContainerInterface $container) {
        /** @var CatchRepositoryInterface $catchRepository */
        $catchRepository = $container->get(CatchRepositoryInterface::class);

        return new CatchListController($catchRepository);
    },
    CatchRepositoryInterface::class => function (ContainerInterface $container) {
        return new CatchRepository();
    },
    RodRepositoryInterface::class   => function (ContainerInterface $container) {
        return new RodRepository(
            new PDO('mysql:host=db;port=3306;dbname=fish', 'root', 'test_pass')
        );
    },
    AcquireRodAction::class         => function (ContainerInterface $container) {
        return new AcquireRodAction(
            $container->get(RodRepositoryInterface::class),
            $container->get(EventDispatcherInterface::class)
        );
    },
    EventDispatcherInterface::class => function (ContainerInterface $container) {
        return new EventDispatcher();
    },
];
