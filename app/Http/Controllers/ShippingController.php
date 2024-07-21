<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shipping\StoreRequest;
use App\Http\Requests\Shipping\UpdateRequest;
use App\Http\Trait\Imageable;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    use Imageable;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $allShipping = Shipping::all();
        return view('shipping.all',[
            'allShipping' => $allShipping
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $image = $this->insertImage($request->code,$request->image,Shipping::PATH_SHIPPING);
        $shipping = new Shipping(array_merge(
            $request->validated(),
            [
                'image' => $image
            ]
        ));
        $shipping->save();
        return redirect()->route('shipping.index')->with([
            'success' => 'Shipping Added Successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shipping $shipping)
    {
        return view('shipping.edit',[
            'shipping' => $shipping
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Shipping $shipping)
    {
        if ($request->file('image')) {
            //remove old image
            $this->deleteImage(Shipping::DISK_NAME,$shipping->image);
            //add new image
            $image = $this->insertImage($request->code,$request->image,Shipping::PATH_SHIPPING);
            $shipping->update(array_merge($request->validated(),[
                'image' => $image
            ]));
        }else{
            $shipping->update($request->validated());
        }
        return redirect()->route('shipping.index')->with([
            'success' => 'Shipping Updated Successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shipping $shipping)
    {
        //
        if($shipping){
            $this->deleteImage(Shipping::DISK_NAME,$shipping->image);
            $shipping->delete();
        }
        return redirect()->route('shipping.index')->with([
            'success' => 'Shipping Deleted Successfully',
        ]);
    }
}
