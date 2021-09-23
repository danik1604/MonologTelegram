# Monolog Telegram

### Features
- Telegram handler with timeout
- Custom telegram message formatter

## Install 
Install using composer

`$ composer require danik1604/monolog-telegram`

## Basic Usage

```php
<?php

use \MonologTelegram\Log;

define("TELEGRAM_BOT_TOKEN", "");
define("TELEGRAM_CHAT_ID", "");

$log = new Log("TITLE GOES HERE");

$data = ['example' => 'data'];
$log->info("Message", $data);
```

### Methods

```php
<?php

use \MonologTelegram\Log;

define("TELEGRAM_BOT_TOKEN", "");
define("TELEGRAM_CHAT_ID", "");

$log = new Log("TITLE GOES HERE");

$log->notice("Message", []);  // ⚪
$log->critical("Message", []); // 🔴
$log->alert("Message", []); // 🔵
$log->info("Message", []); // 🟢
$log->error("Message", []); // 🟠
$log->warning("Message", []); // 🟡
```