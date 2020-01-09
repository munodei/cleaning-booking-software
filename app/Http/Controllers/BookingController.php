<?php

namespace App\Http\Controllers;

use App\Category;
use App\Icon;
use App\Neighbourhood;
use App\City;
use App\State;
use App\Country;
use App\Service;
Use App\Appointment;
use App\Job;
use App\Location;
use App\Payment;
use Illuminate\Http\Request;

use App\Http\Requests;

class BookingController extends Controller
{

    public function index(Request $request)
    {
        $title      = trans('app.categories');
        $categories = Category::where('category_id', 0)->orderBy('category_name', 'asc')->get();
        $icons      = Icon::all();
        $cities     = City::all();
        $services   = Service::all();
        $locations  = Location::where('user_id',auth()->user()->id ?? 0)->get();
        $countries  = Country::all();


        return view('booking', compact('title', 'categories','icons','cities','services','locations','countries'));

    }

    public function rescheduleAppointment(Request $request){

        $rules = [
                    'hidden_appointment_id'          =>'required',
                    'datepicker'                     =>'required',
                    'time_of_day'                    =>'required',
                 ];

        $msgs  = [
                    'hidden_appointment_id.required' =>'Error Occured with the appointment,Conduct the administrator',
                    'datepicker'                     =>'The Rescheduled date is Required!',
                    'time_of_day'                    => 'The time when service is begins is required!'
                 ];

        $this->validate($request,$rules,$msgs);

        extract($_POST);

        $appointment               = Appointment::find(intval($hidden_appointment_id));

        $appointment->time_of_day  = $time_of_day;
        $appointment->time_start   = $time_of_day==='morning'? date('h:i:s',strtotime('08:00:00')) : date('h:i:s',strtotime('12:00:00'));
        $appointment->time_end     = date('h:i:s',strtotime($appointment->period." hours", strtotime($time_of_day==='morning'? date('h:i:s',strtotime('08:00:00')) : date('h:i:s',strtotime('12:00:00')))));
        $appointment->date         = date('Y-m-d',strtotime($datepicker));

        $appointment->save();

        return redirect()->back()->with('success','You have successfully updated your schedule');

    }

    public function makeBooking(Request $request){


        $rules = [
                    'country'              =>'required',
                    'city'                 =>'required',
                    'state'                =>'required',
                    'neighbourhood'        =>'required',
                    'suburb'               =>'required',
                    'physical_address'     =>'required',
                    'postal_code'          =>'required',
                    'bathingrooms'         =>'required',
                    'bedrooms'             =>'required',
                    'chemicals_and_tools'  =>'required',
                    'service_frequency'    =>'required',
                    'datepicker'           =>'required',
                    'time_of_day'          =>'required',
                    'cart_total'           =>'required',
                    'period'               =>'required',
                    'first_name'           =>'required',
                    'last_name'            =>'required',
                    'email'                =>'required',
                    'address'              =>'required',
                    'address2'             =>'required',
                    'country_checkout'     =>'required',
                    'state_checkout'       =>'required',
                    'zip_checkout'         =>'required',
                    'paymentMethod'        =>'required',
                    'cc_name'              =>'required',
                    'cc_name'              =>'required',
                    'cc_expiration'        =>'required',
                    'cc_cvv'               =>'required',
                    

                 ];

        $this->validate($request, $rules);



        foreach($_POST as $key=>$data){

            session([$key => $data]);

        }

        extract($_POST);

        $user          = $request->user();

        $appointment   = Appointment::create([
                                        'client_id'=>$user->id ?? 0,
                                        'address'=>$physical_address,
                                        'suburb_id'=>$suburb,
                                        'admin_assigned'=>0,
                                        'time_of_day'=>$time_of_day,
                                        'time_start'=>$time_of_day==='morning'? date('h:i:s',strtotime('08:00:00')) : date('h:i:s',strtotime('12:00:00')),
                                        'time_end'=>date('h:i:s',strtotime(intfloat($period)." hours", strtotime($time_of_day==='morning'? date('h:i:s',strtotime('08:00:00')) : date('h:i:s',strtotime('12:00:00'))))),
                                        'date'=>date('Y-m-d',strtotime($datepicker)),
                                        'period'=>intfloat($period),
                                        'cost',$cart_total]);

    
        $services   = Service::all();

        foreach ($_POST as $key => $value) {

            foreach ($services as $service) {


                if($key == $service->service_slug){

                    $job = new Job;

                    $job->appointment_id = $appointment->id;
                    $job->service_id     = $service->id;
                    $job->quantity       = (intfloat($value)/$service->price)*$service->time;

                    $job->save();

                }
                


            }
            
        }


        chargePayment($request->user()->id ?? 0,$appointment->id,$_POST);    



    }

    public function chargePayment($userid,$appointment_id,$data){

        extract($data);

        $transaction_id = strtoupper(str_random(30));

         $payment =  Payment::create([

                 'appointment_id'       =>$appointment_id,
                 'amount'               =>$cart_total,
                 'payment_method'       =>$paymentMethod,
                 'status'               =>'pending',
                 'currency'             =>get_option('site_currency'),
                 'client_ip'            =>get_the_user_ip(),
                 'local_transaction_id' =>$transaction_id,
                 'user_id'              =>$userid,

                                       ]);



        if ($payment->payment_method == 'paypal') {

            // PayPal settings
            $paypal_action_url = "https://www.paypal.com/cgi-bin/webscr";

            if (get_option('enable_paypal_sandbox') == 1){
                $paypal_action_url = "https://www.sandbox.paypal.com/cgi-bin/webscr";
            }

            $paypal_email = get_option('paypal_receiver_email');

            $return_url = route('payment_success_url', $transaction_id);
            $cancel_url = route('payment_checkout', $transaction_id);
            $notify_url = route('paypal_notify_url', $transaction_id);

            $item_name = "Cleaning Services (".get_option('site_name').")";

            // Check if paypal request or response
            $querystring = '';

            // Firstly Append paypal account to querystring
            $querystring .= "?business=".urlencode($paypal_email)."&";

            // Append amount& currency (£) to quersytring so it cannot be edited in html
            //The item name and amount can be brought in dynamically by querying the $_POST['item_number'] variable.
            $querystring .= "item_name=".urlencode($item_name)."&";
            $querystring .= "amount=".urlencode($payment->amount)."&";
            $querystring .= "currency_code=".urlencode($payment->currency)."&";

            $querystring .= "first_name=".urlencode($first_name)."&";
            $querystring .= "last_name=".urlencode($last_name)."&";

            //$querystring .= "payer_email=".urlencode($ad->user->email)."&";
            $querystring .= "payer_email=".urlencode($email)."&";
            $querystring .= "item_number=".urlencode($payment->local_transaction_id)."&";

            //loop for posted values and append to querystring
            foreach(array_except($request->input(), '_token') as $key => $value){
                $value = urlencode(stripslashes($value));
                $querystring .= "$key=$value&";
            }

            // Append paypal return addresses
            $querystring .= "return=".urlencode(stripslashes($return_url))."&";
            $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
            $querystring .= "notify_url=".urlencode($notify_url);

            // Append querystring with custom field
            //$querystring .= "&custom=".USERID;

            // Redirect to paypal IPN
            header('location:'.$paypal_action_url.$querystring);
            exit();

        }elseif ($payment->payment_method == 'stripe'){

            $stripeToken = $request->stripeToken;
            \Stripe\Stripe::setApiKey(get_stripe_key('secret'));
            // Create the charge on Stripe's servers - this will charge the user's card
            try {
                $charge = \Stripe\Charge::create(array(
                    "amount" => ($payment->amount * 100), // amount in cents, again
                    "currency" => $payment->currency,
                    "source" => $stripeToken,
                    "description" => "Cleaning Services (".get_option('site_name').")"
                ));

                if ($charge->status == 'succeeded'){
                    $payment->status = 'success';
                    $payment->charge_id_or_token = $charge->id;
                    $payment->description = $charge->description;
                    $payment->payment_created = $charge->created;
                    $payment->save();

                    //Set publish ad by helper function
                    //Approved ads
                    $ad->status = '1';
                    $ad->save();

                    return ['success'=>1, 'msg'=> trans('app.payment_received_msg')];
                }
            } catch(\Stripe\Error\Card $e) {
                // The card has been declined
                $payment->status = 'declined';
                $payment->description = trans('app.payment_declined_msg');
                $payment->save();
                return ['success'=>0, 'msg'=> trans('app.payment_declined_msg')];
            }
        }

        return ['success'=>0, 'msg'=> trans('app.error_msg')];
    }





    public function getStates($id=0,$select=0){

        $states = State::where('country_id',intval($id))->get();

        $element = '<div class="form-group">
                        <label for="state">Select State of Residence</label>
                                <select class="form-control" name="state" id="state" onchange="getCity(this.value)"required>
                                <option value=""> Select State </option>';
                                    foreach($states  as $state){
                                          $element  .='<option ';  $element  .=intval($select)==$state->id?"selected":"";  $element  .=' value="'. $state->id .'">'. $state->state_name .'</option>';                                                             
                                         }
        $element .=             '</select>
                    </div>';


        return $element;
    }

    public function getCities($id=0,$select=0){

        $cities = City::where('state_id',intval($id))->get();

        $element = '<div class="form-group">
                        <label for="city">Select City of Residence</label>
                                <select class="form-control" name="city" id="city" onchange="getNeighbourhood(this.value)" required>
                                <option value=""> Select City </option>';
                                    foreach($cities  as $city){
                                          $element  .='<option ';  $element  .=intval($select)==$city->id?"selected":"";  $element  .=' value="'. $city->id .'">'. $city->city_name .'</option>';                                                             
                                         }
        $element .=             '</select>
                    </div>';


        return $element;
    }

    public function getNeighbourhoods($id=0,$select=0){

        $neighbourhoods = Neighbourhood::where('city_id',intval($id))->get();

        $element = '<div class="form-group">
                        <label for="neighbourhood">Select Neighbourhood  of Residence</label>
                                <select class="form-control" name="neighbourhood" id="neighbourhood" onclick="getSuburb(this.value)" required>
                                <option value=""> Select Neighbourhood </option>
                                ';
                                    foreach($neighbourhoods  as $neighbourhood){
                                          $element  .='<option ';  $element  .=intval($select)==$neighbourhood->id?"selected":""; $element  .=' value="'. $neighbourhood->id .'">'. $neighbourhood->neighbourhood .'</option>';                                                             
                                         }
        $element .=             '</select>
                    </div>';


        return $element;
    }

    public function getSuburbs($id=0,$select=0){

        $suburbs = \App\Suburb::where('neighbourhood_id',intval($id))->get();

        $element = '<div class="form-group">
                        <label for="suburb">Select Suburb of Residence</label>
                                <select class="form-control" name="suburb" id="suburb" onchange="showAddress();" required>
                                <option value=""> Select Suburb </option>';
                                    foreach($suburbs  as $suburb){
                                          $element  .='<option ';  $element  .=intval($select)==$suburb->id?"selected":"";  $element  .=' value="'. $suburb->id .'">'. $suburb->suburb_name .'</option>';                                                             
                                         }
        $element .=             '</select>
                    </div>';


        return $element;
    }








    }


