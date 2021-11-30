<?php
class MessageService {

    function getMessage($id) {
        $messages = [
            1 => "Первое сообщение",
            2 => "Второе сообщение",
            3 => "Третье сообщение",
            4 => "Четвертое сообщение",
            5 => "Пятое сообщение",
            6 => "Шестое сообщение"
        ];
        if (isset($messages[$id])) {
            $result = $messages[$id];
            return $result;
        } else {
            throw new SoapFault("Server", "Не существует сообщения с таким id. Пожалуйста отправьте id от 1 до 6.");
        }
    }
}

// Отключение кэширования WSDL-документа
ini_set("soap.wsdl_cache_enabled", "0");

// Создание SOAP-сервер
$server = new SoapServer("http://soap.app/message.wsdl");

$server->setClass("MessageService");


$server->handle();