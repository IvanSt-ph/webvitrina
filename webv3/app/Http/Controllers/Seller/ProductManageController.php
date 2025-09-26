<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductManageController extends Controller
{
    public function __construct(){ $this->middleware(['auth','role:seller']); }

    public function index(){
        $products = Product::where('user_id',auth()->id())->latest()->paginate(12);
        return view('seller.products-index', compact('products'));
    }

    public function create(){ return view('seller.products-form', ['product'=>new Product()]); }

    public function store(Request $r){
        $data = $r->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|integer|min:0',
            'stock'=>'required|integer|min:0',
            'description'=>'nullable|string',
            'image'=>'nullable|image|max:2048',
        ]);
        $data['slug'] = Str::slug($data['title']).'-'.Str::random(5);
        $data['user_id'] = auth()->id();
        if($r->hasFile('image')) $data['image'] = $r->file('image')->store('products','public');
        $product = Product::create($data);
        return redirect()->route('seller.products.edit',$product)->with('success','Товар создан');
    }

    public function edit(Product $product){
        abort_if($product->user_id!==auth()->id(),403);
        return view('seller.products-form', compact('product'));
    }

    public function update(Request $r, Product $product){
        abort_if($product->user_id!==auth()->id(),403);
        $data = $r->validate([
            'title'=>'required|string|max:255',
            'price'=>'required|integer|min:0',
            'stock'=>'required|integer|min:0',
            'description'=>'nullable|string',
            'image'=>'nullable|image|max:2048'
        ]);
        if($r->hasFile('image')){
            if($product->image) Storage::disk('public')->delete($product->image);
            $data['image']=$r->file('image')->store('products','public');
        }
        $data['slug'] = $product->slug;
        $product->update($data);
        return back()->with('success','Сохранено');
    }

    public function destroy(Product $product){
        abort_if($product->user_id!==auth()->id(),403);
        if($product->image) Storage::disk('public')->delete($product->image);
        $product->delete();
        return back()->with('success','Удалено');
    }
}
