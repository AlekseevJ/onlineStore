<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Модель Product",
 *     @OA\Xml(
 *         name="Product"
 *     )
 * )
 */
class Product extends Model
{
    use HasFactory;
    /**
     * @OA\Property(
     *     title="id",
     *     description="Продукта id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var bigInteger
     */
    private $id;
    /**
     * @OA\Property(
     *     title="name",
     *     description="Наименование продукта",
     *     format="string",
     *     example="Iphone 4s"
     * )
     *
     * @var string
     */
    private $name;
    /**
     * @OA\Property(
     *     title="desc",
     *     description="Описание продукта",
     *     format="string",
     *     example="Смартфон с камерой ночного видения"
     * )
     *
     * @var string
     */
    private $desc;
    /**
     * @OA\Property(
     *     title="price",
     *     description="цена",
     *     format="int",
     *     example="25550"
     * )
     *
     * @var bigInteger
     */
    private $price;
    /**
     * @OA\Property(
     *     title="color_id",
     *     description="Отношение с colors",
     *     format="int",
     *     example="1"
     * )
     *
     * @var bigInteger
     */
    private $color_id;
    protected $fillable = ['name', 'desc', 'price', 'color_id'];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
