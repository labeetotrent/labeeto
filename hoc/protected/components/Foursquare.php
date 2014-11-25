<?php

class Foursquare {

    private $_curl;
    private $_rootUrl = 'https://api.foursquare.com/v2/';
    private $_response;
    private $_clientId = 'RFXZ4ISD3DYHKTS1RMEXJXONGCJJWUOR3CYKA4RQ5DAD2IUO';
    private $_clientSecret = 'RAWC0CJUFMVHWYW0GXJ3KRQPNYXFODRZVBBB1FFUN4CNYMIY';
    private $_v = 20140806;
    private $_m = 'foursquare';

    public function __construct()
    {
    }

    public function getPlaces($options)
    {
        if(isset($options['coords']))
        {
            $params = array('ll' => implode(',',$options['coords']));
            $this->execute($this->getUrl('venues/search', $this->getParams($params)));
            return $this->_response;
        }
        elseif(isset($options['near']))
        {
            $params = array('near' => $options['near']);
            $this->execute($this->getUrl('venues/search', $this->getParams($params)));
            return $this->_response;
        }
        else
            return [];
    }

    private function execute($url)
    {
        $this->_curl = curl_init($url);
        curl_setopt($this->_curl, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($this->_curl, CURLOPT_RETURNTRANSFER, true);

        $this->_response = json_decode(curl_exec($this->_curl));
    }

    private function getParams($params)
    {
        $params['client_id'] = $this->_clientId;
        $params['client_secret'] = $this->_clientSecret;
        $params['v'] = $this->_v;
        $params['m'] = $this->_m;

        return $params;
    }
    private function getUrl($url, $params)
    {
        $resultUrl = $this->_rootUrl.$url;
        $first = true;
        foreach($params as $key=>$value)
        {
            if($first)
                $resultUrl .= '?'.$key.'='.$value;
            else
                $resultUrl .= '&'.$key.'='.$value;
            $first = false;
        }

        return $resultUrl;
    }
}

?>