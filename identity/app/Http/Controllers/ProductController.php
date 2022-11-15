<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
  public function index()
  {
    $brands = Brand::with(['products'])->get();
     echo '<table>';
        echo '<tr>
          <th>No</th>
          <th>Brand</th>
          <th>Product</th>
          <th>Product count</th>
          </tr>';
          $no = 1;
          foreach($brands as $brand){
          echo '<tr>
           <td>'.$no++.'</td>
           <td>'.$brand->brand_name.'</td>
           <td>';
            foreach($brand->products as $product){
                echo $product->title;
           }
          echo '</td>
         <td>'.$brand->products->count().'</td>
        </tr>';
  }
       echo '</table>';
  }

  public function store()
{
   $category_id = [1,2,3];
   $brand_id = 1;
   $product = Product::create([
     'title' => 'Shoes Futsal Adidas',
     'price' => '230',
     'brand_id' => $brand_id
   ]);
// we can use method sync for update or delete $category_id
  $product->categories()->sync($category_id);
}
}
