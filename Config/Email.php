<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail = 'add your email';
    public string $fromName = 'Your site';
    public string $userAgent = 'CodeIgniter';
    public string $protocol = 'smtp';
    public string $SMTPHost = 'smtp.gmail.com';
    public string $SMTPUser = 'add your SMTP user';
    public string $SMTPPass = 'add your SMTP pass'; // Replace with your App Password
    public int $SMTPPort = 587; // Use port 587 for TLS
    public string $SMTPCrypto = 'tls'; // Use 'ssl' for SSL encryption or 'tls' for TLS
    public string $mailType = 'html';
    public string $charset = 'UTF-8';
    public bool $validate = false; // Set to true if you want to validate email addresses

    // Additional optional settings
    public int $SMTPTimeout = 5; // SMTP timeout in seconds
    public bool $SMTPKeepAlive = false; // Whether to keep SMTP connection alive
    public bool $wordWrap = true; // Whether to word-wrap messages
    public int $wrapChars = 76; // Number of characters to wrap at
    public string $CRLF = "\r\n"; // End-of-line character sequence
    public string $newline = "\r\n"; // Newline character sequence
    public bool $BCCBatchMode = false; // Whether to use batch mode for BCC emails
    public int $BCCBatchSize = 200; // Batch size for BCC emails
    public bool $DSN = false; // Whether to enable Delivery Status Notifications

    // Constructor
    public function __construct()
    {
        parent::__construct();
    }
}
