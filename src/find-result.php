<?php
/**
 * `find_result()` function
 *
 * (c) Alley <info@alley.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package wp-find-one
 */

namespace Alley\WP;

/**
 * Returns the first item in the given array if the item is an instance of a
 * specific class or is a non-object.
 *
 * @param string        $class   If the result plucked from $results is an object, the
 *                               name of the class the object must be an instance of
 *                               for it to be returned.
 * @param mixed|mixed[] $results The array of results from the WordPress query
 *                               function to retrieve the result from.
 * @return mixed|null An object of the given $class; a non-object if the item
 *                               plucked from $results is not an object; null if no
 *                               result is found.
 */
function find_result( string $class, $results ) {
	if ( ! $results || ! \is_array( $results ) ) {
		return null;
	}

	$result = reset( $results );

	if ( ! \is_object( $result ) ) {
		// For example, queries that return only IDs or `id=>parent`.
		return $result;
	}

	if ( ! ( $result instanceof $class ) ) {
		return null;
	}

	return $result;
}
