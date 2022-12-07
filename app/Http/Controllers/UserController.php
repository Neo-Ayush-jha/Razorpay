<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Stripe;
use Session;

class UserController extends Controller
{
    //
    public function call(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_51KqEClSIJqriEVmBA7tTyyn5DBKWl9fhWnvNnBOYqL6oBZWFfVOmsDxTeZ7UrskTRuLjUJCWR19rWZuVrNfaDbdL00Ahz8qpgP');
        $customer = \Stripe\Customer::create(array(
          'name' => 'Neo Ayush',
          'description' => 'test description',
          'email' => 'ayush@gmail.com',
          'source' => $request->input('stripeToken'),
           "address" => ["city" => "San Francisco", "country" => "India", "line1" => "510 Townsend St", "postal_code" => "854031", "state" => "Bihar"]

      ));
        try {
            \Stripe\Charge::create ( array (
                    "amount" => 300 * 100,
                    "currency" => "usd",
                    "customer" =>  $customer["id"],
                    "description" => "Test payment."
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            return view ( 'cardForm' );
        } catch ( \Stripe\Error\Card $e ) {
            Session::flash ( 'fail-message', $e->get_message() );
            return view ( 'cardForm' );
        }
    }

}
