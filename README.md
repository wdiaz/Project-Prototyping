# PHPUnitTesting

There are two ways of executing tests.
1) From Command Line

        a) If you use phpunit that is included in your project (composer.json)  
           [project_location] vendor/phpunit/phpunit/phpunit --bootstrap src/Acme/Email.php tests/App/Acme/EmailTest

        b) The one you use within your operatin system. Normaly located at /usr/local/bin/
           [project_location] phpunit --bootstrap src/Acme/Email.php tests/App/Acme/EmailTest
        
        
2) Executing within IDE. I'm an avid user of NetBeans; however, I'm facing difficulties on integrating the remote PHPUnit
    environment into it so I'm working with PHPStorm now.
    
[https://github.com/wdiaz/PHPUnitTesting/blob/master/wiki/images/php_configuration.png]