<?php

namespace mycryptocheckout\api\v2;

/**
	@brief		Payment object that is sent to the MCC API server.
	@details	MCC will then watch for this payment and inform the client if the transaction is detected.
	@since		2018-10-05 18:25:42
**/
class Payment
{
	/**
		@brief		The cryptocurrency amount to watch for as a string.
		@details	"4.223432" or "12" or "5000000"
					We use strings since floats are awfully unreliable.
		@since		2017-12-21 23:36:58
	**/
	public $amount;

	/**
		@brief		How many confirmations to require to be regarded as paid.
		@details	Default is 1.
		@since		2017-12-24 12:14:06
	**/
	public $confirmations = 1;

	/**
		@brief		Unix time when this payment was created.
		@since		2017-12-24 11:46:54
	**/
	public $created_at;

	/**
		@brief		The ID of the currency we are expecting the payment in: BTC, ETH, etc.
		@since		2017-12-21 23:36:56
	**/
	public $currency_id;

	/**
		@brief		Any extra data we want to send to the server.
		@see		data()
		@see		Payment_Data
		@since		2017-12-30 19:41:56
	**/
	public $data;

	/**
		@brief		The payment timeout in hours.
		@details	0 is the default, which takes the API default.
		@since		2018-03-16 15:57:26
	**/
	public $timeout_hours = 0;

	/**
		@brief		The wallet address to which we are expecting payment.
		@since		2017-12-21 23:36:54
	**/
	public $to;

	/**
		@brief		Convenience method to return the data handling object for this payment.
		@see		$data
		@see		Payment_Data
		@since		2017-12-30 19:45:00
	**/
	public function data()
	{
		return new Payment_Data( $this );
	}

	/**
		@brief		Set the amount for the expected payment.
		@since		2018-10-05 18:44:19
	**/
	public function set_amount( $amount )
	{
		$this->amount = $amount;
		return $this;
	}

	/**
		@brief		Set the recipient wallet address for the expected payment.
		@since		2018-10-05 18:44:19
	**/
	public function set_to( $to )
	{
		$this->to = $to;
		return $this;
	}
}