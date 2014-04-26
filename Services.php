<?php
$services = [];
$services['PDO'] = function ($c) {
    return new \PDO(
        'mysql:host=' . $c['db.host'] . ';dbname=' . $c['db.dbname'] . ';'
        , $c['db.user']
        , $c['db.password']);
};

$services['demo'] = function () {
    return new \Controller\Overview();
};

$services['error'] = function () {
    return new \Controller\Error();
};

$services['upload'] = function () {
    return new \Controller\Upload();
};

$services['user'] = function ($c) {
    return new \Controller\User($c['PDO']);
};

$services['settings'] = function () {
    return new \Controller\Settings();
};

$services['music'] = function () {
    return new \Controller\Music();
};

$services['languageLoader'] = function ($c) {
    return new \Fredy\LanguageLoader($c['language.default'], $c['language.array'], $c['language.directory'], $_SERVER['HTTP_ACCEPT_LANGUAGE']);
};