<?php
declare(strict_types=1);

namespace Team13CD\app\controllers;

use Team13CD\framework\App;
use Team13CD\framework\routing\View;

final class ContactController
{


    /**
     * Display the contact page
     *
     * @return mixed
     */
    public function contact()
    {
        return View::load('pages/contact');
    }


    /**
     * Send submitted form as e-mail and redirect to the contact page
     *
     * Uing the POST-Redirect-GET pattern here to prevent accidental double submission when using the browser back button/shortcut
     *
     * @return mixed
     */
    public function contactSubmit()
    {
        $errors = [];

        if (empty($_POST['name'])) {
            $errors[] = "Geef een naam op";
        } else {
            $senderName = $_POST['name'];
        }

        if (empty($_POST['e-mail'])) {
            $errors[] = "Geef een e-mail op";
        } elseif (!filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Het opgegeven e-mailadres is niet geldig";
        } else {
            $senderEmail = $_POST['e-mail'];
        }

        if (empty($_POST['subject'])) {
            $errors[] = "Geef een onderwerp op";
        } else {
            $subject = $_POST['subject'];
        }


        if (empty($_POST['message'])) {
            $errors[] = "Geef een bericht";
        } else {
            $message = $_POST['message'];
        }

        if (!empty($_POST['phone'])) {
            $message = 'Telefoonnummer afzender: ' . $_POST['phone'] . '\r\n-----------------------------------------\r\n';
        }

        if (!empty($errors)) {

            header('HTTP/2.0 307 Temporary Redirect');//307 preserves form data
            header('Location:contact?errors=' . rawurlencode(json_encode($errors)));

            echo "Go <a href=\"contact?errors=" . htmlspecialchars((json_encode($errors)), ENT_QUOTES, 'utf-8') . "\">here</a>";

            die();

        } else {
            $from = App::get('config')['e-mail']['from'];//The server's e-mail address
            $to = App::get('config')['e-mail']['to'];//The site owner's e-mail address

            $replyTo = mb_encode_mimeheader('"' . $senderName . '" <' . $senderEmail . '>', 'utf-8');

            $headers = array//Inspired by https://stackoverflow.com/a/14789383
            (
                'MIME-Version: 1.0',
                'Content-Type: text/plain; charset="UTF-8";',
                'Content-Transfer-Encoding: 8bit',
                'Date: ' . date('r', $_SERVER['REQUEST_TIME']),
                'Message-ID: <' . $_SERVER['REQUEST_TIME'] . '-' . mt_rand(1000000, 9999999) . '@' . $_SERVER['SERVER_NAME'] . '>',
                'From: ' . $from,
                'Reply-To: ' . $replyTo,
                'Return-Path: ' . $from,
                'Mailer: PHP/' . phpversion(),
                'Sender-IP: ' . $_SERVER['REMOTE_ADDR'],
            );

            global $mailSent;

            $mailSent = true;

            set_error_handler(array($this, "mailWarningHandler"), E_WARNING);
            mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, implode("\n", $headers));//TODO inquire if switching to phpMailer if allowed so this can be tested
            restore_error_handler();

            if ($mailSent) {
                header('HTTP/2.0 303 	See Other');//303: Explicitly switch from POST to GET
                header('Location:contact?submitted=true');

                echo "Go <a href=contact?submitted=true>here</a>";

                die();
            } else {
                header('HTTP/2.0 307 Temporary Redirect');//307 preserves form data
                header('Location:contact?submitted=false');

                echo "Go <a href=contact?submitted=false>here</a>";

                die();
            }
        }


    }

    /**
     * For handling warnings raised by mail() which lead to the e-mail not being sent
     *
     * Will set the $mailSent global to false and
     *
     * @param $errno
     * @param $errstr
     */
    private function mailWarningHandler($errno, $errstr)
    {
        global $mailSent;
        $mailSent = false;

        if ((ini_get("error_reporting") | E_ALL) == ini_get("error_reporting")) {
            echo '<strong>Warning <em>' . $errno . '</em>:</strong>  &ldquo;' . $errstr . '&rdquo;';
        }
        //die(); here to view the warnings raised by mail(), or view the response in the browsers' Network panel
    }


}