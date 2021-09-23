<?php

namespace MonologTelegram;

use Monolog\Logger;
use \_class\monolog\TelegramHandler;
use \_class\monolog\TelegramFormatter;
use Exception;

class Log
{

    protected $log;

    protected $lastLogDate;
    const INTERVAL = 60 / 20;

    public function __construct($title)
    {
        $this->log = new Logger($title);
        $handler = new TelegramHandler(TELEGRAM_BOT_TOKEN, TELEGRAM_CHAT_ID, Logger::DEBUG, true, 'HTML');
        $handler->setFormatter(new TelegramFormatter()); 

        $this->log->pushHandler($handler);

        $this->lastLogDate = time() - 5;
    }

    private function sleep()
    {
        $now = time();
        $diff = $now - $this->lastLogDate;
        if($diff < self::INTERVAL){
            $sleepTime = self::INTERVAL - $diff;
            if($sleepTime > 0) sleep($sleepTime);
        }
        $this->lastLogDate = time();
    }

    public function notice($message, $data)
    {
        $this->sleep();
        try{
            $this->log->notice($message, $data);
        } catch (Exception $e){
            // echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    
    public function critical($message, $data)
    {
        $this->sleep();
        try{
            $this->log->critical($message, $data);
        } catch (Exception $e){
            // echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
   
    public function alert($message, $data)
    {
        $this->sleep();
        try{
            $this->log->alert($message, $data);
        } catch (Exception $e){
            // echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    
    public function info($message, $data)
    {
        $this->sleep();
        try{
            $this->log->info($message, $data);
        } catch (Exception $e){
            // echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function error($message, $data)
    {
        $this->sleep();
        try{
            $this->log->error($message, $data);
        } catch (Exception $e){
            // echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }

    public function warning($message, $data)
    {
        $this->sleep();
        try{
            $this->log->warning($message, $data);
        } catch (Exception $e){
            // echo json_encode(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}