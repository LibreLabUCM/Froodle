<?php

/**
 * Generates a random string to be used as a Unique User ID
 * It uses microtime to be sure calls to this function at different times return different values (accurate to a millionth o a second)
 * It hashes the microtime with sha256 to avoid storing the time of creation of the UUID in the same UUID in plaintext
 * It uses mt_rand to generate quickly a random integer of 32 bits
 * It uses random_bytes to generate cryptographically secure pseudo-random bytes
 *
 * @return string the UUID as a string
 */
function gen_uuid() {
    return sprintf( '%s-%x-%s',
      hash('sha256', microtime(true) * 1000000),
      mt_rand( 0, 0xffffffff ),
      bin2hex(random_bytes(16))
    );
}


/**
 * https://stackoverflow.com/a/31107425
 *
 * Generate a random string, using a cryptographically secure
 * pseudorandom number generator (random_int)
 *
 * For PHP 7, random_int is a PHP core function
 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
 *
 * @param int $length      How many characters do we want?
 * @param string $keyspace A string of all possible characters
 *                         to select from
 * @return string
 */
function gen_randStr($length = 32, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ') { // !"$%&/()=?|@#{}[]
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}
