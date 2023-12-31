--TEST--
FFI 023: GCC struct extensions
--EXTENSIONS--
ffi
--INI--
ffi.enable=1
--FILE--
<?php
    $ffi = FFI::cdef();

    try {
        var_dump(FFI::sizeof($ffi->new("struct {}")));
    } catch (Throwable $e) {
        echo get_class($e) . ": " . $e->getMessage() . "\n";
    }
    var_dump(FFI::sizeof($ffi->new("struct {int a}")));
    var_dump(FFI::sizeof($ffi->new("struct {int a; int b}")));
?>
ok
--EXPECT--
FFI\Exception: Cannot instantiate FFI\CData of zero size
int(4)
int(8)
ok
