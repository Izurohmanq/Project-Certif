<?php

namespace App\Models;

use App\Models\Rental;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shoe extends Model
{
    use HasFactory;

    protected $table = "shoes";
    protected $fillable = [
      'name',
      'image',
      'category',
      'price',
      'category_id'
  ];

  public function rental()
  {
      return $this->hasMany(Rental::class);
  }
  public function category()
  {
      return $this->belongsTo(Category::class);
  }
}
