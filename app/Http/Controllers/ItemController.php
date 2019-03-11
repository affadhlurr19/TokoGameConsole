<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 *
 */
class ItemController extends Controller
{
  public function create(Request $request)
  {
    $validation = Validator::make($request->all(),[
      'merk' => 'required|string',
      'nama_barang' => 'required|string',
      'kapasitas' => 'required|string',
      'harga' => 'required|max:10',
    ]);

    if ($validation->fails()){
      $errors = $validation->errors();
      return[
        'status' => 'error',
        'message' => $errors,
        'result' => null
      ];
    }

    $result = \App\Item::create($request->all());
    if($result){
      return [
        'status' => 'success',
        'message' => 'Data berhasil ditambahkan',
        'result' => $result
      ];
    }else{
      return [
        'status' => 'error',
        'message' => 'Data gagal ditambahkan',
        'result' => null
      ];
    }
  }

  public function update(Request $request, $id)
  {
    $validation = Validator::make($request->all(),[
      'merk' => 'required|string',
      'nama_barang' => 'required|string',
      'kapasitas' => 'required|string',
      'harga' => 'required|max:10',
    ]);

    if ($validation->fails()){
      $errors = $validation->errors();
      return[
        'status' => 'error',
        'message' => $errors,
        'result' => null
      ];
    }

    $item = \App\Item::find($id);
    if(empty($item)){
      return [
        'status' => 'error',
        'message' => 'Data tidak ditemukan',
        'result' => null
      ];
    }

    $result = $item->update($request->all());
    if($result){
      return [
        'status' => 'success',
        'message' => 'Data berhasil diubah',
        'result' => $result
      ];
    }else{
      return [
        'status' => 'error',
        'message' => 'Data gagal diubah',
        'result' => null
      ];
    }
  }

  public function read(Request $request)
  {
    $result = \App\Item::all();
    return [
      'status' => 'success',
      'message' => '',
      'result' => $result
    ];
  }

  public function delete(Request $request, $id)
  {
    $item = \App\Item::find($id);
    if (empty($item)){
      return [
        'status' => 'error',
        'message' => 'Data tidak ditemukan',
        'result' => null
      ];
    }

    $result = $item->delete($id);
    if($result){
      return [
        'status' => 'success',
        'message' => 'Data berhasil dihapus',
        'result' => $result
      ];
    }else{
      return [
        'status' => 'error',
        'message' => 'Data gagal dihapus',
        'result' => null
      ];
    }
  }

  public function detail($id)
  {
    $item =  \App\Item::find($id);

      if (empty($item)){
        return [
          'status' => 'error',
          'message' => 'Data tidak ditemukan',
          'result' => null
        ];
      }

      return [
        'status' => 'success',
        'result' => $item
      ];
  }
}


 ?>
