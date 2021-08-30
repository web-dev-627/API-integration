<?php
require dirname(__FILE__).'/../vendor/autoload.php';

class BamboraPayFomTest extends PHPUnit_Framework_TestCase
{
	public function tearDown()
	{
		\Mockery::close();
	}

	public function testGetTokenCard()
	{
		$response = array(
			'result' => 0,
			'token' => 'test_token',
			'type' => 'card'
		);

		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$connector->shouldReceive("request")->with("auth_payment", array(
			'amount' => '100',
			'order_number' => 'a',
			'currency' => 'EUR',
			'api_key' => 'TESTAPIKEY',
			'version' => 'w3.1',
			'authcode' => '23746DEF83C7EC93A1A6D9E03E569032804535230DC3DEDDF575699456C63BFF',
			'payment_method' => array(
				'type' => 'card'
			)
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$payForm->addCharge(array(
			'amount' => '100',
			'order_number' => 'a',
			'currency' => 'EUR'
		));

		$payForm->addPaymentMethod(array(
			'type' => 'card',
		));

		$request = $payForm->createCharge();

		$this->assertEquals($request->token, 'test_token');
		$this->assertEquals($request->type, 'card');
	}


	public function testGetTokenEPayment()
	{
		$response = array(
			'result' => 0,
			'token' => 'test_token',
			'type' => 'e-payment'
		);

		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$connector->shouldReceive("request")->with("auth_payment", array(
			'amount' => '100',
			'order_number' => 'a',
			'currency' => 'EUR',
			'api_key' => 'TESTAPIKEY',
			'version' => 'w3.1',
			'authcode' => '23746DEF83C7EC93A1A6D9E03E569032804535230DC3DEDDF575699456C63BFF',
			'payment_method' => array(
				'type' => 'e-payment',
				'return_url' => 'https://localhost/return',
				'notify_url' => 'https://localhost/return'
			),
			'products' => array(
				array(
					'id' => 'as123', 
					'title' => 'Product 1',
					'count' => 1,
					'pretax_price' => 300,
					'tax' => 24,
					'price' => 372,
					'type' => 1
				)
			)
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$payForm->addCharge(array(
			'amount' => '100',
			'order_number' => 'a',
			'currency' => 'EUR'
		));

		$payForm->addPaymentMethod(array(
			'type' => 'e-payment', 
			'return_url' => 'https://localhost/return',
			'notify_url' => 'https://localhost/return'
		));

		$payForm->addProduct(array(
			'id' => 'as123', 
			'title' => 'Product 1',
			'count' => 1,
			'pretax_price' => 300,
			'tax' => 24,
			'price' => 372,
			'type' => 1
		));

		$request = $payForm->createCharge();

		$this->assertEquals($request->token, 'test_token');
		$this->assertEquals($request->type, 'e-payment');
	}
	

	public function testGetStatusWithToken()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$test_token = 'test_token';
		$response = array('result' => 0);
		$response = json_encode($response);

		$connector->shouldReceive("request")->with("check_payment_status", array(
			'version' => 'w3.1',
			'authcode' => 'B33468AA646E3835C40929AA3361A44F4923E95D90F84CB14CDF9C70507E4384',
			'token' => $test_token,
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn($response);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->checkStatusWithToken($test_token);

		$this->assertEquals($request->result, 0);
	}
	
	public function testGetStatusWithOrderNumber()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$test_order_number = 'test_token';
		$response = array('result' => 0);
		$response = json_encode($response);

		$connector->shouldReceive("request")->with("check_payment_status", array(
			'version' => 'w3.1',
			'authcode' => 'B33468AA646E3835C40929AA3361A44F4923E95D90F84CB14CDF9C70507E4384',
			'order_number' => $test_order_number,
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn($response);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->checkStatusWithOrderNumber($test_order_number);

		$this->assertEquals($request->result, 0);
	}

	public function testGetTokenThrowsException()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$payForm->addCharge(array(
			'amount' => '100',
			'order_number' => 'a',
			'currency' => 'EUR'
		));

		$connector->shouldReceive("request")->once()->andReturn('kkk');

		$msg = '';

		try 
		{
			$payForm->createCharge();
		}
		catch(Bambora\PayFormException $e)
		{
			$msg = $e->getMessage();
		}

		$this->assertEquals($msg, 'PayForm::makeRequest - response from Bambora PayForm API is not valid JSON');
	}
	
	public function testChargeCardToken()
	{
		$response = array(
			'result' => 0,
			'settled' => 1,
			'source' => array(
				'object' => 'card',
				'card_token' => 'card_token'
			)
		);

		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$connector->shouldReceive("request")->with("charge_card_token", array(
			'amount' => '100',
			'order_number' => 'a',
			'currency' => 'EUR',
			'api_key' => 'TESTAPIKEY',
			'version' => 'w3.1',
			'card_token' => 'card_token',
			'authcode' => 'AD8F8D0FB039C5685D54E9EC1DEEA2972C00C46F2ED4B260481BD225209C0982'
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$payForm->addCharge(array(
			'amount' => '100',
			'order_number' => 'a',
			'currency' => 'EUR',
			'card_token' => 'card_token'
		));

		$request = $payForm->chargeWithCardToken();

		$this->assertEquals($request->result, 0);
	}

	
	public function testCapture()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$response = array('result' => 0);

		$connector->shouldReceive("request")->with("capture", array(
			'version' => 'w3.1',
			'authcode' => '23746DEF83C7EC93A1A6D9E03E569032804535230DC3DEDDF575699456C63BFF',
			'order_number' => 'a',
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->settlePayment('a');

		$this->assertEquals($request->result, 0);
	}
	
	public function testCancel()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$response = array('result' => 0);

		$connector->shouldReceive("request")->with("cancel", array(
			'version' => 'w3.1',
			'authcode' => '23746DEF83C7EC93A1A6D9E03E569032804535230DC3DEDDF575699456C63BFF',
			'order_number' => 'a',
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->cancelPayment('a');

		$this->assertEquals($request->result, 0);
	}
	
	public function testGetCardToken()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$response = array(
			'result' => 0,
			'source' => array(
				'object' => 'card',
				'last4' => '1234',
				'brand' => 'Visa',
				'exp_year' => 2015,
				'exp_month' => 5,
				'card_token' => 'card_token'
			)
		);

		$connector->shouldReceive("request")->with("get_card_token", array(
			'version' => 'w3.1',
			'authcode' => 'A2080435816D3C7C893E246B3651F12F80131984617468B0426DC6D9DD9ED0ED',
			'card_token' => 'card_token',
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->getCardToken('card_token');

		$this->assertEquals(json_encode($request), json_encode($response));
	}
	
	public function testDeleteCardToken()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$response = array('result' => 0);
  
		$connector->shouldReceive("request")->with("delete_card_token", array(
			'version' => 'w3.1',
			'authcode' => 'A2080435816D3C7C893E246B3651F12F80131984617468B0426DC6D9DD9ED0ED',
			'card_token' => 'card_token',
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->deleteCardToken('card_token');

		$this->assertEquals($request->result, 0);
	}

	public function testCheckReturn()
	{
		$data = array(
			'RETURN_CODE' => 0,
			'ORDER_NUMBER' => '123',
			'SETTLED' => 1,
			'AUTHCODE' => '5FF25F1E945C0535327AA4B8150FAC9B4AB058ADFE4733AB353EA07D3EFDA791'
		);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key');

		$return = $payForm->checkReturn($data);

		$this->assertEquals((object) $data, $return);
	}

	public function testCheckReturnThrowsExceptionIfInvalidMac()
	{
		$data = array(
			'RETURN_CODE' => 0,
			'ORDER_NUMBER' => '123',
			'SETTLED' => 1,
			'AUTHCODE' => 'invalid'
		);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key');

		$msg = '';

		try
		{
			$return = $payForm->checkReturn($data);
		}
		catch(Bambora\PayFormException $e)
		{
			$msg = $e->getMessage();
		}

		$this->assertEquals($msg, 'PayForm::checkReturn - MAC authentication failed');
	}

	public function testCheckReturnThrowsExceptionIfNotEnoughData()
	{
		$data = array(
			'RETURN_CODE' => 0,
			'SETTLED' => 1,
			'AUTHCODE' => '5FF25F1E945C0535327AA4B8150FAC9B4AB058ADFE4733AB353EA07D3EFDA791'
		);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key');

		$msg = '';

		try
		{
			$return = $payForm->checkReturn($data);
		}
		catch(Bambora\PayFormException $e)
		{
			$msg = $e->getMessage();
		}

		$this->assertEquals($msg, 'PayForm::checkReturn - unable to calculate MAC, not enough data given');
	}

	public function testGetMerchantPaymentMethods()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$response = array(
			'result' => 0,
			'payment_methods' => array(
				array(
					'name' => 'Mobilepay',
					'selected_value' => 'mobilepay',
					'group' => 'wallets',
					'min_amount' => 0,
					'max_amount' => 100000,
					'img' => 'https://www.payform.bambora.com',
					'img_timestamp' => '1479131257',
					'currency' => array(
						'EUR',
						'SEK'
					)
				)
			)
		);

		$connector->shouldReceive("request")->with("merchant_payment_methods", array(
			'authcode' => '7AEBC755706F5699162A4359A6947DD1CEA8F65FB7E6C38C6E0ED3C03B808E07',
			'version' => '2',
			'api_key' => 'TESTAPIKEY',
			'currency' => ''
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->getMerchantPaymentMethods();

		$this->assertEquals(json_encode($request), json_encode($response));
	}

	public function testGetMerchantPaymentMethodsSEKCurrency()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$response = array(
			'result' => 0,
			'payment_methods' => array(
				array(
					'name' => 'Mobilepay',
					'selected_value' => 'mobilepay',
					'group' => 'wallets',
					'min_amount' => 0,
					'max_amount' => 100000,
					'img' => 'https://www.payform.bambora.com',
					'img_timestamp' => '1479131257',
					'currency' => array(
						'EUR', 
						'SEK'
					)
				)
			)
		);

		$connector->shouldReceive("request")->with("merchant_payment_methods", array(
			'authcode' => '7AEBC755706F5699162A4359A6947DD1CEA8F65FB7E6C38C6E0ED3C03B808E07',
			'version' => '2',
			'currency' => 'SEK',
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn(json_encode($response));

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->getMerchantPaymentMethods('SEK');

		$this->assertEquals(json_encode($request), json_encode($response));
	}

	public function testGetPayment()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$test_order_number = 'test_token';
		$response = array('result' => 0);
		$response = json_encode($response);

		$connector->shouldReceive("request")->with("get_payment", array(
			'version' => 'w3.1',
			'authcode' => 'B33468AA646E3835C40929AA3361A44F4923E95D90F84CB14CDF9C70507E4384',
			'order_number' => $test_order_number,
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn($response);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->getPayment($test_order_number);

		$this->assertEquals($request->result, 0);
	}

	public function testGetRefund()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$test_refund_id = 123;
		$response = array('result' => 0);
		$response = json_encode($response);

		$connector->shouldReceive("request")->with("get_refund", array(
			'version' => 'w3.1',
			'authcode' => '853D72D666288F30809498FF23F2A6D7A79D6427B3CB2AB95D1F4D11948EBC7F',
			'refund_id' => $test_refund_id,
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn($response);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->getRefund($test_refund_id);

		$this->assertEquals($request->result, 0);
	}

	public function testCreateRefund()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$response = array('result' => 0);
		$response = json_encode($response);

		$connector->shouldReceive("request")->with("create_refund", array(
			'version' => 'w3.1',
			'authcode' => '23746DEF83C7EC93A1A6D9E03E569032804535230DC3DEDDF575699456C63BFF',
			'currency' => 'EUR',
			'order_number' => 'a',
			'api_key' => 'TESTAPIKEY',
			'products' => array(
				array(
					'product_id' => 123, 
					'count' => 1,
				)
			)
		))->once()->andReturn($response);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$payForm->addRefund(array(
			'order_number' => 'a',
			'currency' => 'EUR'
		));

		$payForm->addRefundProduct(array(
			'product_id' => 123, 
			'count' => 1
		));

		$request = $payForm->createRefund();

		$this->assertEquals($request->result, 0);
	}

	public function testCancelRefund()
	{
		$connector = \Mockery::mock('Bambora\PayFormConnector');

		$test_refund_id = 123;
		$response = array('result' => 0);
		$response = json_encode($response);

		$connector->shouldReceive("request")->with("cancel_refund", array(
			'version' => 'w3.1',
			'authcode' => '853D72D666288F30809498FF23F2A6D7A79D6427B3CB2AB95D1F4D11948EBC7F',
			'refund_id' => $test_refund_id,
			'api_key' => 'TESTAPIKEY'
		))->once()->andReturn($response);

		$payForm = new Bambora\PayForm('TESTAPIKEY', 'private_key', 'w3.1', $connector);

		$request = $payForm->cancelRefund($test_refund_id);

		$this->assertEquals($request->result, 0);
	}
}
