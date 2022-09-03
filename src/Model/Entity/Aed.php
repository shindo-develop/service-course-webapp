<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Aed Entity
 *
 * @property int $id
 * @property string $location_name
 * @property string $address
 * @property float $latitude
 * @property float $longitude
 * @property string $phone
 * @property string $usable_time
 * @property string $url
 */
class Aed extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    // データ（レコード）をオブジェクトにしたもの
    // setter や getter 等のレコード単位に関連したメソッドを定義可能
    protected $_accessible = [
        'location_name' => true,
        'address' => true,
        'latitude' => true,
        'longitude' => true,
        'phone' => true,
        'usable_time' => true,
        'url' => true
    ];
}
