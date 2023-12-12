<?php

namespace App\Models;

use App\Models\Shoe;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rental extends Model
{
  use HasFactory;

  // protected $table = 'rentals';

  protected $fillable = [
    'status',
    'user_id',
    'shoe_id',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function shoe()
  {
    return $this->belongsTo(Shoe::class);
  }
}
