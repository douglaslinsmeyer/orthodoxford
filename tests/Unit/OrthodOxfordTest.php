<?php
/**
 * File OrthodOxfordTest.php
 *
 * @author Douglas Linsmeyer <douglas.linsmeyer@nerdery.com>
 */

namespace DLinsmeyer\OrthodOxford\Test\Unit;

use DLinsmeyer\OrthodOxford\OrthodOxford;

/**
 * Class OrthodOxfordTest
 *
 * @author Douglas Linsmeyer <douglas.linsmeyer@nerdery.com>
 */
class OrthodOxfordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Comma formatter
     *
     * @var OrthodOxford
     */
    private $formatter;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        parent::setUp();

        $this->formatter = new OrthodOxford();
    }

    /**
     * Test conversion to Oxford comma
     *
     * @dataProvider stringProvider
     * @param string $wrongString
     * @param string $rightString
     *
     * @return void
     */
    public function testCanConvertStandardCommas($wrongString, $rightString)
    {
        $fixedString = $this->formatter->right($wrongString);
        $this->assertEquals($fixedString, $rightString);

        $brokenString = $this->formatter->wrong($rightString);
        $this->assertEquals($brokenString, $wrongString);
    }

    /**
     * Data provider for standard comma strings
     *
     * @return array
     */
    public function stringProvider()
    {
        return [
            [
                'I like flour, sugar and chocolate in my brownies; but I also enjoy running, bicycling riding and climbing.',
                'I like flour, sugar, and chocolate in my brownies; but I also enjoy running, bicycling riding, and climbing.',
            ],
            [
                'My peripherals include headphones, keyboards and mice.',
                'My peripherals include headphones, keyboards, and mice.',
            ],
            [
                'Our presidents, Lady and Tom O’Neill.',
                'Our presidents, Lady, and Tom O’Neill.',
            ],
            [
                'They went to the Nerdery with Joe, a client and an employee.',
                'They went to the Nerdery with Joe, a client, and an employee.',
            ],
        ];
    }
}
