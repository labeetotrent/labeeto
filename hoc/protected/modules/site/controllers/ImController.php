<?php
class ImController extends SiteBaseController
{
    public $layout = 'feed';
    public $user;

    public function filters()
    {
        return array(
            'member',
        );
    }

    public function actionIndex()
    {
        $mobileDetect = new Mobile_Detect();


        $dialogs = array();
        $messages = array();

        $this->user = User::model()->findByPk(Yii::app()->user->id);
        $myId = $this->user->id;
        $dialogs = Yii::app()->db->createCommand('SELECT
    *
FROM
    (SELECT
        MAX(created) AS created,
            CASE user_from
                WHEN :id THEN user_to
                ELSE user_from
            END AS userid,
            (SELECT
                    message
                FROM
                    chat
                WHERE
                    (userid = user_from AND :id = user_to) OR (userid = user_to AND :id = user_from)
                ORDER BY created DESC
                LIMIT 1) lastMessage ,
			(SELECT COUNT(*) FROM chat WHERE user_to = userid OR user_from =userid) as totalMessages,
			(SELECT COUNT(*) FROM chat WHERE is_read = 0 AND (user_to = :id AND user_from = userid)) as unreadMessages
    FROM
        chat
    GROUP BY userid
    ORDER BY created DESC) dialogs
LEFT OUTER JOIN
	(SELECT id,username,photo,address FROM users) users
ON dialogs.userid = users.id')->bindParam(':id', $myId, PDO::PARAM_INT)->queryAll();

        if(count($dialogs) > 0)
        {
            $dialogs[0]['first'] = true;
            $messagesCriteria = new CDbCriteria();
            $messagesCriteria->condition = '(user_to = :id OR user_from = :id) AND (user_to = :to OR user_from = :to)';
            $messagesCriteria->params = array(':id' => Yii::app()->user->getId(), ':to' => $dialogs[0]['userid']);
            $messages = Chat::model()->findAll($messagesCriteria);
        }

        if($mobileDetect->isMobile() && false)
            $this->render('index', compact('dialogs','messages'));
        else
        {
            $this->layout = 'mobile_feed';
            $this->render('mobileIndex', compact('dialogs','messages'));
        }
    }

    public function actionMobileChat($user_id)
    {
        $this->user = User::model()->findByPk(Yii::app()->user->id);

        $messagesCriteria = new CDbCriteria();
        $messagesCriteria->condition = '(user_to = :id OR user_from = :id) AND (user_to = :to OR user_from = :to)';
        $messagesCriteria->params = array(':id' => Yii::app()->user->getId(), ':to' => $user_id);
        $messages = Chat::model()->findAll($messagesCriteria);


        $this->layout = 'mobile_feed';
        $this->render('mobileChat', compact('messages', 'user_id'));
    }


    public function actionGetMessages($to)
    {
        $messagesCriteria = new CDbCriteria();
        $messagesCriteria->condition = '(user_to = :id OR user_from = :id) AND (user_to = :to OR user_from = :to)';
        $messagesCriteria->params = array(':id' => Yii::app()->user->getId(), ':to' => $to);
        $messages = Chat::model()->findAll($messagesCriteria);

        Chat::model()->updateAll(array('is_read' => 1), $messagesCriteria);

        $user = User::model()->findByPk($to);

        $outputMessages = '';

        foreach($messages as $message)
        {
            if($message->user_from != Yii::app()->user->getId())
                $outputMessages .= $this->renderPartial('/elements/im/_message', array('data' => $message), true);
            else
                $outputMessages .= $this->renderPartial('/elements/im/_myMessage', array('data' => $message), true);
        }

        $userArray = array('id' => $user->getPrimaryKey(), 'username' => $user->username, 'photo' => $user->photo, 'address' => $user->address);


        print json_encode(array('messages' => $outputMessages, 'user' => $userArray));
    }

    public function actionSendMessage()
    {
        if(isset($_POST['message']) && isset($_POST['to']))
        {
            $message = new Chat();
            $message->is_read = 0;
            $message->user_from = Yii::app()->user->getId();
            $message->user_to = $_POST['to'];
            $message->created = new CDbExpression('NOW()');
            $message->updated = new CDbExpression('NOW()');
            $message->message = $_POST['message'];
            $message->save();

            $this->renderPartial('/elements/im/_myMessage', array('data' => Chat::model()->findByPk($message->getPrimaryKey()), 'hidden' => '1'));
        }
    }

    public function actionReadMessages($to)
    {
        Chat::model()->updateAll(array('is_read' => 1), 'user_to = :from AND user_from = :to', array(':from' => Yii::app()->user->getId(), ':to' => $to));
    }

    public function actionGetDialogs()
    {
        if(isset($_POST['content']))
        {
            $content = $_POST['content'];
            $output = '';
            foreach($content as $dialog)
            {
                $output .= $this->renderPartial('/elements/im/_dialog', array('data' => $dialog), true);
            }

            print $output;
        }
    }

    public function actionUserAutocomplete($query)
    {
        $users = array();
        foreach(User::model()->findAll(array('condition' => "username LIKE '%".$query."%' AND id <> ".Yii::app()->user->getId())) as $user)
        {
            $element = array('value' => $this->renderPartial('/elements/im/_autocompleteUser', array('data' => $user), true), 'data' => $user->username);
            $users[] = $element;
        }

        print json_encode(array('query' => '', 'suggestions' => $users));
    }
    public function actionGetUserInfo($id)
    {
        $user = User::model()->findByPk($id);
        $message = Chat::model()->findByAttributes(array('user_to' => $id, 'user_from' => Yii::app()->user->getId()), array('order' => 'created DESC'));

        if($user && $message)
        {
            $messageArray = array('created' => $message->created, 'unreadMessages' => 0, 'photo' => $user->photo, 'username' => $user->username, 'lastMessage' => $message->message, 'userid' => $user->getPrimaryKey());
            $outputDialog = $this->renderPartial('/elements/im/_dialog', array('data' => $messageArray), true);
            $outputMessage = $this->renderPartial('/elements/im/_myMessage', array('data' => $message), true);
            print json_encode(array('name' => $user->username, 'address' => $user->address, 'photo' => $user->photo, 'message' => $outputMessage, 'dialog' => $outputDialog));
        }
    }
    public function actionAppendMessages()
    {
        if(isset($_POST['content']))
        {
            $content = $_POST['content'];
            $output = '';
            foreach($content as $message)
            {
                if($message['user_from'] == Yii::app()->user->getId())
                    $output .= $this->renderPartial('/elements/im/_myMessage', array('data' => $message), true);
                else
                    $output .= $this->renderPartial('/elements/im/_message', array('data' => $message), true);
            }

            print $output;
        }
    }

    public function actionAjaxGetXmppUser()
    {
        if(isset($_POST['id']))
        {
            $data = explode('@', $_POST['id']);
            $user = User::model()->findByPk($data[0]);
            print json_encode(array('user' => array('username' => $user->username, 'avatar' => Yii::app()->baseUrl.'/uploads/avatar/'.$user['photo']), 'date' => date('d M, g:ia')));
        }
    }

    public function actionCreateUsers()
    {
        foreach(User::model()->findAll() as $user)
        {
            $ofUser = new UserService(false);
            $ofUser->api('add', array($user->id, $user->password, $user->username, $user->email));
        }
    }

    public function actionDeleteUsers()
    {
        foreach(User::model()->findAll() as $user)
        {
            $ofUser = new UserService(false);
            echo 1;
            if($user->username != 'admin')
            {
                $ofUser->api('delete', array($user->id));
            }
        }
    }
    public function actionAbout()
    {
        $this->layout = 'mobile_feed';
        $this->render('about');
    }

    public function actionAddMessage()
    {
        var_dump($_POST);
        $chat = new Chat();

        if($_POST['type'] == 'incoming')
        {
            $chat->user_from = $_POST['user'];
            $chat->user_to = Yii::app()->user->getId();
        }
        else
        {
            $chat->user_from = Yii::app()->user->getId();
            $chat->user_to = $_POST['user'];
        }

        $chat->message = $_POST['message'];
        $chat->is_read = 1;
        $chat->created = new CDbExpression('NOW()');
        $chat->updated = new CDbExpression('NOW()');

        $chat->save();
        var_dump($chat->errors);
    }
}