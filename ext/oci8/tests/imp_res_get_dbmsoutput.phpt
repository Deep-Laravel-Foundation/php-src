--TEST--
Oracle Database 12c Implicit Result Sets: oci_get_implicit_resultset: interleaved with DBMS_OUTPUT
--EXTENSIONS--
oci8
--SKIPIF--
<?php
require_once 'skipifconnectfailure.inc';
$target_dbs = array('oracledb' => true, 'timesten' => false);  // test runs on these DBs
require __DIR__.'/skipif.inc';
preg_match('/.*Release ([[:digit:]]+)\.([[:digit:]]+)\.([[:digit:]]+)\.([[:digit:]]+)\.([[:digit:]]+)*/', oci_server_version($c), $matches);
if (!(isset($matches[0]) && $matches[1] >= 12)) {
    die("skip expected output only valid when using Oracle Database 12c or greater");
}
preg_match('/^[[:digit:]]+/', oci_client_version(), $matches);
if (!(isset($matches[0]) && $matches[0] >= 12)) {
    die("skip works only with Oracle 12c or greater version of Oracle client libraries");
}
?>
--FILE--
<?php

require __DIR__.'/connect.inc';

// Initialization

$stmtarray = array(
    "drop table imp_res_get_dbmsoutput_tab_1",
    "create table imp_res_get_dbmsoutput_tab_1 (c1 number, c2 varchar2(10))",
    "insert into imp_res_get_dbmsoutput_tab_1 values (1, 'abcde')",
    "insert into imp_res_get_dbmsoutput_tab_1 values (2, 'fghij')",
    "insert into imp_res_get_dbmsoutput_tab_1 values (3, 'klmno')",

    "drop table imp_res_get_dbmsoutput_tab_2",
    "create table imp_res_get_dbmsoutput_tab_2 (c3 varchar2(1))",
    "insert into imp_res_get_dbmsoutput_tab_2 values ('t')",
    "insert into imp_res_get_dbmsoutput_tab_2 values ('u')",
    "insert into imp_res_get_dbmsoutput_tab_2 values ('v')",

    "create or replace procedure imp_res_get_dbmsoutput_proc as
      c1 sys_refcursor;
    begin
      dbms_output.put_line('Line 1');
      open c1 for select * from imp_res_get_dbmsoutput_tab_1 order by 1;
      dbms_sql.return_result(c1);
      dbms_output.put_line('Line 2');
      open c1 for select * from imp_res_get_dbmsoutput_tab_2 order by 1;
      dbms_sql.return_result(c1);
      dbms_output.put_line('Line 3');
      open c1 for select * from dual;
      dbms_sql.return_result (c1);
    end;"
);

oci8_test_sql_execute($c, $stmtarray);

// Turn DBMS_OUTPUT on
function setserveroutputon($c)
{
    $s = oci_parse($c, "begin dbms_output.enable(null); end;");
    oci_execute($s);
}

function getdbmsoutput_do($c)
{
    $s = oci_parse($c, "begin dbms_output.get_line(:ln, :st); end;");
    oci_bind_by_name($s, ":ln", $ln, 100);
    oci_bind_by_name($s, ":st", $st, -1, SQLT_INT);
    $res = [];
    while (($succ = oci_execute($s)) && !$st) {
        $res[] = $ln;  // append each line to the array
    }
    return $res;
}

setserveroutputon($c);

// Run Test

echo "Test 1\n";

$s = oci_parse($c, "begin imp_res_get_dbmsoutput_proc(); end;");
oci_execute($s);

var_dump(getdbmsoutput_do($c));

while (($s1 = oci_get_implicit_resultset($s))) {
    while (($row = oci_fetch_array($s1, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        foreach ($row as $item) {
            echo "  ".$item;
        }
        echo "\n";
    }
}

echo "Test 2\n";

$s = oci_parse($c, "begin imp_res_get_dbmsoutput_proc(); end;");
oci_execute($s);

while (($s1 = oci_get_implicit_resultset($s))) {
    while (($row = oci_fetch_array($s1, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
        foreach ($row as $item) {
            echo "  ".$item;
        }
        echo "\n";
    }
}

var_dump(getdbmsoutput_do($c));

// Clean up

$stmtarray = array(
    "drop procedure imp_res_get_dbmsoutput_proc",
    "drop table imp_res_get_dbmsoutput_tab_1",
    "drop table imp_res_get_dbmsoutput_tab_2"
);

oci8_test_sql_execute($c, $stmtarray);

?>
--EXPECT--
Test 1
array(3) {
  [0]=>
  string(6) "Line 1"
  [1]=>
  string(6) "Line 2"
  [2]=>
  string(6) "Line 3"
}
  1  abcde
  2  fghij
  3  klmno
  t
  u
  v
  X
Test 2
  1  abcde
  2  fghij
  3  klmno
  t
  u
  v
  X
array(3) {
  [0]=>
  string(6) "Line 1"
  [1]=>
  string(6) "Line 2"
  [2]=>
  string(6) "Line 3"
}
