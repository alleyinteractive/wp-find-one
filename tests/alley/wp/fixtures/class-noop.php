<?php
/**
 * Class file for Noop
 *
 * (c) Alley <info@alley.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package wp-find-one
 */

namespace Alley\WP\Fixtures;

/**
 * A class that does nothing but can be instantiated and referenced.
 */
final class Noop {
	/**
	 * Called when a script tries to call this object as a function.
	 */
	public function __invoke() {}
}
