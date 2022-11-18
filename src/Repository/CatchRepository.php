<?php

namespace Santore\Fish\Repository;

use Santore\Fish\Contract\Repository\CatchRepositoryInterface;

class CatchRepository implements CatchRepositoryInterface
{
    public function getAll()
    {
        return [
            'rods' => [
                'LK Legacy'   => [
                    'catches' => [
                        [
                            'species' => 'Green Sunfish',
                            'count'   => 35,
                        ],
                        [
                            'species' => 'Red-Breasted Sunfish',
                            'count'   => 2,
                        ],
                        [
                            'species' => 'Black Dace',
                            'count'   => 3,
                        ],
                        [
                            'species' => 'Creek Chub',
                            'count'   => 10,
                        ],
                    ],
                ],
                'Penn Battle' => [
                    'catches' => [
                        [
                            'species' => 'Large Mouth Bass',
                            'count'   => 1,
                        ],
                        [
                            'species' => 'Striped Bass',
                            'count'   => 1,
                        ],
                    ],
                ],
            ],
        ];
    }
}