<?php

namespace Admin\View\plagin\file;

class test11
{

    public function test()
    {
        $array1 = [
            'a' => '1',
            'b' => '2'
        ];

        return $array1;
    }

}
$a = new test11();
print_r($a->test());