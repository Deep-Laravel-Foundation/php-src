--TEST--
ldap_exop_whoami() - EXOP whoami operation
--CREDITS--
Côme Chilliet <mcmic@php.net>
--EXTENSIONS--
ldap
--SKIPIF--
<?php require_once('skipifbindfailure.inc'); ?>
--FILE--
<?php
require "connect.inc";

$link = ldap_connect_and_bind($uri, $user, $passwd, $protocol_version);
insert_dummy_data($link, $base);

var_dump(
  ldap_exop_whoami($link)
);
?>
--CLEAN--
<?php
require "connect.inc";

$link = ldap_connect_and_bind($uri, $user, $passwd, $protocol_version);

remove_dummy_data($link, $base);
?>
--EXPECTF--
string(%d) "dn:%s"
