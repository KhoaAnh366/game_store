<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('tbproducts')->get();
        return view('product.index')->with(['products' => $products]);
    }
    public function create()
    {
        return view('product.create');
    }
    public function postCreate(Request $request)
    {
        // nhận tất cả tham số vào mảng product
        $product = $request->all();
        // xử lý upload hình vào thư mục
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('product/create')
                ->with('Error', 'You can only select jpg,png,jpeg file');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("images", $imageName);
        } else {
            $imageName = null;
        }
        DB::table('product')->insert([
            'id' => intval($product['id']),
            'name' => $product['name'],
            'price' => intval($product['price']),
            'description' => $product['description'],
            'image' => $imageName
        ]);
        return redirect()->action([ProductController::class, 'index']);
    }
    public function update($id)
    {
        $p = DB::table('tbproducts')
            ->where('id', intval($id))
            ->first();
        return view('product.update', ['p' => $p]);
    }

    public function postUpdate(Request $request, $id)
    {
        $name = $request->input('name');
        $price = $request->input('price');
        $description = $request->input('description');
        // xử lý upload hình vào thư mục
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
                return redirect('product/update')->with('Error', 'You can only select jpg,png,jpeg file');
            }
            $imageName = $file->getClientOriginalName();
            $file->move("public/images", $imageName);
        } else { // không upload hình mới => giữ lại hình cũ
            $p = DB::table('product')->where('id', intval($id))->first();
            $imageName = $p->image;
        }
        $p = DB::table('tbproducts')
            ->where('id', intval($id))
            ->update(['name' => $name, 'price' => intval($price), 'description' => $description, 'image' => $imageName]);

        return redirect()->action([ProductController::class, 'index']);
    }
    public function delete($id)
    {
        $p = DB::table('tbproducts')
            ->where('id', intval($id))
            ->delete();
        return redirect()->action([ProductController::class, 'index']);
    }
}
