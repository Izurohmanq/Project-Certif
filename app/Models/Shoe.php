<?php

namespace App\Models;

use App\Models\Rental;
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
  ];

  public function rental()
  {
      return $this->hasMany(Rental::class);
  }
}
