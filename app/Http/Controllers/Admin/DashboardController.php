<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\ProductRequest;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        //
        $products = Product::all();
        return view('admin.dashboard', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $request->all();
        if($image = $request->file('file')){
            $destinationPath = 'blog/images/';

            if(file_exists($destinationPath)){
                @unlink($destinationPath);
            }
            // $request->file->store('blog', 'public');
            $productImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $productImage);
            $product['image'] = "$productImage";
        }

        if(Product::create($product)){
            return redirect()->route('admin.dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::all();
        return view('admin.list', compact('users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);
        return view('admin.edit', compact('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // $request->validate([
        //     'title'    =>  'required',
        //     'price'     =>  'required',
        //     'description'     =>  'required',
        //     'image'         =>  'required|image|max:2048|mimes:jpeg,png,jpg'
        // ]);
        
        $product = request()->except(['_token']);
        $image = $request->file('file');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('blog/images'), $new_name);

        if (file_exists(public_path($new_name))) 
            {
                unlink(public_path($new_name));
            };
        // if(file_exists($new_name)){
        //     @unlink($new_name);
        // }
        $product = array(
            'title'        =>   $request->title,
            'price'        =>   $request->price,
            'description'        =>   $request->description,
            'image'            =>   $new_name
        );

        Product::whereId($id)->update($product);
        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $destinationPath = 'blog/images/' .$product->image;

            if(file_exists($destinationPath)){
                @unlink($destinationPath);
            }
        
        $product->delete();
        return redirect()->route('admin.dashboard');
    }

//     public function update(Request $request, $id){

//         $employee = Employee::find($id);
   
//         if($request->file != ''){        
//              $path = public_path().'/uploads/images/';
   
//              //code for remove old file
//              if($employee->file != ''  && $employee->file != null){
//                   $file_old = $path.$employee->file;
//                   unlink($file_old);
//              }
   
//              //upload new file
//              $file = $request->file;
//              $filename = $file->getClientOriginalName();
//              $file->move($path, $filename);
   
//              //for update in table
//              $employee->update(['file' => $filename]);
//         }
//    }
    public function useredit($id)
    {
        $users = User::find($id);
        return view('admin.editList', compact('users'));
    }
    public function userupdate(Request $request, $id)
    {
        // dd($request->all());
        $users = request()->except(['_token']);
        $users = array(
            'first_name'        =>   $request->first_name,
            'last_name'        =>   $request->last_name,
            'email'        =>   $request->email,
            'role'            =>   $request->role
        );
        if(
            User::whereId($id)->update($users)
        )
        return redirect()->route('admin.all');
    }

    public function userdelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.all');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return redirect()->route('admin.all');
    }
    public function forceDelete($id)
    {
        $user = User::withTrashed()->find($id);
        $user->forceDelete();
        return redirect()->route('admin.trash');
    }
    public function trash()
    {
        $users = User::onlyTrashed()->get();
        return view('admin.trash', compact('users'));
    }
}
