<?php

namespace App\Models;

use App\Models\Shoe;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $fillable = [
      'name',
  ];

  public function shoe()
  {
      return $this->belongsToMany(Shoe::class);
  }
}
