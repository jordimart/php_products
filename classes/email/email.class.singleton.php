<?php

class email {

    private $body;
    private $address;
    private $subject;
    private $mail;
    private $name;
    static $_instance;

    private function __construct() {
        try {
            //$this->mail = new PHPMailer();
            $this->mail = new phpmailer();
            $this->mail->IsSMTP();

            $cnfg = parse_ini_file("email.ini");

            $this->mail->SMTPAuth = $cnfg['auth'];
            $this->mail->SMTPSecure = $cnfg['secure'];
            $this->mail->Host = $cnfg['host'];
            $this->mail->Port = $cnfg['port'];
            $this->mail->Username = $cnfg['email'];
            $this->mail->Password = $cnfg['pass'];
            $this->mail->AddReplyTo($cnfg['email'], $cnfg['defaultsubject']);
            $this->mail->SetFrom($cnfg['email'], $cnfg['defaultsubject']);
            //$this->mail->addAttachment(IMG_RURAL_SHOP);

            $this->subject = "FindMenu";
        } catch (phpmailerException $e) {
            //echo $e->errorMessage();
            $log = log::getInstance();
            $log->add_log_general("error construct email.class.singleton.php", $_GET['module'], "response " . http_response_code());
            $log->add_log_user("error construct email.class.singleton.php", "", $_GET['module'], "response " . http_response_code());

            throw new Exception();
        } catch (Exception $e) {
            //echo $e->getMessage();
            $log = log::getInstance();
            $log->add_log_general("error construct email.class.singleton.php", $_GET['module'], "response " . http_response_code());
            $log->add_log_user("error construct email.class.singleton.php", "", $_GET['module'], "response " . http_response_code());

            throw new Exception();
        }
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function send_mailgun() {
        $config = array();
        $config['api_key'] = "key-2911f2d5f02b728689487938a5b71959"; //API Key
        $config['api_url'] = "https://api.mailgun.net/v3/sandbox64525abd390a438e915d765364545edf.mailgun.org/messages"; //API Base URL

        $message = array();
        	$message['from'] = "gv.web.denvelopers@gmail.com";
        	$message['to'] = $this->address;
        	$message['h:Reply-To'] = "gv.web.denvelopers@gmail.com";
        	$message['subject'] = $this->subject;
        	$message['html'] = $this->body;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $config['api_url']);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
