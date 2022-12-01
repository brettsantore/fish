<?php

namespace Santore\Fish\Report\Repository;

use Santore\Fish\Contract\Repository\CatchRepositoryInterface;

class CatchRepository implements CatchRepositoryInterface
{
    public function getAll()
    {
        return [
            'rods' => [
                2022 => [
                    [
                        'name'    => 'LK Legacy',
                        'catches' => [
                            'Green Sunfish'        => 35,
                            'Red-Breasted Sunfish' => 2,
                            'Black Dace'           => 3,
                            'Creek Chub'           => 12,
                        ],
                    ],
                    [
                        'name'    => 'Penn Battle',
                        'catches' => [
                            'Large Mouth Bass' => 1,
                            'Striped Bass'     => 1,
                        ],
                    ],
                ],
            ],
        ];
    }
}