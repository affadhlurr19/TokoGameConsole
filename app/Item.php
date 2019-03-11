<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 */
class Item extends Model
{
  public $table = 't_item';

  protected $fillable = [
    'merk', 'nama_barang', 'kapasitas', 'harga'
  ];
}


 ?>
