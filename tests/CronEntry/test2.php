<?php
// Use following ubuntu command to install libssh2.
//sudo apt-get install libssh2-php

$connection = ssh2_connect('192.168.200.200', 22);

if (!$connection) die('Connection failed');

//ssh2_auth_password($connection, 'vagrant', 'vagrant');

if (ssh2_auth_password($connection, 'vagrant', 'vagrant')) {
    echo "Authentication Successful!\n";
} else {
    die('Authentication Failed...');
}

$stream = ssh2_exec($connection, '/usr/bin/php -i');

stream_set_blocking($stream, true);
$stream_out = ssh2_fetch_stream($stream, SSH2_STREAM_STDIO);
echo stream_get_contents($stream_out);

fclose($stream_out);