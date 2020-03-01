<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateTestRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Medicine;
use App\User;


class MedicineController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $medicines = Medicine::findName($keyword)->paginate(6);
        $users = Auth::user();

        return view('index', ['medicines' => $medicines, 'users' => $users, 'keyword' => $keyword]);
    }

    public function card(Request $request)
    {

        $keyword = $request->keyword;
        $medicines = Medicine::findName($keyword)->paginate(6);
        $users = Auth::user();

        return view('card', ['medicines' => $medicines, 'users' => $users, 'keyword' => $keyword]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(ValidateTestRequest $request)
    {
        $post = $request->all();
    
    if($request->hasFile('image')){
        $image = $request->file('image');
        $image_name = time() . '.' . $image->
            getClientOriginalExtension();
        $destinationPath = public_path('/thumbnail');

        $resize_image = Image::make($image->getRealPath());

        $resize_image->resize(320,320, function($constraint){
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $image_name);
        
       $destinationPath = public_path('/images');

       $image->move($destinationPath, $image_name);

       $data = [
        'user_id' => \Auth::id(), 'name' => $post['name'], 
        'quantity' => $post['quantity'], 'term' => $post['term'],
        'hospital' => $post['hospital'], 'body' => $post['body'],
        'image' => $image_name,
        ];

    }else{
        $data = [
        'user_id' => \Auth::id(), 'name' => $post['name'], 
        'quantity' => $post['quantity'], 'term' => $post['term'],
        'hospital' => $post['hospital'], 'body' => $post['body'],
        ];
    }

    if(array_key_exists('timezone', $post)){
        $arrayToString = implode(',', $post['timezone']);
        $dosing = [
            'timezone' => $arrayToString
            ];
        $data = array_merge($data, $dosing);
    }
        unset($data['_token']);
        Medicine::insert($data);
        
        return redirect('/')
            ->with('flash_message', '登録が完了しました');
    }

    public function show($id)
    {
        $medicine = Medicine::where('id', $id)->where('status', 1)->first();
        return view('show', compact('medicine'));
    }

    public function edit($id)
    {
        $medicine = Medicine::where('id', $id)->where('status', 1)->first();
        return view('edit', compact('medicine'));
    }

    public function update(ValidateTestRequest $request, $id)
    {
        $medicine = Medicine::where('id', $id)->where('status', 1)->first();
       
        $post = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time() . '.' . $image->
                getClientOriginalExtension();
            $destinationPath = public_path('/thumbnail');
    
            $resize_image = Image::make($image->getRealPath());
    
            $resize_image->resize(320,320, function($constraint){
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $image_name);
            
           $destinationPath = public_path('/images');
    
           $image->move($destinationPath, $image_name);
    
           $data = [
            'user_id' => \Auth::id(), 'name' => $post['name'], 
            'quantity' => $post['quantity'], 'term' => $post['term'],
            'hospital' => $post['hospital'], 'body' => $post['body'],
            'image' => $image_name,
            ];
        }else{
        $data = [
        'user_id' => \Auth::id(), 'name' => $post['name'], 
        'quantity' => $post['quantity'], 'term' => $post['term'],
        'hospital' => $post['hospital'], 'body' => $post['body'],
        ];
        }
        if(array_key_exists('timezone', $post)){
            $arrayToString = implode(',', $post['timezone']);
            $dosing = [
                'timezone' => $arrayToString
                ];
            $data = array_merge($data, $dosing);
        }
        
        unset($data['_token']);
        $medicine->fill($data)->save();
    
        return redirect('/')->with('flash_message', '更新が完了しました');
    }

    public function destroy($id) //論理削除
    {
        $medicine = Medicine::where('id', $id)->where('status', 1)->first();
        $medicine['status'] = 2;
        $medicine->save();
        
        return redirect('/')->with('flash_message', 'お薬手帳から削除しました');
    } 

}
