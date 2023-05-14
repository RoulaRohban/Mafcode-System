<?php

namespace App\Http\Controllers\api;

use App\models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class PayPalController extends Controller
{
    private function get_context()
    {
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                'AdndpvbAvpop1Xa6Yfysl9_LMvi5qUh8deCxxphIQAuBWpi3cD7D19GLDmTuEIXsI7VFtsQqQeR2i6lo',     // ClientID
                'EFu6BdKyHTddJi_GbIMmqWQl3XnT_55vM67yGoXo9U4ybMfK08q-71HT968-TOol5g2-jmkvOHI47Xr5'      // ClientSecret
            )
        );

        return $apiContext;
    }

    private function createPaymentValidation()
    {
        return [
            'order_id' => 'required|exists:orders,id'

        ];
    }

    public function create(Request $request)
    {


        $validator = Validator::make($request->all(), $this->createPaymentValidation());
        if ($validator->fails()) {
            Log::error($validator->errors());

            return response()->json(['error' => $validator->errors()], 422);
        }

        $validated_data = $validator->validated();

        $order = Order::find($validated_data["order_id"]);


        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $payment_data = [
            'name' => 'new ' .$order->subscription_title . ' subscribe',
            'description' => 'payment for' . $order->subscription_title,
            'currency' => $order->currency ,
            'quantity' => 1,
            'price' => $order->subscription_price,
        ];

        $name = $payment_data["name"];
        $description = $payment_data["description"];
        $currency = $payment_data["currency"];
        $quantity = $payment_data["quantity"];
   //     $sku = $payment_data["quantity"];
        $price = $payment_data["price"];


        $item1 = new Item();
        $item1->setName($name)
            ->setCurrency($currency)
            ->setQuantity($quantity)
            ->setPrice($price);

        $itemList = new ItemList();
        $itemList->setItems(array($item1));


        $details = new Details();
        $details->setSubtotal($price);


        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($price)
            ->setDetails($details);


        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($description)
            ->setInvoiceNumber(uniqid());


        $redirectUrls = new RedirectUrls();

        $redirect_url_exe = route('paypal.execute');
        $redirect_url_cancel = route('paypal.cancel');

        $redirectUrls->setReturnUrl($redirect_url_exe)
            ->setCancelUrl($redirect_url_cancel);



        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));

        $request = clone $payment;


        try {
            $apiContext = $this->get_context();
            $apiContext->setConfig(['mode' => 'live']);
            $payment->create($apiContext);
        }

        catch (\Throwable $ex) {
            dd($ex->getMessage());
        }

        $approvalUrl = $payment->getApprovalLink();
        $payment_id = $payment->getId();
        $order->payment_id = $payment_id;
        $order->update();
        return response()->json(['status' => 'success' , 'approval_link' => $approvalUrl]);

    }

    public function execute(Request $request)
    {


        $apiContext = $this->get_context();
        $apiContext->setConfig(['mode' => 'live']);
        $payment = Payment::get(request('paymentId'), $apiContext);


        $execution = new PaymentExecution();
        $execution->setPayerId(request('PayerID'));


        foreach ($payment->getTransactions() as $transaction)
        {
            $execution->addTransaction($transaction);
        }


        $result = $payment->execute($execution, $apiContext);
        $order = Order::getOrderBy(request('paymentId'));
        $order->approveInstance()->update();


        return redirect('https://writables.ae/thankforpayment/success');
    }

    public function cancel()
    {
        return redirect('https://writables.ae/thankforpayment');
    }
}
