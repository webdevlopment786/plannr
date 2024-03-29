<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\CreateInvitation;
use App\Models\CategoryListing;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use Carbon\Carbon;


class CategoryControllers extends Controller
{
    public function index(Request $request)
    {
        $categoryData = array();
        $categorys = Category::where('status','1')->orderBy('order','ASC')->get();
        
        foreach($categorys as $category){
            $imagePath = asset('images/category/'.$category->image);
            $data = array();
            $data['id'] = $category->id;
            $data['name'] = $category->name;
            $data['image'] = $category->image;
            $data['image_path'] =  $imagePath;
            array_push($categoryData, $data);

         }

        if($categoryData){
            return response(["status" => true, 'data' => $categoryData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }

    public function product()
    {
        $prodoctdata = array(); 
        $categoryProduct = DB::table('category_listing')
        ->select('category_listing.id','category_listing.product_title','category_listing.free_or_premium',
                 'category_listing.image','category_listing.status','category.name as category_name', 
                 'color.color_name as color_name',
                )
        ->leftJoin('category', 'category_listing.category_id', '=', 'category.id')
        ->leftJoin('color', 'category_listing.color_id', '=', 'color.id')
        ->get();
    
        foreach($categoryProduct as $categoryProducts){

            if($categoryProducts->status == 1){
                $imagePath = asset('images/product/'.$categoryProducts->image);
                $data = array();
                $data['id'] =  $categoryProducts->id;      
                $data['product_title'] =  $categoryProducts->product_title;      
                $data['free_or_premium'] =  $categoryProducts->free_or_premium;      
                $data['category_name'] =  $categoryProducts->category_name;      
                $data['image'] =  $categoryProducts->image;  
                $data['color_name'] =  $categoryProducts->color_name;  
                $data['image_path'] =   $imagePath;   
                array_push($prodoctdata, $data);
            }
        }

        if($prodoctdata){
            return response(["status" => true, 'data' => $prodoctdata]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
    }

    public function color()
    {
        $color = Color::get(['id','color_name','color_code',]);
        if($color){
            return response(["status" => true, 'data' => $color]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
        
    }

    public function searchFitter(Request $request)
    {
        $searchData = array();
        if($request->free_or_premium != '' && !empty($request->color_id)){
                $category =  CategoryListing::
                Where( 'free_or_premium', '=', $request->free_or_premium)
                ->Where( 'color_id', '=', $request->color_id )->get();
        }else if($request->free_or_premium != '' && empty($request->color_id)){
            $category = CategoryListing::where('free_or_premium', '=', $request->free_or_premium)->get();
        }else if($request->free_or_premium == '' && !empty($request->color_id)){
            $category = CategoryListing::where('color_id', '=', $request->color_id)->get();
        }else{
            $category = CategoryListing::get();
        }
        $item = $category->count();

        foreach($category as $categorys){
            $imagePath = asset('images/product/'.$categorys->image);
            $data = array();
            $data['id'] = $categorys->id;
            $data['category_id'] = $categorys->category_id;
            $data['color_id'] = $categorys->color_id;
            $data['free_or_premium'] = $categorys->free_or_premium;
            $data['product_title'] = $categorys->product_title;
            $data['image'] = $categorys->image;
            $data['image_path'] = $imagePath;
            array_push($searchData, $data);
            
        }

        if($searchData){
            return response(["status" => true,  'item' => $item ,'data' => $searchData]);
        }else{
            return response(["status" => false, 'data' => 'Not found']);
        }
       
    }

    public function clearAllFitter(Request $request)
    {
        $searchData = array();
        $categoryId = $request->category_id;
        $products = CategoryListing::where('category_id',$categoryId)->get();

        $item = $products->count();
        foreach($products as $product){
            $imagePath = asset('images/product/'.$product->image);
            $data = array();
            $data['id'] = $product->id;
            $data['category_id'] = $product->category_id;
            $data['color_id'] = $product->color_id;
            $data['free_or_premium'] = $product->free_or_premium;
            $data['product_title'] = $product->product_title;
            $data['image'] = $product->image;
            $data['image_path'] = $imagePath;
            array_push($searchData, $data);
            
        }

        if($searchData){
            return response(["status" => true,  'item' => $item ,'data' => $searchData],200);
        }else{
            return response(["status" => false, 'data' => 'Not found'],201);
        }
    }

    public function createInvitation(Request $request)
    {   
        // return $request->date;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'zone' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'type_events' => 'required',
            'dress_code' => 'required',
            'food' => 'required',
            'add_info' => 'required',
            'add_admin' => 'required',
            'add_chat_room' => 'required',
            'invite_more' => 'required',
            'hosted_by' => 'required',
            'user_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            // $request->image->move(public_path('images'), $imageName);
             $request->image->move(public_path('images/createinvitation'), $imageName);
        }else{
            $imageName = '';
        }
        if($request->draft){
            $drafts = $request->draft;
        }else{
            $drafts = '';
        }
        
        $createinvitation = New CreateInvitation();
        $createinvitation->name = $request->name;
        $createinvitation->date = $request->date;
        $createinvitation->zone = $request->time_zone;
        $createinvitation->time = $request->time;
        $createinvitation->location = $request->location;
        $createinvitation->phone = $request->phone;
        $createinvitation->type_events = $request->type_events;
        $createinvitation->dress_code = $request->dress_code;
        $createinvitation->food = $request->food;
        $createinvitation->add_info = $request->add_info;
        $createinvitation->add_admin = $request->add_admin;
        $createinvitation->add_chat_room = $request->add_chat_room;
        $createinvitation->invite_more = $request->invite_more;
        $createinvitation->hosted_by = $request->hosted_by;
        $createinvitation->product_id = $request->product_id;
        $createinvitation->message = $request->message;
        $createinvitation->user_id = $request->user_id;
        $createinvitation->custom_image =  $imageName;
        $createinvitation->draft =  $drafts;
        $createinvitation->save();  

        if($createinvitation){
            return response(["status" => true, 'message' => 'Invition Create'], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
    }

    public function createInvitationID(Request $request)
    {
        $product_id = $request->product_id;
        $product = CategoryListing::where('id',$product_id)->first();
        $imagePath = asset('images/product/'.$product->image);
        $data['id'] = $product->id;
        $data['image'] =  $imagePath;

        if($data){
            return response(["status" => true, 'data' => $data], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }

    }

    public function categoryWiseProduct(Request $request)
    {
        $productData = array();
        $categoryListings = CategoryListing::where('category_id',$request->catgeory_id)->get();
        foreach($categoryListings as $categoryListing){
            $imagePath = asset('images/product/'.$categoryListing->image);
            $data = array();
            $data['id'] = $categoryListing->id;
            $data['category_id'] = $categoryListing->category_id;
            $data['color_id'] = $categoryListing->color_id;
            $data['free_or_premium'] = $categoryListing->free_or_premium;
            $data['product_title'] = $categoryListing->product_title;
            $data['image'] = $categoryListing->image;
            $data['image_path'] = $imagePath;
            array_push($productData, $data);
        }
        $item = $categoryListings->count();
        $productEmpty = array();

        if($productData){
            return response(["status" => true,'item' => $item , 'data' => $productData], 200);
        }else{
            return response(["status" => true, 'data' => $productEmpty], 200);
        }

    }

    public function createInvitationWithImage(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'zone' => 'required',
            'location' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'type_events' => 'required',
            'dress_code' => 'required',
            'food' => 'required',
            'add_info' => 'required',
            'add_admin' => 'required',
            'add_chat_room' => 'required',
            'invite_more' => 'required',
            'hosted_by' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);
        $request->image->move(public_path('images/createinvitation'), $imageName);

        $createinvitation = New CreateInvitation();
        $createinvitation->name = $request->name;
        $createinvitation->date = $request->date;
        $createinvitation->zone = $request->time_zone;
        $createinvitation->time = $request->time;
        $createinvitation->location = $request->location;
        $createinvitation->phone = $request->phone;
        $createinvitation->type_events = $request->type_events;
        $createinvitation->dress_code = $request->dress_code;
        $createinvitation->food = $request->food;
        $createinvitation->add_info = $request->add_info;
        $createinvitation->add_admin = $request->add_admin;
        $createinvitation->add_chat_room = $request->add_chat_room;
        $createinvitation->invite_more = $request->invite_more;
        $createinvitation->hosted_by = $request->hosted_by;
        $createinvitation->product_id = $request->product_id;
        $createinvitation->message = $request->message;
        $createinvitation->user_id = $request->user_id;
        $createinvitation->custom_image = $imageName;
        $createinvitation->save();

        if($createinvitation){
            return response(["status" => true, 'data' => $createinvitation], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }
    }

    public function createInvitationView(Request $request)
    {

        $createInvitationView = CreateInvitation::where('user_id',$request->user_id)->first();
        $product = CategoryListing::where('id',$createInvitationView->product_id)->first();

        if($product){
            $imagePath = asset('images/product/'.$product->image);
        }else{
            $imagePath = asset('images/createinvitation/'.$createInvitationView->custom_image);
        }

        $data['image'] =  $imagePath;
        $data['Event Title'] =  $createInvitationView->name;
        $data['Start Date'] =  $createInvitationView->date;
        $data['Event Time'] =  $createInvitationView->time;
        $data['Time Zone'] =  $createInvitationView->zone;
        $data['Hosted By'] =  $createInvitationView->hosted_by;
        $data['Phone_number'] =  $createInvitationView->phone;
        $data['Location'] =  $createInvitationView->location;
        $data['message'] =  $createInvitationView->message;
        $data['Type of Event'] =  $createInvitationView->type_events;
        $data['Dress Code'] =  $createInvitationView->dress_code;
        $data['Food / Beverages'] =  $createInvitationView->food;
        $data['Additional Information'] =  $createInvitationView->add_info;
        $data['Add Additional Admin / Event Organizer'] =  $createInvitationView->add_admin;
        $data['Add Chat Room'] =  $createInvitationView->add_chat_room;
        $data['Invite More Than 2 People'] =  $createInvitationView->invite_more;

        if($data){
            return response(["status" => true, 'data' => $data], 200);
        }else{
            return response(["status" => false, 'data' => 'Not found'], 201);
        }

    }
}
