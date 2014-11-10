<?php
class ChatController extends SiteBaseController {
    function init(){
        if (!isset($_SESSION['chatHistory'])) {
        	$_SESSION['chatHistory'] = array();	
        }
        
        if (!isset($_SESSION['openChatBoxes'])) {
        	$_SESSION['openChatBoxes'] = array();	
        }
        
        parent::init();
    }
    
    function actionChatheartbeat() {
    	if (!Yii::app()->user->isGuest){
    	      	$query = Yii::app()->db->createCommand("UPDATE online_visitors SET `TIME`= ".time()." WHERE user_id=".Yii::app()->user->id)->execute();
    	}
        
    	$sql = "select * from chat where (chat.user_to = '".Chat::model()->getUsername()."' AND is_read = 0) order by id ASC";
    	$query = Yii::app()->db->createCommand($sql)->queryAll();
        
    	$items = '';    
    	$chatBoxes = array();    
    	foreach($query as $chat) {
    
    		if (!isset($_SESSION['openChatBoxes'][$chat['user_from']]) && isset($_SESSION['chatHistory'][$chat['user_from']])) {
    			$items = $_SESSION['chatHistory'][$chat['user_from']];
    		}
    
    		$chat['message'] = self::sanitize($chat['message']);
    
    		$items .= <<<EOD
    					   {
    			"s": "0",
    			"f": "{$chat['user_from']}",
    			"m": "{$chat['message']}"
    	   },
EOD;
    
    	if (!isset($_SESSION['chatHistory'][$chat['user_from']])) {
    		$_SESSION['chatHistory'][$chat['user_from']] = '';
    	}
    
    	$_SESSION['chatHistory'][$chat['user_from']] .= <<<EOD
    						   {
    			"s": "0",
    			"f": "{$chat['user_from']}",
    			"m": "{$chat['message']}"
    	   },
EOD;
    		
    		unset($_SESSION['tsChatBoxes'][$chat['user_from']]);
    		$_SESSION['openChatBoxes'][$chat['user_from']] = $chat['created'];
    	}
    
    	if (!empty($_SESSION['openChatBoxes'])) {
    	foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {
    		if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {
    			$now = time()-strtotime($time);
    			$time = date('g:iA M dS', strtotime($time));
    
    			$message = "Sent at $time";
    			if ($now > 180) {
    				$items .= <<<EOD
    {
    "s": "2",
    "f": "$chatbox",
    "m": "{$message}"
    },
EOD;
    
    	if (!isset($_SESSION['chatHistory'][$chatbox])) {
    		$_SESSION['chatHistory'][$chatbox] = '';
    	}
    
    	$_SESSION['chatHistory'][$chatbox] .= <<<EOD
    		{
    "s": "2",
    "f": "$chatbox",
    "m": "{$message}"
    },
EOD;
    			$_SESSION['tsChatBoxes'][$chatbox] = 1;
    		}
    		}
    	}
    }
    
    	$sql = "update chat set is_read = 1 where chat.user_to = '".Chat::model()->getUsername()."' and is_read = 0";
    	$query = Yii::app()->db->createCommand($sql)->execute();
    
    	if ($items != '') {
    		$items = substr($items, 0, -1);
    	}
    header('Content-type: application/json');
    ?>
    {
    		"items": [
    			<?php echo $items;?>
            ]
    }
    
    <?php
    			exit(0);
    }
    
    function chatBoxSession($chatbox) {
    	
    	$items = '';
    	
    	if (isset($_SESSION['chatHistory'][$chatbox])) {
    		$items = $_SESSION['chatHistory'][$chatbox];
    	}
    
    	return $items;
    }
    
    function actionStartChatSession() {
        $items = '';
    	if (!empty($_SESSION['openChatBoxes'])) {
    		foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {
    			$items .= self::chatBoxSession($chatbox);
    		}
    	}    
    
    	if ($items != '') {
    		$items = substr($items, 0, -1);
    	}
    
    header('Content-type: application/json');
    ?>
    {
    		"username": "<?php echo Chat::getUsername();?>",
    		"items": [
    			<?php echo $items;?>
            ]
    }
    
    <?php
    
    
    	exit(0);
    }
    
    function actionSendChat() {
    	$from = Chat::model()->getUsername();
    	$to = $_POST['to'];
    	$message = $_POST['message'];
    
    	$_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());
    	
    	$messagesan = self::sanitize($message);
    
    	if (!isset($_SESSION['chatHistory'][$_POST['to']])) {
    		$_SESSION['chatHistory'][$_POST['to']] = '';
    	}
    
    	$_SESSION['chatHistory'][$_POST['to']] .= <<<EOD
    					   {
    			"s": "1",
    			"f": "{$to}",
    			"m": "{$messagesan}"
    	   },
EOD;
    
    
    	unset($_SESSION['tsChatBoxes'][$_POST['to']]);
        $date_create  = date('Y-m-d H:i:s');
    	$sql = "insert into chat (chat.user_to,chat.user_from,message,created,updated) values ('".$to."', '".$from."','".$message."','".$date_create."','".$date_create."')";
    	$query = Yii::app()->db->createCommand($sql)->execute();
    	echo "1";
    	exit(0);
    }
    
    function actionCloseChat() {    
    	unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);
    	
    	echo "1";
    	exit(0);
    }
    
    function sanitize($text) {
    	$text = htmlspecialchars($text, ENT_QUOTES);
    	$text = str_replace("\n\r","\n",$text);
    	$text = str_replace("\r\n","\n",$text);
    	$text = str_replace("\n","<br>",$text);
    	return $text;
    }
}