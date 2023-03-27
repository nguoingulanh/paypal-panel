https://developer.paypal.com/api/rest/authentication/ <br>
https://developer.paypal.com/docs/api/orders/v2/

## Configuration

To get started, you should publish the `config/paypal-panel.php` config file with:

```
php artisan vendor:publish --provider="PaypalPanel/ServiceProvider"

```
#### setup construct:

```php
    public $client;

    public function __construct()
    {
        $paypalConfigs = config('paypal-panel');

        $env = new SandboxEnvironment($paypalConfigs['client_id'], $paypalConfigs['secret']);
        $mode = 'sandbox';

        //live
        // $env = new ProductionEnvironment($paypalConfigs['client_id'], $paypalConfigs['secret']);
        // $mode = 'live';

        $this->environment = $env;
        $this->client = new PayPalHttpClient($this->environment);
    }
```

#### Code:
```php
use PaypalPanel\Order\OrdersCreateRequest;
$request = new OrdersCreateRequest();
$request->prefer('return=representation');
$request->body = [
                     "intent" => "CAPTURE",
                     "purchase_units" => [[
                         "reference_id" => "test_ref_id1",
                         "amount" => [
                             "value" => "100.00",
                             "currency_code" => "USD"
                         ]
                     ]],
                     "application_context" => [
                          "cancel_url" => "https://example.com/cancel",
                          "return_url" => "https://example.com/return"
                     ] 
                 ];

try {
    // Call API with your client and get a response for your call
    $response = $client->execute($request);
    
    // If call returns body in response, you can get the deserialized version from the result attribute of the response
    print_r($response);
}catch (HttpException $ex) {
    echo $ex->statusCode;
    print_r($ex->getMessage());
}
```