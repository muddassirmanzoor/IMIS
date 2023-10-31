<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\External_discount;
use App\Models\Other_discount;
use App\Models\Car_discount;
use App\Models\Car_Scratch;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use App\Models\DealDetail;
use Illuminate\Support\Facades\DB;
use App\Models\Deal_Status_Log;
use Illuminate\Support\Facades\Mail;
use App\Models\Dealer_Notification;
use Carbon\Carbon;
use App\Models\Car_Scratch_Status;
use App\Models\Reservation;
use App\Models\Car_requirement;
use App\Models\Scratch_Code;
use Illuminate\Http\Request;
use App\Models\Car_availibility;
class CarController extends Controller
{

    private $message = '';
    private $data = [];
  


   public function sendStatusMail($email,$name,$code)
{
    $data = [
        'name' => $name,
        'code' => $code
    ];
    Mail::send('mail.profile-name', $data, function ($message) use ($email) {
        $message->to($email)->subject('Reset Password');
    });

}
//reset password
public function resetPassword(Request $request){
    $app_code = 'qlavish123zxcZXC';
    if($request->package_name == $app_code){
        $user = User::where('email',$request->email)->first();
          if($user){
            if($user->reset_code == $request->reset_code){
                $user_update = User::find($user->id)->update([
                    'reset_code' => null,
                    'password' => Hash::make($request->password)
               ]);
               return response()->json([
                'status' => 'success',
                'message' => 'Password changed successfully'
            ],200);
            }
            return response()->json([
                'message' => 'Verification Code is Incorrect',
            ],401);
          }else{
            return response()->json([
                'message' => 'Incorrect Email',
            ],400);
          }
    }else{
    return response()->json([
       
            'message' => 'your app is not authorize to use this Api'
        
    ],400);
}
 }
 //end reset
 public function resetPass(Request $request){
    $app_code = 'qlavish123zxcZXC';
     $reset_code = rand(100000, 999999);
    if($request->package_name == $app_code){
        $user = User::where('email',$request->email)->first();
  
          if($user){
          $user_update = User::find($user->id)->update([
                'reset_code' => $reset_code
           ]);
          $this->sendStatusMail($request->email,$user->name,$reset_code);
          }else{
            return response()->json([
                'message' => 'Incorrect Email',
            ]);
          }
        return response()->json([
            'message' => 'success',
            'code' => $reset_code
        ]);
    }else{
    return response()->json([
            'message' => 'your app is not authorize to use this Api'
    ],400);
}
 }
      //car scratch dispute 
      public function scratchDispute(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
                 //insert image process start here
                 $car = new Car_Scratch_Status();
                 $scr_code = new Scratch_Code();
                 $scr_code->scratch_code = 1;
                 $scr_code->save();
          $car_image = [
            0 => ($request->file('car_image1') != '') ? $request->file('car_image1') : '',
            1 => ($request->file('car_image2') != '') ? $request->file('car_image2') : '',
            2 => ($request->file('car_image3') != '') ? $request->file('car_image3') : '',
            3 => ($request->file('car_image4') != '') ? $request->file('car_image4') : '',
            4 => ($request->file('car_image5') != '') ? $request->file('car_image5') : '',
            5 => ($request->file('car_image6') != '') ? $request->file('car_image6') : '',
            6 => ($request->file('car_image7') != '') ? $request->file('car_image7') : '',
            7 => ($request->file('car_image8') != '') ? $request->file('car_image8') : '',
            8 => ($request->file('car_image9') != '') ? $request->file('car_image9') : '',
            9 => ($request->file('car_image10') != '') ? $request->file('car_image10') : '',
          ];
          $car_image_array[]='';
          for($i = 0; $i< 10 ;$i++){
            if($car_image[$i] != ''){
            $car_image_array[] = insertImg($car_image[$i],'car/scratch_dispute/image/','car/scratch_dispute/thumb/');
            }
          }
          $car->car_image1 = isset($car_image_array[1]['image']) ? $car_image_array[1]['image'] : '';
          $car->car_image2 = isset($car_image_array[2]['image']) ? $car_image_array[2]['image'] : '';
          $car->car_image3 = isset($car_image_array[3]['image']) ? $car_image_array[3]['image'] : '';
          $car->car_image4 = isset($car_image_array[4]['image']) ? $car_image_array[4]['image'] : '';
          $car->car_image5 = isset($car_image_array[5]['image']) ? $car_image_array[5]['image'] : '';
          $car->car_image6 = isset($car_image_array[6]['image']) ? $car_image_array[6]['image'] : '';
          $car->car_image7 = isset($car_image_array[7]['image']) ? $car_image_array[7]['image'] : '';
          $car->car_image8 = isset($car_image_array[8]['image']) ? $car_image_array[8]['image'] : '';
          $car->car_image9 = isset($car_image_array[9]['image']) ? $car_image_array[9]['image'] : '';
          $car->car_image10 = isset($car_image_array[10]['image']) ? $car_image_array[10]['image'] : '';
          $car->car_image1_thumbnail = isset($car_image_array[1]['thumb']) ? $car_image_array[1]['thumb'] : '';
          $car->car_image2_thumbnail =  isset($car_image_array[2]['thumb']) ? $car_image_array[2]['thumb'] : '';
          $car->car_image3_thumbnail =  isset($car_image_array[3]['thumb']) ? $car_image_array[3]['thumb'] : '';
          $car->car_image4_thumbnail =  isset($car_image_array[4]['thumb']) ? $car_image_array[4]['thumb'] : '';
          $car->car_image5_thumbnail =  isset($car_image_array[5]['thumb']) ? $car_image_array[5]['thumb'] : '';
          $car->car_image6_thumbnail =  isset($car_image_array[6]['thumb']) ? $car_image_array[6]['thumb'] : '';
          $car->car_image7_thumbnail =  isset($car_image_array[7]['thumb']) ? $car_image_array[7]['thumb'] : '';
          $car->car_image8_thumbnail =  isset($car_image_array[8]['thumb']) ? $car_image_array[8]['thumb'] : '';
          $car->car_image9_thumbnail =  isset($car_image_array[9]['thumb']) ? $car_image_array[9]['thumb'] : '';
          $car->car_image10_thumbnail =  isset($car_image_array[10]['thumb']) ? $car_image_array[10]['thumb'] : '';
          $car->scratch_message = !empty($request->note) ? $request->note : '';
          $car->deal_id = $request->deal_id;
          $car->scratch_code_id = $scr_code->id;
           $car->save();
           if(isset($car) && isset($scr_code)){
            return response()->json([
                'status' => 'success',
                'message' => 'saved successfully',
            ],200);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'something went wrong',
            ],400);
        }
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
       }

    
    public function getCarData(Request $request,$id,$city){
            if($id && $city)
            {
            $user = User::where('id',$id)->with('user_info','user_type','user_category')->first();
            $cars = Car::where('car_pickup_location',$city)->with('brand','car_type','car_economy','car_category')->get();
            if($user){
                $this->message = "Car Data fetched by City successfully";
                $this->data = [
                "car" => $cars,
                "user" => $user
                ];
            return successResponse($this->message,$this->data);
           }else{
               $this->message = "No data found";
          return errorResponse($this->message);
          }
        }
        }

        Public function getCarDataByBrand(Request $request,$id,$city,$brand){
            if($id && $city && $brand)
            {
            $user = User::find($id)->with('user_info','user_type','user_category')->first();
            $cars = Car::where('car_pickup_location',$city)->whereHas('brand', function($q) use($brand){
                    $q->where('brand',$brand);
            })->with('brand','car_type','car_economy','car_category')->get();

            if($user && !$cars->isEmpty()){
                $this->message = "Car Data fetched by Brand successfully";
                $this->data = [
                "car" => $cars,
                "user" => $user
                ];
            return successResponse($this->message,$this->data);
           }else{
               $this->message = "No data found";
          return errorResponse($this->message);
          }
        }
        }

        public function getCarDataByCategory(Request $request,$id,$city,$category){
            if($id && $city && $category)
            {
            $user = User::where('id',$id)->with('user_info','user_type','user_category')->first();
                 $cars = Car::where('car_pickup_location',$city)->whereHas('car_category', function($q) use($category){
                    $q->where('car_category',$category);
                })->with('brand','car_type','car_economy','car_category')->get();
            if($user && !$cars->isEmpty()){
                $this->message = "Car Data fetched by Category successfully";
                $this->data = [
                "car" => $cars,
                "user" => $user
                ];
            return successResponse($this->message,$this->data);
           }else{
               $this->message = "No data found";
          return errorResponse($this->message);
          }
        }
        }
        public function getDiscountByType(Request $request,$city,$type){

              if($type == 1){
                $cars = Car_discount::whereHas('car', function($q) use($city){
                    $q->where('car_pickup_location',$city);
                })->get();
                if(!$cars->isEmpty()){
                    $this->message = "Car Discount Data fetched successfully";
                    $this->data = [
                    "cars" => $cars,
                    ];
                return successResponse($this->message,$this->data);
               }
            }

               if($type == 2){
                $data = External_discount::where('city',$city)->get();
                 if(!$data->isEmpty()){
                    $this->message = "External Discount Data fetched successfully";
                     $this->data = [
                    "cars" => $cars,
                           ];
                  return successResponse($this->message,$this->data);
                }
      }

                if($type == 3){
                $data = Other_discount::where('city',$city)->get();
                if(!$data->isEmpty()){
                    $this->message = "Other Discount Data fetched successfully";
                    $this->data = [
                   "cars" => $cars,
                          ];
                 return successResponse($this->message,$this->data);
          }
       }
           $this->message = 'No data found';
           return errorResponse($this->message);
    }

    private function checkNull($value){
        return (isset($value)) ? $value : '';
    }
    private function checkIntNull($value){
        return (isset($value)) ? (int)$value : 0;
    }
    private function checkDoubleNull($value){
        return (isset($value)) ? (double)$value : 0;
    }
    //car discount
    public function carDiscount(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
               $userCity = $request->user_city;
               $car_discount = Car_discount::whereHas('car',function($q) use ($userCity) {
                   $q->where('city_of_availability',$userCity);
               })->with('car')->get();
                 foreach($car_discount as $discount){
                    $car_discounts[] = array(
                        'car_id' => $discount->car->id,
                        'car_name' => $discount->car->car_name,
                        'rent_price' => $discount->car->car_price_daily,
                        'discount_rent' => $discount->discount_1_day,
                        'discount_rate_percentage' => ($discount->car->car_price_daily / $discount->discount_1_day),
                        'car_class' => $discount->car->class,
                        'year' => $discount->car->car_year,
                        'mileage_limit' => $discount->car->car_mileage_limit,
                        'image_link' => 'http://www.qlavish.com/public/'.$discount->car->car_thumbnail_1
                    );
                 }
               return array(
                'status' => 'success',
                'message' => 'data fatched',
                'discounted_cars' => (!empty($car_discounts)) ? $car_discounts : [],
             );
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
       }
           //other discounts
    public function carOtherDiscount(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
               $car_other_discount = Other_discount::get();
               foreach($car_other_discount as $discount){
                $car_other_discounts[] = array(
                    'other_discount_id' => $discount->id,
                    'discount_name' => $discount->other_discount_title,
                    'discount_rate' => $discount->other_discount_value,
                    'image_link' => 'http://www.qlavish.com/public/car/others/thumbs/'.$discount->other_discount_thumbnail
                );
             }
               return array(
                'status' => 'success',
                'message' => 'data fatched',
                'other_discounts' => (!empty($car_other_discounts)) ? $car_other_discounts : [],
             );
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
       }

          //external discounts
    public function carExternalDiscount(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
               $car_external_discount = External_discount::get();
               foreach($car_external_discount as $discount){
                $car_external_discounts[] = array(
                    'external_discount_id' => $discount->id,
                    'discount_name' => $discount->discount_title,
                    'discount_code' => $discount->discount_code,
                    'discount_rate' => $discount->ext_discount_value,
                    'discount_usage' => $discount->time_usage,
                    'image_link' => 'http://www.qlavish.com/public/car/externals/thumbs/'.$discount->image_thumbnail
                );
             }
               return array(
                'status' => 'success',
                'message' => 'data fatched',
                'external_discounts' => (!empty($car_external_discounts)) ? $car_external_discounts : [],
             
             );
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
       }
              //car search on city category
              public function carCategorySearch(Request $request){
                $app_code = 'qlavish123zxcZXC';
                if($request->package_name == $app_code){
                    if(!empty($request->car_type) && !empty($request->city_name)){
                        $car_data = Car::where('city_of_availability',$request->city_name)->where('category',$request->car_type)->get();
                        foreach($car_data as $car){
                            $data[] = array(
                            'car_id' => $car->id,
                            'car_code' => $this->checkNull($car->car_code),
                            'car_name' => $this->checkNull($car->car_name),
                            'car_company' => $this->checkNull($car->brand->brand),
                            'car_year' => (isset($car->car_year)) ? (int)$car->car_year : 0,
                            'car_gear' => $this->checkNull($car->car_gear_box),
                            'car_engine' => $this->checkNull($car->car_engine),
                            'car_mileage' => (isset($car->car_mileage_limit)) ? (int)$car->car_mileage_limit : 0,
                            'car_drive' => $this->checkNull($car->car_drive),
                            'car_transmission' => $this->checkNull($car->car_transmission),
                            'top_speed' => (isset($car->car_top_speed)) ? (int)$car->car_top_speed : 0,
                            'fit_for' => (isset($car->car_pessenger)) ? (int)$car->car_pessenger : 0,
                            'car_insurance_value' =>(isset($car->car_insurrance)) ? (int)$car->car_insurrance : 0,
                            'car_daily_rent' => (isset($car->car_price_daily)) ? (int)$car->car_price_daily : 0,
                            'car_weekly_rent' => (isset($car->car_price_weekly)) ? (int)$car->car_price_weekly : 0,
                            'car_monthly_rent' => (isset($car->car_price_monthly)) ? (int)$car->car_price_monthly : 0,
                            'car_city' => $this->checkNull($car->city_of_availability),
                            'thumb_1' => (!empty($car->car_thumbnail_1)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_1 : '',
                            'thumb_2' => (!empty($car->car_thumbnail_2)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_2 : '',
                            'thumb_3' => (!empty($car->car_thumbnail_3)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_3 : '',
                            'thumb_4' => (!empty($car->car_thumbnail_4)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_4 : '',
                            'thumb_5' => (!empty($car->car_thumbnail_5)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_5 : '',
                            'thumb_6' => (!empty($car->car_thumbnail_6)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_6 : '',
                            'thumb_7' => (!empty($car->car_thumbnail_7)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_7 : '',
                            'thumb_8' => (!empty($car->car_thumbnail_8)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_8 : '',
                            'image_1' => (!empty($car->car_image_1)) ? 'http://www.qlavish.com/public/'.$car->car_image_1 : '',
                            'image_2' => (!empty($car->car_image_2)) ? 'http://www.qlavish.com/public/'.$car->car_image_2 : '',
                            'image_3' => (!empty($car->car_image_3)) ? 'http://www.qlavish.com/public/'.$car->car_image_3 : '',
                            'image_4' => (!empty($car->car_image_4)) ? 'http://www.qlavish.com/public/'.$car->car_image_4 : '',
                            'image_5' => (!empty($car->car_image_5)) ? 'http://www.qlavish.com/public/'.$car->car_image_5 : '',
                            'image_6' => (!empty($car->car_image_6)) ? 'http://www.qlavish.com/public/'.$car->car_image_6 : '',
                            'image_7' => (!empty($car->car_image_7)) ? 'http://www.qlavish.com/public/'.$car->car_image_7 : '',
                            'image_8' => (!empty($car->car_image_8)) ? 'http://www.qlavish.com/public/'.$car->car_image_8 : '',
                            );
                        }
                        return response()->json([
                            'status' => 'success',
                            'message' => 'data fatched',
                            'car_data' => (!empty($data)) ? $data : [],
                         ]);
                     }
                        $car_data= Car::where('city_of_availability',$request->city_name)->where('car_name', 'LIKE', "%{$request->car_name}%")->get();
                        foreach($car_data as $car){
                            $data[] = array(
                            'car_id' => $car->id,
                            'car_code' => $this->checkNull($car->car_code),
                            'car_name' => $this->checkNull($car->car_name),
                            'car_company' => $this->checkNull($car->brand->brand),
                            'car_year' => (isset($car->car_year)) ? (int)$car->car_year : 0,
                            'car_gear' => $this->checkNull($car->car_gear_box),
                            'car_engine' => $this->checkNull($car->car_engine),
                            'car_mileage' => (isset($car->car_mileage_limit)) ? (int)$car->car_mileage_limit : 0,
                            'car_drive' => $this->checkNull($car->car_drive),
                            'car_transmission' => $this->checkNull($car->car_transmission),
                            'top_speed' => (isset($car->car_top_speed)) ? (int)$car->car_top_speed : 0,
                            'fit_for' => (isset($car->car_pessenger)) ? (int)$car->car_pessenger : 0,
                            'car_insurance_value' =>(isset($car->car_insurrance)) ? (int)$car->car_insurrance : 0,
                            'car_daily_rent' => (isset($car->car_price_daily)) ? (int)$car->car_price_daily : 0,
                            'car_weekly_rent' => (isset($car->car_price_weekly)) ? (int)$car->car_price_weekly : 0,
                            'car_monthly_rent' => (isset($car->car_price_monthly)) ? (int)$car->car_price_monthly : 0,
                            'car_city' => $this->checkNull($car->city_of_availability),
                            'thumb_1' => (!empty($car->car_thumbnail_1)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_1 : '',
                            'thumb_2' => (!empty($car->car_thumbnail_2)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_2 : '',
                            'thumb_3' => (!empty($car->car_thumbnail_3)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_3 : '',
                            'thumb_4' => (!empty($car->car_thumbnail_4)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_4 : '',
                            'thumb_5' => (!empty($car->car_thumbnail_5)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_5 : '',
                            'thumb_6' => (!empty($car->car_thumbnail_6)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_6 : '',
                            'thumb_7' => (!empty($car->car_thumbnail_7)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_7 : '',
                            'thumb_8' => (!empty($car->car_thumbnail_8)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_8 : '',
                            'image_1' => (!empty($car->car_image_1)) ? 'http://www.qlavish.com/public/'.$car->car_image_1 : '',
                            'image_2' => (!empty($car->car_image_2)) ? 'http://www.qlavish.com/public/'.$car->car_image_2 : '',
                            'image_3' => (!empty($car->car_image_3)) ? 'http://www.qlavish.com/public/'.$car->car_image_3 : '',
                            'image_4' => (!empty($car->car_image_4)) ? 'http://www.qlavish.com/public/'.$car->car_image_4 : '',
                            'image_5' => (!empty($car->car_image_5)) ? 'http://www.qlavish.com/public/'.$car->car_image_5 : '',
                            'image_6' => (!empty($car->car_image_6)) ? 'http://www.qlavish.com/public/'.$car->car_image_6 : '',
                            'image_7' => (!empty($car->car_image_7)) ? 'http://www.qlavish.com/public/'.$car->car_image_7 : '',
                            'image_8' => (!empty($car->car_image_8)) ? 'http://www.qlavish.com/public/'.$car->car_image_8 : '',
                            );
                        }
                        return response()->json([
                        'status' => 'success',
                        'message' => 'data fatched',
                        'car_data' => (!empty($data)) ? $data : [],
                     ]);
                }else{
                return array(
                   'message' => 'your app is not authorize to use this Api'
                );
            }
             }
             //end here

       //check car availibilty
       public function checkAvailibility(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){

            $car_start_availibility = Car_availibility::where('car_id', $request->car_id)
            ->whereBetween('start_date', [$request->start_date, $request->end_date])->first();

            $car_end_availibility = Car_availibility::where('car_id', $request->car_id)
            ->whereBetween('end_date', [$request->start_date, $request->end_date])->first();

            // $car_status = Car_availibility::where('car_id', $request->car_id)
            // ->whereDate('start_date','>',$request->start_date)->whereDate('end_date','<',$request->end_date)->first();
          
     
               return response()->json([
                'status' => 'success',
                'message' => 'data fatched',
                'car_availibility' => ((empty($car_start_availibility) && empty($car_end_availibility)) && !isset($car_status))  ? true : false,
             ]);
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
     }
       //brands detail 
       public function carAllBrand(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
               $car_brands = Brand::get();
               foreach($car_brands as $brand){
                $brands[] = array(
                    'brand_id' => $brand->id,
                    'brand_name' => (isset($brand->brand)) ? $brand->brand : '',
                    'image_link' => (isset($brand->brand_logo)) ? 'http://www.qlavish.com/public/uploads/brands/'.$brand->brand_logo : '',
                );
             }
               return response()->json([
                'status' => 'success',
                'message' => 'data fatched',
                'brands_data' => (!empty($brands)) ? $brands : [],
             ]);
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
     }
    //new api's
    public function carDiscountAll(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
               $userCity = $request->user_city;
               $car_discount = Car_discount::whereHas('car',function($q) use ($userCity) {
                   $q->where('city_of_availability',$userCity);
               })->with('car')->limit(5)->get();

               $car_external_discount = External_discount::limit(5)->get();
               $car_other_discount = Other_discount::limit(5)->get();
               foreach($car_external_discount as $discount){
                $car_external_discounts[] = array(
                    'external_discount_id' => $discount->id,
                    'discount_name' => $discount->discount_title,
                    'discount_code' => $discount->discount_code,
                    'discount_rate' => $discount->ext_discount_value,
                    'discount_usage' => $discount->time_usage,
                    'image_link' => 'http://www.qlavish.com/public/uploads/external_discount/'.$discount->image_thumbnail
                );
             }
             foreach($car_other_discount as $discount){
                $car_other_discounts[] = array(
                    'other_discount_id' => $discount->id,
                    'discount_name' => $discount->other_discount_title,
                    'discount_rate' => $discount->other_discount_value,
                    'image_link' => 'http://www.qlavish.com/public/car/others/thumbs/'.$discount->other_discount_thumbnail
                );
             }
                 foreach($car_discount as $discount){
                    $car_discounts[] = array(
                        'car_id' => $discount->car->id,
                        'car_name' => $discount->car->car_name,
                        'rent_price' => $discount->car->car_price_daily,
                        'discount_rent' => $discount->discount_1_day,
                        'discount_rate_percentage' => ($discount->car->car_price_daily / $discount->discount_1_day),
                        'car_class' => $discount->car->class,
                        'year' => $discount->car->car_year,
                        'image_link' => 'http://www.qlavish.com/public/'.$discount->car->car_thumbnail_1
                    );
                 }
               return array(
                'status' => 'success',
                'message' => 'data fatched',
                'discounted_cars' => (!empty($car_discounts)) ? $car_discounts : [],
                'external_discounts' => (!empty($car_external_discounts)) ? $car_external_discounts : [],
                'other_discounts' => (!empty($car_other_discounts)) ? $car_other_discounts : [],
             );
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
       }
       public function searchCar(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
              $car = Car::where('id',$request->car_id)->with('brand')->first();
              $dealer = User::where('id',$car->user_id)->with('user_info')->first();
              $car_discount = Car_discount::where('car_id',$request->car_id)->first();
                    $car_images = array(
                        [
                        'car_image' => (!empty($car->car_image_1)) ? 'http://www.qlavish.com/public/'.$car->car_image_1 : '',
                        ],
                        [
                            'car_image' => (!empty($car->car_image_2)) ? 'http://www.qlavish.com/public/'.$car->car_image_2 : '',
                        ],
                        [
                            'car_image' => (!empty($car->car_image_3)) ? 'http://www.qlavish.com/public/'.$car->car_image_3 : '',
                            ],
                            [
                                'car_image' => (!empty($car->car_image_4)) ? 'http://www.qlavish.com/public/'.$car->car_image_4 : '',
                            ],
                            [
                                'car_image' => (!empty($car->car_image_5)) ? 'http://www.qlavish.com/public/'.$car->car_image_5 : '',
                                ],
                                [
                                    'car_image' => (!empty($car->car_image_6)) ? 'http://www.qlavish.com/public/'.$car->car_image_6 : '',
                                ], [
                                    'car_image' => (!empty($car->car_image_7)) ? 'http://www.qlavish.com/public/'.$car->car_image_7 : '',
                                    ],
                                    [
                                        'car_image' => (!empty($car->car_image_8)) ? 'http://www.qlavish.com/public/'.$car->car_image_8 : '',
                                    ],
                    );
        
               return response()->json([
                'status' => 'success',
                'message' => 'data fatched',
                'car_data' => [
                    'car_id' => $car->id,
                    'car_code' => $this->checkNull($car->car_code),
                    'car_name' => $this->checkNull($car->car_name),
                    'car_company' => $this->checkNull($car->brand->brand),
                    'car_year' => (isset($car->car_year)) ? (int)$car->car_year : 0,
                    'car_gear' => $this->checkNull($car->car_gear_box),
                    'car_engine' => $this->checkNull($car->car_engine),
                    'car_mileage' => (isset($car->car_mileage_limit)) ? (int)$car->car_mileage_limit : 0,
                    'car_drive' => $this->checkNull($car->car_drive),
                    'car_transmission' => $this->checkNull($car->car_transmission),
                    'top_speed' => (isset($car->car_top_speed)) ? (int)$car->car_top_speed : 0,
                    'fit_for' => (isset($car->car_pessenger)) ? (int)$car->car_pessenger : 0,
                    'car_insurance_value' =>(isset($car->car_insurrance)) ? (int)$car->car_insurrance : 0,
                    'car_daily_rent' => (isset($car->car_price_daily)) ? (int)$car->car_price_daily : 0,
                    'car_weekly_rent' => (isset($car->car_price_weekly)) ? (int)$car->car_price_weekly : 0,
                    'car_monthly_rent' => (isset($car->car_price_monthly)) ? (int)$car->car_price_monthly : 0,
                    'pickup_location' => $this->checkNull($dealer->user_info->car_delivery_address),
                    'car_images' => (!empty($car_images)) ? $car_images : [],
                    'car_discount' =>[
                        'day 1' => (isset($car_discount->discount_1_day)) ? (int)$car_discount->discount_1_day : 0,
                        'day 2' => (isset($car_discount->discount_2_day)) ? (int)$car_discount->discount_2_day : 0,
                        'day 3' => (isset($car_discount->discount_3_day)) ? (int)$car_discount->discount_3_day : 0,
                        'day 4' => (isset($car_discount->discount_4_day)) ? (int)$car_discount->discount_4_day : 0,
                        'day 5' => (isset($car_discount->discount_5_day)) ? (int)$car_discount->discount_5_day : 0,
                        'day 6-10' => (isset($car_discount->discount_6_10_day)) ? (int)$car_discount->discount_6_10_day : 0,
                        'day 11-15' => (isset($car_discount->discount_11_15_day)) ? (int)$car_discount->discount_11_15_day : 0,
                        'day 16-20' => (isset($car_discount->discount_16_20_day)) ? (int)$car_discount->discount_16_20_day : 0,
                        'day 21-25' => (isset($car_discount->discount_21_25_day)) ? (int)$car_discount->discount_21_25_day : 0,
                        'day 26-30' => (isset($car_discount->discount_26_30_day)) ? (int)$car_discount->discount_26_30_day : 0,
                    ],
                    'car_xtras' => [
                        'mileage_cost' => (isset($car->mileage_amount_per_km)) ? (int)$car->mileage_amount_per_km : 0,
                        'driver_cost' => (isset($car->personal_driver_cost)) ? (int)$car->personal_driver_cost : 0,
                        'child_seat' => (isset($car->child_seat_cost)) ? (int)$car->child_seat_cost : 0,
                        'toll_charges' => (isset($car->toll_cost)) ? (int)$car->toll_cost : 0,
                    ],
                ],
               ],200);
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
       }        //search by brand and city
       Public function getCarByEconomy(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
              $car_data = Car::where('city_of_availability',$request->car_city)->where('economy','Economy')->get();
            foreach($car_data as $car){
                $data[] = array(
                'car_id' => $car->id,
                'car_code' => $this->checkNull($car->car_code),
                'car_name' => $this->checkNull($car->car_name),
                'car_company' => $this->checkNull($car->brand->brand),
                'car_year' => (isset($car->car_year)) ? (int)$car->car_year : 0,
                'car_gear' => $this->checkNull($car->car_gear_box),
                'car_engine' => $this->checkNull($car->car_engine),
                'car_mileage' => (isset($car->car_mileage_limit)) ? (int)$car->car_mileage_limit : 0,
                'car_drive' => $this->checkNull($car->car_drive),
                'car_transmission' => $this->checkNull($car->car_transmission),
                'top_speed' => (isset($car->car_top_speed)) ? (int)$car->car_top_speed : 0,
                'fit_for' => (isset($car->car_pessenger)) ? (int)$car->car_pessenger : 0,
                'car_insurance_value' =>(isset($car->car_insurrance)) ? (int)$car->car_insurrance : 0,
                'car_daily_rent' => (isset($car->car_price_daily)) ? (int)$car->car_price_daily : 0,
                'car_weekly_rent' => (isset($car->car_price_weekly)) ? (int)$car->car_price_weekly : 0,
                'car_monthly_rent' => (isset($car->car_price_monthly)) ? (int)$car->car_price_monthly : 0,
                'car_city' => $this->checkNull($car->city_of_availability),
                'thumb_1' => (!empty($car->car_thumbnail_1)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_1 : '',
                'thumb_2' => (!empty($car->car_thumbnail_2)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_2 : '',
                'thumb_3' => (!empty($car->car_thumbnail_3)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_3 : '',
                'thumb_4' => (!empty($car->car_thumbnail_4)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_4 : '',
                'thumb_5' => (!empty($car->car_thumbnail_5)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_5 : '',
                'thumb_6' => (!empty($car->car_thumbnail_6)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_6 : '',
                'thumb_7' => (!empty($car->car_thumbnail_7)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_7 : '',
                'thumb_8' => (!empty($car->car_thumbnail_8)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_8 : '',
                'image_1' => (!empty($car->car_image_1)) ? 'http://www.qlavish.com/public/'.$car->car_image_1 : '',
                'image_2' => (!empty($car->car_image_2)) ? 'http://www.qlavish.com/public/'.$car->car_image_2 : '',
                'image_3' => (!empty($car->car_image_3)) ? 'http://www.qlavish.com/public/'.$car->car_image_3 : '',
                'image_4' => (!empty($car->car_image_4)) ? 'http://www.qlavish.com/public/'.$car->car_image_4 : '',
                'image_5' => (!empty($car->car_image_5)) ? 'http://www.qlavish.com/public/'.$car->car_image_5 : '',
                'image_6' => (!empty($car->car_image_6)) ? 'http://www.qlavish.com/public/'.$car->car_image_6 : '',
                'image_7' => (!empty($car->car_image_7)) ? 'http://www.qlavish.com/public/'.$car->car_image_7 : '',
                'image_8' => (!empty($car->car_image_8)) ? 'http://www.qlavish.com/public/'.$car->car_image_8 : '',
                );
            }
               return response()->json([
                'status' => 'success',
                'message' => 'data fatched',
                'data' => (!empty($data)) ? $data : [],
             ]);
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
        }
    }
               //search  by luxury economy
               Public function getCarByLuxury(Request $request){
                $app_code = 'qlavish123zxcZXC';
                if($request->package_name == $app_code){
                      $car_data = Car::where('city_of_availability',$request->car_city)->where('economy','Luxury')->get();
                    foreach($car_data as $car){
                        $data[] = array(
                        'car_id' => $car->id,
                        'car_code' => $this->checkNull($car->car_code),
                        'car_name' => $this->checkNull($car->car_name),
                        'car_company' => $this->checkNull($car->brand->brand),
                        'car_year' => (isset($car->car_year)) ? (int)$car->car_year : 0,
                        'car_gear' => $this->checkNull($car->car_gear_box),
                        'car_engine' => $this->checkNull($car->car_engine),
                        'car_mileage' => (isset($car->car_mileage_limit)) ? (int)$car->car_mileage_limit : 0,
                        'car_drive' => $this->checkNull($car->car_drive),
                        'car_transmission' => $this->checkNull($car->car_transmission),
                        'top_speed' => (isset($car->car_top_speed)) ? (int)$car->car_top_speed : 0,
                        'fit_for' => (isset($car->car_pessenger)) ? (int)$car->car_pessenger : 0,
                        'car_insurance_value' =>(isset($car->car_insurrance)) ? (int)$car->car_insurrance : 0,
                        'car_daily_rent' => (isset($car->car_price_daily)) ? (int)$car->car_price_daily : 0,
                        'car_weekly_rent' => (isset($car->car_price_weekly)) ? (int)$car->car_price_weekly : 0,
                        'car_monthly_rent' => (isset($car->car_price_monthly)) ? (int)$car->car_price_monthly : 0,
                        'car_city' => $this->checkNull($car->city_of_availability),
                        'thumb_1' => (!empty($car->car_thumbnail_1)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_1 : '',
                        'thumb_2' => (!empty($car->car_thumbnail_2)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_2 : '',
                        'thumb_3' => (!empty($car->car_thumbnail_3)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_3 : '',
                        'thumb_4' => (!empty($car->car_thumbnail_4)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_4 : '',
                        'thumb_5' => (!empty($car->car_thumbnail_5)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_5 : '',
                        'thumb_6' => (!empty($car->car_thumbnail_6)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_6 : '',
                        'thumb_7' => (!empty($car->car_thumbnail_7)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_7 : '',
                        'thumb_8' => (!empty($car->car_thumbnail_8)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_8 : '',
                        'image_1' => (!empty($car->car_image_1)) ? 'http://www.qlavish.com/public/'.$car->car_image_1 : '',
                        'image_2' => (!empty($car->car_image_2)) ? 'http://www.qlavish.com/public/'.$car->car_image_2 : '',
                        'image_3' => (!empty($car->car_image_3)) ? 'http://www.qlavish.com/public/'.$car->car_image_3 : '',
                        'image_4' => (!empty($car->car_image_4)) ? 'http://www.qlavish.com/public/'.$car->car_image_4 : '',
                        'image_5' => (!empty($car->car_image_5)) ? 'http://www.qlavish.com/public/'.$car->car_image_5 : '',
                        'image_6' => (!empty($car->car_image_6)) ? 'http://www.qlavish.com/public/'.$car->car_image_6 : '',
                        'image_7' => (!empty($car->car_image_7)) ? 'http://www.qlavish.com/public/'.$car->car_image_7 : '',
                        'image_8' => (!empty($car->car_image_8)) ? 'http://www.qlavish.com/public/'.$car->car_image_8 : '',
                        );
                    }
                       return response()->json([
                        'status' => 'success',
                        'message' => 'data fatched',
                        'data' => (!empty($data)) ? $data : [],
                     ]);
                }else{
                return array(
                   'message' => 'your app is not authorize to use this Api'
                );
                }
            }
        //search by brand and city
        Public function getCarByCityAndBrand(Request $request){
            $app_code = 'qlavish123zxcZXC';
            if($request->package_name == $app_code){
                $brand = $request->brand_name;
                  $car_data = Car::where('city_of_availability',$request->car_city)->wherehas('brand',function($query) use ($brand){
                    $query->where('brand',$brand);
                })->get();
                foreach($car_data as $car){
                    $data[] = array(
                    'car_id' => $car->id,
                    'car_code' => $this->checkNull($car->car_code),
                    'car_name' => $this->checkNull($car->car_name),
                    'car_company' => $this->checkNull($car->brand->brand),
                    'car_year' => (isset($car->car_year)) ? (int)$car->car_year : 0,
                    'car_gear' => (isset($car->car_gear_box)) ? (int)$car->car_gear_box : 0,
                    'car_engine' => (isset($car->car_engine)) ? (int)$car->car_engine : 0,
                    'car_mileage' => (isset($car->car_mileage_limit)) ? (int)$car->car_mileage_limit : 0,
                    'car_drive' => $this->checkNull($car->car_drive),
                    'car_transmission' => $this->checkNull($car->car_transmission),
                    'top_speed' => (isset($car->car_top_speed)) ? (int)$car->car_top_speed : 0,
                    'fit_for' => (isset($car->car_pessenger)) ? (int)$car->car_pessenger : 0,
                    'car_insurance_value' =>(isset($car->car_insurrance)) ? (int)$car->car_insurrance : 0,
                    'car_daily_rent' => (isset($car->car_price_daily)) ? (int)$car->car_price_daily : 0,
                    'car_weekly_rent' => (isset($car->car_price_weekly)) ? (int)$car->car_price_weekly : 0,
                    'car_monthly_rent' => (isset($car->car_price_monthly)) ? (int)$car->car_price_monthly : 0,
                    'car_city' => $this->checkNull($car->city_of_availability),
                    'thumb_1' => (!empty($car->car_thumbnail_1)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_1 : '',
                    'thumb_2' => (!empty($car->car_thumbnail_2)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_2 : '',
                    'thumb_3' => (!empty($car->car_thumbnail_3)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_3 : '',
                    'thumb_4' => (!empty($car->car_thumbnail_4)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_4 : '',
                    'thumb_5' => (!empty($car->car_thumbnail_5)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_5 : '',
                    'thumb_6' => (!empty($car->car_thumbnail_6)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_6 : '',
                    'thumb_7' => (!empty($car->car_thumbnail_7)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_7 : '',
                    'thumb_8' => (!empty($car->car_thumbnail_8)) ? 'http://www.qlavish.com/public/'.$car->car_thumbnail_8 : '',
                    'image_1' => (!empty($car->car_image_1)) ? 'http://www.qlavish.com/public/'.$car->car_image_1 : '',
                    'image_2' => (!empty($car->car_image_2)) ? 'http://www.qlavish.com/public/'.$car->car_image_2 : '',
                    'image_3' => (!empty($car->car_image_3)) ? 'http://www.qlavish.com/public/'.$car->car_image_3 : '',
                    'image_4' => (!empty($car->car_image_4)) ? 'http://www.qlavish.com/public/'.$car->car_image_4 : '',
                    'image_5' => (!empty($car->car_image_5)) ? 'http://www.qlavish.com/public/'.$car->car_image_5 : '',
                    'image_6' => (!empty($car->car_image_6)) ? 'http://www.qlavish.com/public/'.$car->car_image_6 : '',
                    'image_7' => (!empty($car->car_image_7)) ? 'http://www.qlavish.com/public/'.$car->car_image_7 : '',
                    'image_8' => (!empty($car->car_image_8)) ? 'http://www.qlavish.com/public/'.$car->car_image_8 : '',
                    );
                }
                   return response()->json([
                    'status' => 'success',
                    'message' => 'data fatched',
                    'data' => (!empty($data)) ? $data : [],
                 ]);
            }else{
            return array(
               'message' => 'your app is not authorize to use this Api'
            );
            }
        }

    //end new api's
        Public function getCarById(Request $request,$id){
            if($id)
            {

            $car = Car::where('id',$id)->with('brand','car_type','car_economy','car_category')->first();
            if($car){
                $this->message = "Car Data fetched successfully";
                $this->data = [
                "car" => $car,
                ];
            return successResponse($this->message,$this->data);
           }else{
               $this->message = "No data found";
          return errorResponse($this->message);
          }
        }
        }

        //deals functons starts here
        public function carDealRequest(Request $request){
            $app_code = 'qlavish123zxcZXC';
            $db_check = false;
            if($request->package_name == $app_code){
                DB::transaction(function () use(&$db_check,$request){
                   $deal_detail = new DealDetail();
                   $car_req = new Car_requirement(); 
                   $car_res = new Reservation();
                   $notification  =new Dealer_Notification();
                   $deal_status_log = new Deal_Status_Log();
                   $passport = insertOnlyImg($request->file('image_passport'),'deal/passport/');
                   $driving_front = insertOnlyImg($request->file('image_driving_license_front'),'deal/driving_front/');
                   $driving_back = insertOnlyImg($request->file('image_driving_license_back'),'deal/driving_back/'); 
                   $car_req->insurrance_deposit_value = $this->checkDoubleNull($request->car_insurance); 
                   $car_req->driving_license = $request->is_idl; 
                   $car_req->valid_passport = $request->is_passport;
                   $car_req->driving_license_front = $driving_front['image'];
                   $car_req->driving_license_back = $driving_back['image'];
                   $car_req->passport =  $passport['image'];
                   $car_req->save();
                   
                   $car_res->transaction_id = $request->transaction_id;
                   $car_res->amount_paid = $request->reservation_amount;
                   $car_res->save();

                   $deal_detail->user_id = $request->user_id;
                   $deal_detail->car_id = $request->car_id;
                   $deal_detail->car_res_id =  $car_res->id;
                   $deal_detail->car_req_id = $car_req->id;
                   $deal_detail->start_date = $request->start_date;
                   $deal_detail->end_date = $request->end_date;
                   $deal_detail->personal_driver = $request->is_personal_driver;
                   $deal_detail->child_seat = $request->is_child_seat;
                   $deal_detail->car_pickup_location = $request->is_pickup;
                   $deal_detail->car_delivery_location = $request->user_address; 
                   $deal_detail->total_rent_amount = $request->total_rent_amount; 
                   $deal_detail->total_rent_after_discount = $request->total_rent_after_discount;
                   $deal_detail->discount_rate_applied = $request->discount_rate_applied; 
                   $deal_detail->number_of_days = $request->days_rented; 
                   $deal_detail->save();

                   $deal_status_log->deal_detail_id = $deal_detail->id;
                   $deal_status_log->deal_status_id = 11;
                   $deal_status_log->save(); 
                    
                   $notification->deal_id = $deal_detail->id;
                   $notification->is_active = 1;
                    $notification->save();
                  
                   if(isset($deal_detail) && isset($car_req) && isset($car_res) && isset($deal_status_log) && isset($notification)){
                      $db_check = true;
                   };
                 });
                   if($db_check){
                    return response()->json([
                        'status' => 'succes',
                        'message' => 'Deal Created Successfuly',
                        
                     ],200);
                   };
                   return response()->json([
                    'status' => 'Error',
                    'message' => 'Something Went Wrong',
                 ],400);
            }else{
            return array(
               'message' => 'your app is not authorize to use this Api'
            );
        }
         }
         public function carDealDetail(Request $request){
            $app_code = 'qlavish123zxcZXC';
        
            if($request->package_name == $app_code){
                   $deal_record = DealDetail::where('user_id',$request->user_id)->with('car')->get();
                    foreach($deal_record as $deal){
                        $status = Deal_Status_Log::where('deal_detail_id',$deal->id)->first();
                        $detail[] = array(
                           'deal_id' => isset($deal->id) ? (int)$deal->id : 0,
                           'car_id' => isset($deal->car_id) ? (int)$deal->id : 0,
                           'car_name' => isset($deal->car->car_name) ? $deal->car->car_name : '',
                           'renting_days' => isset($deal->number_of_days) ? (int)$deal->number_of_days : 0,
                           'renting_date' => $deal->created_at->toDateString(),
                           'expected_delivery_date' => isset($deal->car_pickup_date) ? $deal->car_pickup_date : '',
                           'start_date' => isset($deal->start_date) ? $deal->start_date : '',
                           'deal_status' => isset($status->deal_status_id) ? Config::get('dealstatus.status.'.$status->deal_status_id) : '',
                           'image_link' => isset($deal->car->car_thumbnail_1) ? 'http://www.qlavish.com/public/'.$deal->car->car_thumbnail_1 : ''
                        );
                    }
                   if($deal_record){
                    return response()->json([
                        'status' => 'Success',
                        'message' => 'Data Fetched',
                        'deal_record' => (!empty($detail)) ? $detail : [],
                       ],200);
                    }
                   return response()->json([
                    'status' => 'Error',
                    'message' => 'No Deal Found',
                 ],400);
            }else{
            return array(
               'message' => 'your app is not authorize to use this Api'
            );
        }
         }
        //deals ends here
 public function carScratchDetail(Request $request){
        $app_code = 'qlavish123zxcZXC';
        if($request->package_name == $app_code){
              $car_scratch = Car_Scratch::where('car_id',$request->car_id)->first();
                    $car_scratch_images = array(
                        [
                        'scratch_image' => (!empty($car_scratch->car_image1)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image1 : '',
                        'scratch_thumb' => (!empty($car_scratch->car_image1_thumbnail)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image1_thumbnail : '',
                        ],
                        [
                            'scratch_image' => (!empty($car_scratch->car_image2)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image2 : '',
                            'scratch_thumb' => (!empty($car_scratch->car_image2_thumbnail)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image2_thumbnail : '',
                        ],
                        [
                            'scratch_image' => (!empty($car_scratch->car_image3)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image3 : '',
                            'scratch_thumb' => (!empty($car_scratch->car_image3_thumbnail)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image3_thumbnail : '',
                            ],
                            [
                                'scratch_image' => (!empty($car_scratch->car_image4)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image4 : '',
                        'scratch_thumb' => (!empty($car_scratch->car_image4_thumbnail)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image4_thumbnail : '',
                            ],
                            [
                                'scratch_image' => (!empty($car_scratch->car_image5)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image5 : '',
                        'scratch_thumb' => (!empty($car_scratch->car_image5_thumbnail)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image5_thumbnail : '',
                                ],
                                [
                                    'scratch_image' => (!empty($car_scratch->car_image6)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image6 : '',
                                    'scratch_thumb' => (!empty($car_scratch->car_image6_thumbnail)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image6_thumbnail : '',
                                ], [
                                    'scratch_image' => (!empty($car_scratch->car_image7)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image7 : '',
                                    'scratch_thumb' => (!empty($car_scratch->car_image7_thumbnail)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image7_thumbnail : '',
                                    ],
                                    [
                                        'scratch_image' => (!empty($car_scratch->car_image8)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image8 : '',
                                        'scratch_thumb' => (!empty($car_scratch->car_image8_thumbnail)) ? 'http://www.qlavish.com/public/'.$car_scratch->car_image8_thumbnail : '',
                                    ],
                    );
           if($car_scratch){
               return response()->json([
                'status' => 'Success',
                'message' => 'Dent History Fatched',
                'dent_history' => [
                    'no_of_major_dents' => (isset($car_scratch->no_of_major_dent)) ? (int)$car_scratch->no_of_major_dent : 0,
                    'location_major_dents' => $this->checkNull($car_scratch->location_of_major_dent),
                    'no_of_minor_dents' => (isset($car_scratch->no_of_minor_dent)) ? (int)$car_scratch->no_of_minor_dent : 0,
                    'location_minor_dents' => $this->checkNull($car_scratch->location_of_minor_dent),
                    'car_images' => (!empty($car_scratch->car_image1)) ? $car_scratch_images : [],
                ],
               ],200);
            }
            return response()->json([
                'status' => 'error',
                'message' => 'no data found',
               ],400);
        }else{
        return array(
           'message' => 'your app is not authorize to use this Api'
        );
    }
       }  

    //     Public function searchCar(Request $request){
    //       $city = $request->user_city;
    //       $name = $request->car_name;
    //       $model = $request->car_model;
    //       $category = $request->car_category;
    //       $year = $request->car_year;
    //       if($city != Null || $category != Null || $model != Null || $name != Null || $year != Null)
    //       {
    //         $car = Car::where('car_pickup_location',$city)->orWhere('model',$model)->orWhere('car_name',$name)->orWhere('car_year',$year)->orWhereHas('car_category', function($q) use($category){
    //           $q->Where('car_category',$category);
    //       })->with('brand','car_type','car_economy','car_category')->get();
    //       if($car){
    //         $this->message = "Car Data fetched successfully";
    //         $this->data = [
    //         "car" => $car,
    //         ];
    //     return successResponse($this->message,$this->data);
    //      }
    //     }else{
    //       $cars = Car::with('brand','car_type','car_economy','car_category')->get();
    //       $this->message = "All Car Data fetched successfully";
    //       $this->data = [
    //       "cars" => $cars,
    //       ];
    //   return successResponse($this->message,$this->data);
    //     }
    //   }
}
