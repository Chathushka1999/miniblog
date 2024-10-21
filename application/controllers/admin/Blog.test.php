<?php
use PHPUnit\Framework\TestCase;

class BlogTest extends TestCase
{
    private $CI;

    protected function setUp(): void
    {
        $this->CI = &get_instance();
        $this->CI->load->database();
        $this->CI->load->library('unit_test');
    }
}
