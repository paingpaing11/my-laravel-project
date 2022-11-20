<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Town;
use App\Models\City;
use App\Models\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::all();
        $cities = City::all();
        $towns = Town::all();
        return view('admin.address.index', compact('address', 'towns', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $towns = Town::all();
        $address = Address::all();
        $cities = City::all();
        return view('admin.address.create', compact('cities', 'address', 'towns'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'hou_no' => "required|string",
            'street' => "required|string",
            'ward' => "required|string",
            'city_slug' => "required|string",
            'town_slug' => "required|string",
        ]);

        

        $city = City::where('slug', $request->city_slug)->first();
        if(!$city){
            return redirect()->back()->with('error', 'Not found city');
        }

        $town = Town::where('slug', $request->town_slug)->first();
        if(!$town){
            return redirect()->back()->with('error', 'Not found township');
        }

        $address = Address::create([
            'hou_no' => $request->hou_no,
            'street' => $request->street,
            'ward' => $request->ward,
            'city_id' => $city->id,
            'township_id' => $town->id,
            
        ]);
        $address->save();
        return redirect('/address')->with('success', 'Your address has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cities = City::all();
        $towns = Town::all();
        $address = Address::where('id', $id)->first();
        if(!$address) {
            return redirect()->back()->with('error', 'address not found');
        }
        return view('admin.address.show',compact('address', 'cities', 'towns', 'projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cities = City::all();
        $towns = Town::all();
        $address = Address::where('id', $id)
            ->with('cities', 'towns')
            ->first();
            if(!$address){
                return redirect()->back()->with('error', 'address not found');
            }
        return view('admin.address.edit', compact('cities','address', 'towns'));
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
        $find_address = Address::where('id', $id);
        if(!$find_address->first()){
            return redirect()->back()->with('error', 'not found address');
        }

        $id = $find_address->first()->id;

        $city = City::where('slug', $request->city_slug)->first();
        if(!$city){
            return redirect()->back()->with('error', 'Not found city');
        }

        $town = Town::where('slug', $request->town_slug)->first();
        if(!$town){
            return redirect()->back()->with('error', 'Not found town');
        }


        $find_address->update([
            'hou_no' => $request->hou_no,
            'street' => $request->street,
            'ward' => $request->ward,
            'city_id' => $city->id,
            'township_id' => $town->id,
        ]);
        return redirect('/address')->with('success', 'your address updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::where('id', $id);
        if (!$address->first()){
            return redirect()->back()->with('error', 'Address Not Found');
        }
        
        $address->delete();
        return redirect('/address')->with('success', 'address deleted successfully');
    }
}
