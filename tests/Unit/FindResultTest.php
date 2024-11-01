<?php
/**
 * Class file for FindResultTest
 *
 * (c) Alley <info@alley.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package wp-find-one
 */

namespace Alley\WP\Tests\Unit;

use Alley\WP\Tests\Fixtures\Noop;
use Mantle\Testkit\Test_Case;

use PHPUnit\Framework\Attributes\DataProvider;

use function Alley\WP\find_result;

/**
 * Unit tests for `find_result()`.
 */
final class FindResultTest extends Test_Case {
	/**
	 * Test that `find_result()` plucks the expected value from the given args.
	 *
	 * @param array $args     Function arguments.
	 * @param mixed $expected Expected return value.
	 */
	#[dataProvider( 'data_find_result' )]
	public function test_find_result( $args, $expected ) { // phpcs:ignore Generic.NamingConventions.ConstructorName.OldStyle
		$this->assertSame( $expected, find_result( ...$args ) );
	}

	/**
	 * Data provider with arguments for test_find_result().
	 *
	 * @return array Array of data.
	 */
	public static function data_find_result() {
		$noop = new Noop();
		$post = 123;

		return [
			[
				[ Noop::class, [ $noop ] ],
				$noop,
			],
			[
				[ Noop::class, [ new \stdClass() ] ],
				null,
			],
			[
				[ Noop::class, [ $post ] ],
				$post,
			],
			[
				[ Noop::class, [] ],
				null,
			],
			[
				[ Noop::class, true ],
				null,
			],
		];
	}
}
