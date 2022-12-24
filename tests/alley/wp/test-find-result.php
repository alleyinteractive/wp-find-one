<?php
/**
 * Class file for Test_Find_Result
 *
 * (c) Alley <info@alley.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package wp-find-one
 */

namespace Alley\WP;

use Alley\WP\Fixtures\Noop;
use Mantle\Testkit\Test_Case;

/**
 * Unit tests for `find_result()`.
 */
final class Test_Find_Result extends Test_Case {
	/**
	 * Test that `find_result()` plucks the expected value from the given args.
	 *
	 * @dataProvider data_find_result
	 *
	 * @param array $args     Function arguments.
	 * @param mixed $expected Expected return value.
	 */
	public function test_find_result( $args, $expected ) { // phpcs:ignore Generic.NamingConventions.ConstructorName.OldStyle
		$this->assertSame( $expected, find_result( ...$args ) );
	}

	/**
	 * Data provider with arguments for test_find_result().
	 *
	 * @return array Array of data.
	 */
	public function data_find_result() {
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
