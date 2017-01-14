PHP Job Engine
============================

INSTALLATION
-------------------

Create `config/db.php` with following content:
```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'sqlsrv:Server=127.0.0.1;Database=test_db',
    'username' => 'test_user',
    'password' => 'test_password',
    'charset' => 'utf8',
];
```

Create `config/params.php` with following content:
```php
return [
    'steps_path' => 'C:\inetpub\wwwroot\job-engine\steps',
    'jobs_path' => 'C:\inetpub\wwwroot\job-engine\jobs'
];
```

Change dsn, username, password, steps_path and jobs_path according to your environment.