<?php class Utils {
    function number_format($value){
        return number_format($value, 2, ',', '.');
    }
    function date_format($value, $type='datetime'){
        if (!is_numeric($value))
            $value = strtotime($value);
            
        if ($type == 'date') $format = 'd.m.Y';
        else $format = 'd.m.Y h:i A';
        
        return date($format, $value);
    }
    
    function sendMail($from, $to, $subject, $message){
        $email = Yii::app()->email;
		$email->subject = $subject;
		$email->to = $to;
		$email->from = $from;
		$email->replyTo = $from;
		$email->message = $message;
		return $email->send();
    }
    
    function number_format_compare($value){
        return number_format($value, 2, '.', '.');
    }
    
    public static function short_description( $tieude = '', $limit = 600 ){
   	    if (strlen($tieude) > $limit) {
               $tieude=substr($tieude, 0, $limit)."...";
        }
        return $tieude;
   	    
   } 
    function date_format24h( $value, $option=0 ){
        $datetime = '';
        if($value!=''){
            if( $option == 1 )
                $datetime = date("d.m.Y H:i:s",strtotime($value));
            else
                $datetime = date("d/m/Y H:i:s",strtotime($value));
        }
        
        $datetimenew = ( $datetime =='01/01/1970 00:00:00' )? '':$datetime;
        return $datetimenew;
    }

    function date_formatStrtotime( $value, $option=0 ){
        $datetime = '';
        if($value!=''){
            if( $option == 1 )
                $datetime = date("d.m.Y H:i:s",$value);
            else
                $datetime = date("d/m/Y H:i:s",$value);
        }

        $datetimenew = ( $datetime =='01/01/1970 00:00:00' )? '':$datetime;
        return $datetimenew;
    }
   
   function seoUrl($string) {
        $string = strtolower($string);
        //Strip any unwanted characters
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }
   function genCode($length = 6) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    public function getStatusCommon(){
        return array( Yii::t('global','No'), Yii::t('global','Yes') );
    }

    public function getStatusActive(){
        return array( Yii::t('global','Inactive'), Yii::t('global','Active') );
    }

    public static function getAvatar( $photo ){
        $image = ( $photo != '' && $photo != 'undefined' )?$photo:'no-avatar.png';
        return $image;
    }

}
	