<!DOCTYPE html>
<html>
    <head>
        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <h1>Hello, {{ $order->name }}</h1>
        @if ($subject=='ORDER RECEIVED')
       
        <p>Your order with order number {{ $order->order_number }} has been successfully created.</p>
        <p>Order Details:</p>
        <ul>
            <li>Total Price: ₹{{ $order->total }}</li>
        </ul>
        
        @elseif ($subject =='ORDER ACCEPTED')
        <p>
            Your order {{ $order->order_number }} has been picked up by the delivery agent, {{$user->first_name." ".$user->last_name}}
            <br> {{$user->email}} & {{$user->phone}}
        </p>
         We have generated a one-time password (OTP) for you. Please use the following OTP to complete your action:
         <br>
         <b>OTP: {{$order->otp}} </b>
        @elseif($subject =='ORDER COMPLETED')
            <p>
                We are thrilled to inform you that your order with the reference number {{$order->order_number}} has been successfully delivered! We hope you're excited to receive your items.
            </p>
        @else   
        @endif
        <p>Thank you for choosing our service.</p>
    </body>
</html>
