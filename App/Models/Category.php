<?php


namespace App\Models;


use App\Classes\DB;


/**
 * Class Category
 * @package App\Models
 * @property int $id
 * @property string $dateCreate
 * @property string $dateChange
 * @property string $name
 * @property bool $isActive
 * @property int|null $parentId
 */
class Category extends Model
{
    protected static $table = 'categories';
    protected static $schema = [
        [
            'name' => 'id',
            'type' => 'int'
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
            'name' => 'name',
            'type' => 'string'
        ],
        [
            'name' => 'isActive',
            'type' => 'bool'
        ],
        [
            'name' => 'parentId',
            'type' => 'int'
        ]
    ];
}