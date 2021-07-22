<?php

namespace App\Http\Controllers\admin_panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductVerifyRequest;
use App\Http\Requests\ProductEditVerifyRequest;

use Illuminate\Support\Facades\DB;
use App\Product;
use App\Category;


class productsController extends Controller
{
   public function index()
    {
        $result = Product::all();

    	return view('admin_panel.products.index')
    		->with('prdlist', $result);
        
    }
    
     public function create()
    {
        $result = Category::all();
        return view('admin_panel.products.create')
            ->with('catlist', $result);
        
    }
    
    
    
    public function store(ProductVerifyRequest $request)
    { 
        try {
            $img = explode('|', $request->img);
 
            $aaa= '';
                for ($i = 0; $i < count($img) - 1; $i++) {

                if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
                    //$img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);  
                    $aaa = '.jpg';
                }
                if (strpos($img[$i], 'data:image/png;base64,') === 0) { 
                    //$img[$i] = str_replace('data:image/png;base64,', '', $img[$i]); 
                    $aaa = '.png';
                }
            }
            $prd = new Product();

            $prd->image_name = "1".$aaa;
            //$prd->image_name = $i.$ext;

            $prd->name = $request->Name;
            $prd->description = $request->Description;
            $prd->category_id = $request->Category;
            $prd->price = $request->Price;

            $prd->save();

            for ($i = 0; $i < count($img) - 1; $i++) {

            if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
                $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);  
                $ext = '.jpg';
            }
            if (strpos($img[$i], 'data:image/png;base64,') === 0) { 
                $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]); 
                $ext = '.png';
            }
            
    
            // $prd = new Product();

            // $prd->image_name = "1".$ext;
            // //$prd->image_name = $i.$ext;

            // $prd->name = $request->Name;
            // $prd->description = $request->Description;
            // $prd->category_id = $request->Category;
            // $prd->price = $request->Price;

            // $prd->save();
            
            

            $img[$i] = str_replace(' ', '+', $img[$i]);
            $data = base64_decode($img[$i]);
            
            $temp_string='/uploads/products/'.$prd->id;
            $temp_string2='uploads/products/'.$prd->id;
    

            //cia tikrina ar yra tokia direktorija 
            // jei nera tada sukuria direktotija ir ta faila
            // tai reikia kazkaip atskirt
            //// --------- kaip ir gerai dabar :) 
            // tik pakeista img name save'as db mysql'e
            // bet idk ten cj kazkaip pakeist kad img pagal id search'intu o ne name.
            if (!file_exists(public_path().$temp_string)) {
                mkdir( public_path().$temp_string, 0777, true);
                
                $file = $temp_string2.'/'.$i.$ext;
                //$file = $temp_string2.'/1'.$ext;

                
            if (file_put_contents($file, $data)) {
                echo "<p>Image $i was saved as $file.</p>";
            } else {
                echo '<p>Image $i could not be saved.</p>';
            } 
            } else {
                $file = $temp_string2.'/'.$i.$ext;
                //$file = $temp_string2.'/1'.$ext;

                
            if (file_put_contents($file, $data)) {
                echo "<p>Image $i was saved as $file.</p>";
            } else {
                echo '<p>Image $i could not be saved.</p>';
            } 
            }
                
            

        }
        
        return redirect()->route('admin.products');
        } catch (Throwable $th) {
            dd($th->getMessage());
    
        }
        
    }
    
    
    public function edit($id)
    {
        $cat = Category::all();

        $prd = Product::find($id);

        return view('admin_panel.products.edit')
            ->with('product', $prd)
            ->with('catlist', $cat)
            ->with('select_attribute', '');

            
    }

    public function update(ProductEditVerifyRequest $request, $id)
    {
        
        $prdToUpdate = Product::find($request->id);
        $prdToUpdate->name = $request->Name;
        $prdToUpdate->description = $request->Description;
        $prdToUpdate->price = $request->Price;
        $prdToUpdate->category_id = $request->Category;
        
        //NEW FILE UPLOADED
        if($request->img!="")
        {      
            
            $img = explode('|', $request->img);
 
        for ($i = 0; $i < count($img) - 1; $i++) {

         if (strpos($img[$i], 'data:image/jpeg;base64,') === 0) {
            $img[$i] = str_replace('data:image/jpeg;base64,', '', $img[$i]);  
            $ext = '.jpg';
         }
         if (strpos($img[$i], 'data:image/png;base64,') === 0) { 
            $img[$i] = str_replace('data:image/png;base64,', '', $img[$i]); 
            $ext = '.png';
         }
        
   
        
        $prdToUpdate->image_name = "1".$ext;
        $prdToUpdate->save();
        
        
        

         $img[$i] = str_replace(' ', '+', $img[$i]);
         $data = base64_decode($img[$i]);
        
        
        $temp_string2='uploads/products/'.$prdToUpdate->id;
        $file = $temp_string2.'/1'.$ext;
            
         if (file_put_contents($file, $data)) {
            echo "<p>Image $i was saved as $file.</p>";
         } else {
            echo '<p>Image $i could not be saved.</p>';
         } 
        
            
         

      }
            
            return redirect()->route('admin.products');
            
        }
        else
        {
            
            $prdToUpdate->save();
            return redirect()->route('admin.products');
        }
        
        
        
        
        
    }
    
    public function delete($id)
    {
       
        $prd = Product::find($id);

        return view('admin_panel.products.delete')
            ->with('product', $prd);
    }

    public function destroy(Request $request)
    {     
        $prdToDelete = Product::find($request->id);
        
        //deleting image folder
        try{
            $src='uploads/products/'.$prdToDelete->id.'/';
            $dir = opendir($src);
            while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                $full = $src . '/' . $file;
                if ( is_dir($full) ) {
                    rrmdir($full);
                }
                else {
                    unlink($full);
                }
                }
            }
            closedir($dir);
            rmdir($src);
        }
        catch(\Exception $e){

        }
        //deleting image folder done
        
       
        
        $prdToDelete->delete();
        
        return redirect()->route('admin.products');   
    } 
}
