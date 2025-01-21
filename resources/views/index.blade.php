<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LARAVEL VERCEL</title>
    <style>

    </style>
</head>

<body>
    <h2>Response Headers :</h2>
    <pre>
        <?php
        $headers = headers_list();
        
        foreach ($headers as $header) {
            echo $header . '<br>';
        }
        ?>
    </pre>

    <p>
        You must add the <code>APP_KEY</code> from your <code>.env</code> file into the <code>vercel.json</code>
        configuration.
        To do this, you need to set the <code>APP_KEY</code> in the <code>env</code> section of the
        <code>vercel.json</code> file.
        First, generate your <code>APP_KEY</code> using the command <code>php artisan key:generate</code> and then copy
        the generated key into the <code>vercel.json</code> file like this:
    </p>

    <pre>
 {
     "version": 2,
     "framework": null,
     "functions": {
         "api/index.php": { "runtime": "vercel-php@0.6.0" }
     },
     "routes": [
         {
             "src": "/(.*)",
             "dest": "/api/index.php"
         },
         {
             "src": "/(.*)",
             "dest": "public/$1"
         }
     ],
     "env": {
         "APP_ENV": "production",
         "APP_DEBUG": "true",
         "APP_URL": "https://yourprojectdomain.com",

         // Add your APP_KEY here
         "APP_KEY": "",
         // Add your APP_KEY here

         "APP_CONFIG_CACHE": "/tmp/config.php",
         "APP_EVENTS_CACHE": "/tmp/events.php",
         "APP_PACKAGES_CACHE": "/tmp/packages.php",
         "APP_ROUTES_CACHE": "/tmp/routes.php",
         "APP_SERVICES_CACHE": "/tmp/services.php",
         "VIEW_COMPILED_PATH": "/tmp",
 
         "CACHE_DRIVER": "array",
         "LOG_CHANNEL": "stderr",
         "SESSION_DRIVER": "cookie"
     }
 }
    </pre>

    <p>
        Additionally, to set up the build and output settings in Vercel, make sure to:
    </p>
    <ul>
        <li>Set the <strong>Output Directory</strong> to <code>public</code> in the Vercel dashboard to ensure that the
            built files are served from the correct directory.</li>
        <li>In Vercel, under the <strong>Build & Output Settings</strong> section, ensure that the version of Node.js is
            set to <strong>18.x</strong> or higher (but not the latest version). This is important for compatibility and
            stability with the packages and dependencies in your Laravel project.</li>
    </ul>

</body>

</html>
