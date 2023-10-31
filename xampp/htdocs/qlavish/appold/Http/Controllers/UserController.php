<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserCategory;
use App\Models\UserType;
use App\Models\Brand;
use App\Models\CarDiscountAd;
use App\Models\Car;
use App\Models\UserInfo;
use App\Models\Notification;
use App\Models\Car_discount;
class UserController extends Controller
{
    private $message = '';
    // private $data = [];
    public function signup(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
        $user_info = UserInfo::insert($request);
        $user =  User::insert($request,$user_info->id);
        $this->message = "Account has been created";
        // $this->data = [
        // "user" => $user,
        // "user_info"=> $user_info
        // ];
    return response()->json([
        'status' => 'success',
        'message' => $this->message
    ]);
}else{
    return array(
       'message' => 'your app is not authorize to use this Api'
    );
}
    }

   public function userHome(Request $request){
    $app_code = 'qlavish123zxcZXC';
    
    if($request->package_name == $app_code){
           $car_discount_ad = CarDiscountAd::first();
           $brands = Brand::all();
           foreach($brands as $brand){
            $brands_detail[] = array('brand_name' => $brand->brand,
                                      'image_link' => 'http://www.qlavish.com/public/car/logo/'.$brand->brand_logo);
           }

           $cars = Car::where('city_of_availability',$request->user_city)->limit(5)->get(); 
           $userCity = $request->user_city;
           $car_discount = Car_discount::whereHas('car',function($q) use ($userCity) {
               $q->where('city_of_availability',$userCity);
           })->with('car')->limit(5)->get();
            $luxury = Car::where('city_of_availability',$request->user_city)->where('economy','luxury')->limit(5)->get();
            $economy = Car::where('city_of_availability',$request->user_city)->where('economy','economy')->limit(5)->get();
            foreach($luxury as $luxury_car){
                $luxury_cars[] = array(
                    'car_id' => $luxury_car->id,
                    'car_name' => $luxury_car->car_name,
                    'rent_price' => $luxury_car->car_price_daily,
                    'image_link' => 'http://www.qlavish.com/public/'.$luxury_car->car_thumbnail_1
                ); 
            }
            foreach($economy as $economy_car){
                $economy_cars[] = array(
                    'car_id' => $economy_car->id,
                    'car_name' => $economy_car->car_name,
                    'rent_price' => $economy_car->car_price_daily,
                    'image_link' => 'http://www.qlavish.com/public/'.$economy_car->car_thumbnail_1
                ); 
            }
             foreach($car_discount as $discount){
                $car_discounts[] = array(
                    'car_id' => $discount->car->id,
                    'car_name' => $discount->car->car_name,
                    'rent_price' => $discount->car->car_price_daily,
                    'discount_rent' => $discount->discount_1_day,
                    'discount_rate_percentage' => ($discount->car->car_price_daily / $discount->discount_1_day),
                    'image_link' => 'http://www.qlavish.com/public/'.$discount->car->car_thumbnail_1
                );
             }
           foreach($cars as $car){
           $cars_data[] = array('car_id' => $car->id,
                                 'image_link' => 'http://www.qlavish.com/public/'.$car->car_thumbnail_1);
           }
           return array(
            'status' => 'success',
            'message' => 'data fatched',
            'special_discount' => (!empty($car_discount_ad)) ? ['car_id' => $car_discount_ad->id,
                                                                 'image_link' => 'http://www.qlavish.com/public/car/discount/'.$car_discount_ad->image] : [],
            'carousal_data' => (!empty($cars_data)) ? $cars_data : [],
            'brand_data' => (!empty($brands_detail)) ? $brands_detail : [],
            'discounted_cars' => (!empty($car_discounts)) ? $car_discounts : [],
            'luxury_cars' => (!empty($luxury_cars)) ? $luxury_cars : [],
            'economy_cars' => (!empty($economy_cars)) ? $economy_cars : [],
         );
    }else{
    return array(
       'message' => 'your app is not authorize to use this Api'
    );
}
   }

   public function notification(Request $request){
    $app_code = 'qlavish123zxcZXC';
    
    if($request->package_name == $app_code){
         $notifications = Notification::where('user_id',$request->user_id)->with('car','notification_type')->get();

         foreach($notifications as $notification){
            $notification_data[] = array(
                'notification_id' => $notification->id,
                'notification_title' => $notification->notification_title,
                'car_code' => $notification->car->car_code,
                'car_id' => $notification->car->id,
                'notification_code' => $notification->notification_type->notification_code,
                'notification_date' => $notification->created_at,
            );
         }
           return array(
            'status' => 'success',
            'message' => 'data fatched',
            'notifications' =>  (!empty($notification_data)) ? $notification_data : [],
         );
    }else{
    return array(
       'message' => 'your app is not authorize to use this Api'
    );
}
   }

   
    public function signin(Request $request){
          $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
      $user = User::login($request);
      if($user){
        // $this->message = "Login successfully";
        // $this->data = [
        // "user" => $user,
        // ];
        return response()->json($user);
     }
     $this->message = "Email OR Password is incorrect";
     return errorResponse($this->message);
    }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
    }


}
