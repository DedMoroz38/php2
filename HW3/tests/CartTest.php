<?php

class CartTest extends PHPUnit\Framework\TestCase
{
    /**
     * @dataProvider providerCartConstructor
     */
    public function testCartConstructor($input, $expectation){
        $cart = new \app\models\entities\Cart($input);
        $this->assertEquals($expectation, $cart->sessionId);
    }
    public function providerCartConstructor(): array
    {
        return array (
            array ("fewfe34r42", "fewfe34r42"),
            array ("frkgtm5im4hn", "frkgtm5im4hn"),
            array ("32r5u87lo", "32r5u87lo")
        );
    }
}