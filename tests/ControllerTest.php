<?php

use Bandama\Foundation\Controller\Controller;


class ControllerTest extends \PHPUnit_Framework_TestCase {

    public function testRenderWithoutViewFile() {
        $controller = new Controller();

        ob_start();
        $controller->render('hello');
        $content = ob_get_clean();

        $this->assertEquals('hello', $content);
    }

    public function testRenderWithViewFile() {
        $controller = new Controller();

        ob_start();
        $controller->render(__DIR__.'/fake_view_without_variable.php');
        $content = ob_get_clean();

        $this->assertEquals('Hello world', $content);

        ob_start();
        $controller->render(__DIR__.'/fake_view_with_variable.php', array('name' => 'jf'));
        $content = ob_get_clean();

        $this->assertEquals('Hello jf', $content);
    }

}