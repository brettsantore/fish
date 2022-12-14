<?php

namespace Santore\Fish\Report\Repository;

use Santore\Fish\Contract\Repository\CatchRepositoryInterface;

class CatchRepository implements CatchRepositoryInterface
{
    public function getAll(): array
    {
        return [
            2022 => [
                [
                    'rod'     => 'LK Legacy',
                    'catches' => [
                        'Green Sunfish'        => 35,
                        'Red-Breasted Sunfish' => 2,
                        'Black Dace'           => 3,
                        'Creek Chub'           => 12,
                        'White Crappie'        => 1,
                    ],
                ],
                [
                    'rod'     => 'Penn Battle',
                    'catches' => [
                        'Large Mouth Bass' => 1,
                        'Striped Bass'     => 1,
                    ],
                ],
            ],
        ];
    }
}