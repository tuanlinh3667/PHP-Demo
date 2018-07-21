<?php
/**
 * Created by PhpStorm.
 * User: xuanhung
 * Date: 7/17/18
 * Time: 6:34 PM
 */

namespace App\Http\Controllers;


use App\Bakery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BakeryController extends Controller
{
    // trả về danh sách bánh.
    public function index() {
        $bakeries = DB::select('select * from bakeries');
        return view('admin.bakery.list') -> with('bakeries_in_view', $bakeries);
    }

    // show một sản phẩm.
    public function show(){
        return 'show';
    }

    // trả về form.
    public function create(){
        $bakery = new Bakery();
        $action = '/admin/bakery/store';
        return view('admin.bakery.form') -> with('bakery', $bakery) -> with('action', $action);
    }

    // lưu thông tin sản phẩm vào db.
    public function store(Request $request){
        $name = $request -> input('name');
        $categoryId = $request -> input('categoryId');
        $price = $request -> input('price');
        $description = $request -> input('description');
        $image = $request -> input('image');
        $detail = $request -> input('detail');
        $note = $request -> input('note');
        DB::insert('insert into bakeries (name, categoryId, price, description, image, detail, note) values (?,?,?,?,?,?,?)'
            , [$name, $categoryId, $price, $description, $image, $detail, $note]);
        return 'Saved success!';
    }

    // lấy thông tin sản phẩm cần sửa, đưa về form.
    public function edit($id){
        $action = '/admin/bakery/update';
        $bakery = DB::selectOne('select * from bakeries where id = ?', [$id]);
        if($bakery == null){
            return view('404');
        }
        return view('admin.bakery.form')
            -> with('bakery', $bakery)
            -> with('action', $action);
    }

    // lưu thông tin mới của sản phẩm vào db.
    public function update(Request $request){
        $id = $request -> input('id');
        $bakery = DB::selectOne('select * from bakeries where id = ?', [$id]);
        if($bakery == null){
            return view('404');
        }
        $name = $request -> input('name');
        $categoryId = $request -> input('categoryId');
        $price = $request -> input('price');
        $description = $request -> input('description');
        $image = $request -> input('image');
        $detail = $request -> input('detail');
        $note = $request -> input('note');
        DB::update('update bakeries set name = ?, categoryId = ?, price = ?, description = ?, image = ?, detail = ?, note = ? where id = ?'
            , [$name, $categoryId, $price, $description, $image, $detail, $note, $id]);
        return 'update';
    }

    // xoá sản phẩm.
    public function destroy(){
        return 'destroy';
    }


}