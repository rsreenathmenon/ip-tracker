<?php
/**
* Title       : Location Trackeing by IP Address
* Description : This Class created for Getting GeoLocation Information from Cliant IP Address or Given IP Address
* Auther      : Sandip Das
* Disclaimer  : Use At Own Risk
*/
class IpTracker{
	protected $service ='http://www.geoplugin.net/php.gp?ip=';
	protected $ip;
	protected $data;
	function __construct($opr_ip = null)
	
	{
		
		if( null === $opr_ip ) 
		$this->ip = $_SERVER['REMOTE_ADDR'];
		else
		$this->ip=$opr_ip;
		
	}
	public function locate()
	{
		$url=$this->service.$this->ip;
		
		$this->data=$this->fetch($url);

	}
	
	public function setBaseCurrency( $currency = 'USD' ){
		$this->_currency = $currency;
	}
	
	
	/**
	 * 
	 * Returns located IP
	 */
	public function getIp(){
		return $this->data['ip'];
	}
	/**
	 * 
	 * Returns located City
	 */
	public function getCity(){
		return $this->data['geoplugin_city'];
	}
	/**
	 * 
	 * Returns located region
	 */
	public function getRegion(){
		return $this->data['geoplugin_region'];
	}
	/**
	 * 
	 * Returns located area code
	 */
	public function getAreaCode(){
		return $this->data['geoplugin_areaCode'];
	}
	/**
	 * 
	 * Returns located DMA code
	 */
	public function getDma(){
		return $this->data['geoplugin_dmaCode'];
	}
	/**
	 * 
	 * Returns located area code
	 */
	public function getCountryCode(){
		return $this->data['geoplugin_countryCode'];
	}
	/**
	 * 
	 * Returns located country name
	 */
	public function getCountryName(){
		return $this->data['geoplugin_countryName'];
	}
	/**
	 * 
	 * Returns located continent code
	 */
	public function getContinentCode(){
		return $this->data['geoplugin_continentCode'];
	}
	/**
	 * 
	 * Returns located latitude
	 */
	public function getLatitude(){
		return $this->data['geoplugin_latitude'];
	}
	/**
	 * 
	 * Returns located longitude
	 */
	public function getLongitude(){
		return $this->data['geoplugin_longitude'];
	}
	/**
	 * 
	 * Returns located currency code
	 */
	public function getCurrencyCode(){
		return $this->data['geoplugin_currencyCode'];
	}
	/**
	 * 
	 * Returns located currency symbol
	 */
	public function getCurrencySymbol(){
		return $this->data['geoplugin_currencySymbol'];
	}
	/**
	 * 
	 * Returns located currency converter
	 */
	public function getCurrencyConverter(){
		return $this->data['geoplugin_currencyConverter'];
	}
	
	public function fetch($host){
		
		$response = null;
		
		if ( function_exists('curl_init') ) {
		
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $host);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_USERAGENT, 'EGeoIP Yii Extension Class v1.0');
			$response = curl_exec($ch);
			curl_close ($ch);
			
		} else if ( ini_get('allow_url_fopen') ) {
			
			$response = file_get_contents($host, 'r');
		}
		
		return unserialize($response);
	}
}






?>
