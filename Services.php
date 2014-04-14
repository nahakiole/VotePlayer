<?php
$services['PDO'] = function ($c) {
    return new \PDO(
        'mysql:host=' . $c['db.host'] . ';dbname=' . $c['db.dbname'] . ';'
        , $c['db.user']
        , $c['db.password']);
};

$services['demo'] = function ($c) {
    return new \Controller\Demo($c['PDO'], $c['languageLoader']);
};

$services['error'] = function () {
    return new \Controller\Error();
};

$services['languageLoader'] = function ($c) {
    return new \Fredy\LanguageLoader($c['language.default'], $c['language.array'], $c['language.directory'], $_SERVER['HTTP_ACCEPT_LANGUAGE']);
};