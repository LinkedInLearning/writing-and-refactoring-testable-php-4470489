<?php
declare(strict_types=1);


namespace tests;

class Redirects_Test extends \PHPUnit\Framework\TestCase
{
    
    public function setUp(): void
    {
        require_once __DIR__ . '/../Redirects.php';
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function test_to_array(): void {
        $redirects = new \Redirects( [
            'linkedin' => 'https://www.linkedin.com',
            'learning' => 'https://www.linkedin.com/learning/',
        ] );
        $expected = [
            'linkedin' => 'https://www.linkedin.com',
            'learning' => 'https://www.linkedin.com/learning/',
        ];
        
        $this->assertEquals($expected, $redirects->to_array());
    }

    function test_should_redirect()
    {
        $redirects = new \Redirects( [
            'linkedin' => 'https://www.linkedin.com',
            'learning' => 'https://www.linkedin.com/learning/',
        ] );
        
        $this->assertTrue($redirects->should_redirect('linkedin'));
        $this->assertFalse($redirects->should_redirect('another-path'));
    }
    
    function test_get_redirect()
    {
        $redirects = new \Redirects( [
            'linkedin' => 'https://www.linkedin.com',
            'learning' => 'https://www.linkedin.com/learning/',
        ] );
        
        $this->assertEquals('https://www.linkedin.com', $redirects->get_redirect('linkedin'));
    }
}
