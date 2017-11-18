<?php
/**
 * Created by Larakit.
 * Link: http://github.com/larakit
 * User: Alexey Berdnikov
 * Date: 23.05.16
 * Time: 10:02
 */
\Larakit\StaticFiles\Manager::package('larakit/sf-angular-recaptcha')
    ->setSourceDir('public')
    ->usePackage('larakit/sf-angular')
    ->js('http://www.google.com/recaptcha/api.js?render=explicit&onload=vcRecaptchaApiLoaded')
    ->jsPackage('angular-recaptcha.js');

\Larakit\LkNgModule::register('vcRecaptcha');