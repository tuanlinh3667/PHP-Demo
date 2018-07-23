<?php
/**
 * Created by PhpStorm.
 * User: xuanhung
 * Date: 7/17/18
 * Time: 6:34 PM
 */

namespace App\Http\Controllers;


use App\Bakery;
use Illuminate\Support\Facades\Input;

class BakeryController extends Controller
{
    // trả về danh sách bánh.
    public function index()
    {
        $bakeries = Bakery::all();
        return view('admin.bakery.list')->with('bakeries_in_view', $bakeries);
    }

    // show một sản phẩm.
    public function show()
    {
        return 'show';
    }

    // trả về form.
    public function create()
    {
        $bakery = new Bakery();
        $action = '/admin/bakery/store';
        return view('admin.bakery.form')
            ->with('bakery', $bakery)
            ->with('action', $action);
    }

    // lưu thông tin sản phẩm vào db.
    public function store()
    {
        $bakery = new Bakery();
        $bakery->name = Input::get('name');
        $bakery->categoryId = Input::get('categoryId');
        $bakery->price = Input::get('price');
        $bakery->description = Input::get('description');
        $bakery->images = Input::get('images');
        $bakery->content = Input::get('content');
        $bakery->note = Input::get('note');
        $bakery->save();
        return redirect('/admin/bakery/list');
    }

    // lấy thông tin sản phẩm cần sửa, đưa về form.
    public function edit($id)
    {
        $action = '/admin/bakery/update';
        $bakery = Bakery::find($id);
        if ($bakery == null) {
            return view('404');
        }
        return view('admin.bakery.form')
            ->with('bakery', $bakery)
            ->with('action', $action);
    }

    // lưu thông tin mới của sản phẩm vào db.
    public function update()
    {
        $id = Input::get('id');
        $bakery = Bakery::find($id);
        if ($bakery == null) {
            return view('404');
        }
        $bakery->name = Input::get('name');
        $bakery->categoryId = Input::get('categoryId');
        $bakery->price = Input::get('price');
        $bakery->description = Input::get('description');
        $bakery->images = Input::get('images');
        $bakery->content = Input::get('content');
        $bakery->note = Input::get('note');
        $bakery->save();
        return redirect('/admin/bakery/list');
    }

    // xoá sản phẩm.
    public function delete($id)
    {
        $bakery = Bakery::find($id);
        if ($bakery == null) {
            return view('404');
        }
        return view('admin.bakery.confirm_delete')->with('bakery', $bakery);
    }

    // xoá sản phẩm.
    public function destroy($id)
    {
        $bakery = Bakery::find($id);
        if ($bakery == null) {
            return view('404');
        }
        $bakery->delete();
        return redirect('/admin/bakery/list');
    }
}