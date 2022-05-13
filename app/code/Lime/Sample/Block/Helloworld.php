<?php
namespace Lime\Sample\Block;
class Helloworld extends \Magento\Framework\View\Element\Template
{
    public function getHelloWorldText()
    {
        return 'Hello world!';
    }
}