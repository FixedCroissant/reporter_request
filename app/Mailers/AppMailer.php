<?php namespace App\Mailers;
//Get Laravel's Mailer
use Illuminate\Contracts\Mail\Mailer;

//Use Carbon for dates.
use Carbon\Carbon;

class AppMailer
{

    /**
     * The Laravel Mailer instance.
     *
     * @var Mailer
     */
    protected $mailer;

    /**
     * Admin Email
     *
     * @var string
     */
    protected $adminEmail = 'do_not_reply@fakeaddress.com';

    /**
     * From name or company
     */
    protected $fromName = 'DASA Help Desk';

    /**
     * The sender of the email.
     *
     * @var string
     */
    protected $from = 'do_not_reply@fakeaddress.com';

    /**
     * The recipient of the email.
     *
     * @var string
     */
    protected $to;

    /**
     * The carbon copy address of the email message.
     * @var string
     */
    protected $carbonCopy;

    /**
     * The recipient name of the email.
     *
     * @var string
     */
    protected $toName;

    /**
     * The view for the email.
     *
     * @var string
     */
    protected $view;

    /**
     * The data associated with the view for the email.
     *
     * @var array
     */
    protected $data = [];

    /**
     * User account number that is correlated with the table: users.
     **/
     protected $userID;

    /**
     * Create a new app mailer instance.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;

        //Set date time for right now.
        //Use Php:Date formatting
        //See: http://php.net/manual/en/function.date.php
        $dateTimeNow = \Carbon\Carbon::now()->format('m-d-Y h:i:s');
        $this->dateTime=$dateTimeNow;
    }

    /**
     * Set the view that will be used
     *
     * @param String view location
     */
    public function setView($view){
      $this->view = $view;
    }

    /**
     * Set where the email will be going
     *
     * @param String To Address e-mail
     */
    public function setTo($to){
      $this->to = $to;
    }

    /**
     * Set the carbon copy address of
     * where you would like the e-mail message to go.
     *
     * @param String carbonCopyAddress  CarbonCopy Email
     *
     */
    public function setCarbonCopy($carbonCopyAddress){
        $this->carbonCopy=$carbonCopyAddress;
    }

    /**
     * Set the to name
     *
     * @param String From Name
     */
    public function setToName($toName){
      $this->toName = $toName;
    }

    /**
     * Set the from name
     *
     * @param String From Name
     */
    public function setFrom($from){
      $this->fromName = $from;
    }

    /**
     * Set the data name
     *
     * @param array data
     */
    public function setData($newDATA){
        $this->data=($newDATA);
    }

    /**
     *  Set the subject of the e-mail.
     * @param
     **/
    public function setMailSubject($subjectName){
      $this->subject=$subjectName;
    }
    /**
    * Provide the user id of the person being emailed.
    */
    public function setUserNumber($idNumber){
      $this->userID = $idNumber;
    }

    /**
     * Send the email.
     *
     * @return void
     */
    public function sendMessage()
    {
        //Handle whether or not a carbonCopy is warranted and necessary to be used
        if(!is_Null($this->carbonCopy))
        {
            $this->mailer->send($this->view, $this->data, function ($message) {
                $message->from($this->from, $this->fromName)
                    ->cc($this->carbonCopy)
                    ->subject($this->subject)
                    ->to($this->to, $this->toName);
            });
        }
        //No Carbon-copy needed.
        else{
                $this->mailer->send($this->view, $this->data, function ($message) {
                    $message->from($this->from, $this->fromName)
                        ->subject($this->subject)
                            ->to($this->to,$this->toName);
                });
        }
    }

}
