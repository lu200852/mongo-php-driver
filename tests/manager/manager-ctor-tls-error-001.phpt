--TEST--
MongoDB\Driver\Manager::__construct(): tlsInsecure cannot be combined with tlsAllowInvalidHostnames
--FILE--
<?php

require_once __DIR__ . '/../utils/tools.php';

echo throws(function() {
    new MongoDB\Driver\Manager('mongodb://localhost:27017/?tlsInsecure=true&tlsAllowInvalidHostnames=true');
}, "MongoDB\Driver\Exception\InvalidArgumentException"), "\n";

echo throws(function() {
    new MongoDB\Driver\Manager('mongodb://localhost:27017/', ['tlsInsecure' => true, 'tlsAllowInvalidHostnames' => true]);
}, "MongoDB\Driver\Exception\InvalidArgumentException"), "\n";

echo throws(function() {
    new MongoDB\Driver\Manager('mongodb://localhost:27017/?tlsInsecure=true', ['tlsAllowInvalidHostnames' => true]);
}, "MongoDB\Driver\Exception\InvalidArgumentException"), "\n";

echo throws(function() {
    new MongoDB\Driver\Manager('mongodb://localhost:27017/?tlsAllowInvalidHostnames=true', ['tlsInsecure' => true]);
}, "MongoDB\Driver\Exception\InvalidArgumentException"), "\n";

?>
===DONE===
<?php exit(0); ?>
--EXPECT--
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
Failed to parse MongoDB URI: 'mongodb://localhost:27017/?tlsInsecure=true&tlsAllowInvalidHostnames=true'. tlsinsecure may not be specified with tlsallowinvalidcertificates or tlsallowinvalidhostnames.
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
Failed to parse URI options: tlsinsecure may not be combined with tlsallowinvalidcertificates or tlsallowinvalidhostnames.
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
Failed to parse URI options: tlsinsecure may not be combined with tlsallowinvalidcertificates or tlsallowinvalidhostnames.
OK: Got MongoDB\Driver\Exception\InvalidArgumentException
Failed to parse URI options: tlsinsecure may not be combined with tlsallowinvalidcertificates or tlsallowinvalidhostnames.
===DONE===
