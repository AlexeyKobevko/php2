<?php


namespace App\Models;


use App\Classes\DB;


/**
 * Class Order
 * @package App\Models
 *
 * @property int $id
 * @property int $userId
 * @property string $address
 * @property string $dateCreate
 * @property string $dateChange
 * @property int $status
 */
class Order extends Model
{
    protected static $table = 'orders';
    protected static $schema = [
        [
            'name' => 'id',
            'type' => 'int'
        ],
        [
            'name' => 'userId',
            'type' => 'string',
        ],
        [
            'name' => 'address',
            'type' => 'string',
        ],
        [
            'name' => 'dateCreate',
            'type' => 'string',
            'nullable' => true,
        ],
        [
            'name' => 'dateChange',
            'type' => 'string',
            'nullable' => true,
        ],
        [
            'name' => 'status',
            'type' => 'int'
        ]
    ];
}