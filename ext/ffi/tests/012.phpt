--TEST--
FFI 012: serialization
--EXTENSIONS--
ffi
--INI--
ffi.enable=1
--FILE--
<?php
try {
    var_dump(serialize(FFI::cdef()->new("int[2]")));
} catch (Throwable $e) {
    echo get_class($e) . ": " . $e->getMessage()."\n";
}
?>
--EXPECT--
Exception: Serialization of 'FFI\CData' is not allowed
