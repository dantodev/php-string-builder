<?php namespace Dtkahl\StringBuilder;

class StringBuilderTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructToString()
    {
        $sb = new StringBuilder('a1', 'a2');
        $this->assertEquals('a1a2', $sb->__toString());
    }

    public function testAppend()
    {
        $sb = new StringBuilder();
        $sb->append('a1');
        $sb->append('a2');
        $this->assertEquals('a1a2', $sb->build());
    }

    public function testPrepend()
    {
        $sb = new StringBuilder();
        $sb->append('a1');
        $sb->prepend('a2');
        $this->assertEquals('a2a1', $sb->build());
    }

    public function testStartWithEndWith()
    {
        $sb = new StringBuilder();
        $sb->startWith('a1');
        $sb->endWith('a2');
        $this->assertEquals('a1a2', $sb->build());
    }

    public function testAppendTemplateString()
    {
        $sb = new StringBuilder();
        $sb->append('a1');
        $sb->append('a2%s', ['a3']);
        $this->assertEquals('a1a2a3', $sb->build());
    }

    public function testPrependTemplateString()
    {
        $sb = new StringBuilder();
        $sb->append('a1');
        $sb->prepend('a2%s', ['a3']);
        $this->assertEquals('a2a3a1', $sb->build());
    }

    public function testPrependReplace()
    {
        $sb = new StringBuilder();
        $sb->append('a1');
        $sb->prependReplace('a2', 'a', 'b');
        $this->assertEquals('b2a1', $sb->build());
    }

    public function testAppendReplace()
    {
        $sb = new StringBuilder();
        $sb->append('a1');
        $sb->appendReplace('a2', 'a', 'b');
        $this->assertEquals('a1b2', $sb->build());
    }

}