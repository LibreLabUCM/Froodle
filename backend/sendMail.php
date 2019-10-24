// sendMail.php license under GPL v3
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once(__DIR__ . '/../vendor/autoload.php');

require_once(__DIR__ . '/utils.php');

class CustomMailer extends PHPMailer {
  public function __construct($arg1 = null) {
    parent::__construct($arg1);
    self::setup();
  }

  private function setup() {
    $smtpconfig = getDatabaseConfigVal('emailsmtp');
    if (!$smtpconfig) throw new Exception('No SMTP config available');
    $this->CharSet = 'UTF-8';
    //Server settings
    $this->SMTPDebug = 4;                                 // Enable verbose debug output
    $this->isSMTP();                                      // Set mailer to use SMTP
    $this->Host = $smtpconfig['host'];                    // Specify main and backup SMTP servers
    $this->SMTPAuth = true;                               // Enable SMTP authentication
    $this->Username = $smtpconfig['username'];            // SMTP username
    $this->Password = $smtpconfig['password'];            // SMTP password
    $this->SMTPSecure = $smtpconfig['SMTPSecure'];        // Enable TLS encryption, `ssl` also accepted
    $this->Port = $smtpconfig['port'];                    // TCP port to connect to
    $this->setFrom($smtpconfig['fromEmail'], $smtpconfig['fromName']);
  }
}
