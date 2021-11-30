<?php

try {
    $client = new SoapClient("http://soap.app/message.wsdl");

    $result = $client->getMessage(2);
    echo "Сообщение: ", $result;

} catch (SoapFault $exception) {
    echo $exception->getMessage();
}