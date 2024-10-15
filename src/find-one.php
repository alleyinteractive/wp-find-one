<?php
/**
 * `find_one()` functions
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
 * Query for and return one post.
 *
 * @param mixed[] $args Query arguments.
 * @return mixed|null A \WP_Post object, an alternate return type if requested
 *                    in $args, or null.
 */
function find_one_post( array $args ) {
	return find_result(
		\WP_Post::class,
		get_posts( // phpcs:ignore WordPressVIPMinimum.Functions.RestrictedFunctions.get_posts_get_posts
			// Not attempting to re-enumerate all documented arguments.
			array_merge( // @phpstan-ignore argument.type
				$args,
				[
					'posts_per_page'   => 1,
					'suppress_filters' => false,
				]
			)
		)
	);
}

/**
 * Query for and return one term.
 *
 * @param mixed[] $args Query arguments.
 * @return mixed|null A \WP_Term object, an alternate return type if requested
 *                    in $args, or null.
 */
function find_one_term( array $args ) {
	return find_result(
		\WP_Term::class,
		get_terms(
			// Not attempting to re-enumerate all documented arguments.
			array_merge( // @phpstan-ignore argument.type
				$args,
				[
					'number' => 1,
				]
			)
		)
	);
}

/**
 * Query for and return one comment.
 *
 * @param mixed[] $args Query arguments.
 * @return mixed|null A \WP_Comment object, an alternate return type if
 *                    requested in $args, or null.
 */
function find_one_comment( array $args ) {
	return find_result(
		\WP_Comment::class,
		get_comments(
			// Not attempting to re-enumerate all documented arguments.
			array_merge( // @phpstan-ignore argument.type
				$args,
				[
					'number' => 1,
				]
			)
		)
	);
}

/**
 * Query for and return one user.
 *
 * @param mixed[] $args Query arguments.
 * @return mixed|null A \WP_User object, an alternate return type if requested
 *                    in $args, or null.
 */
function find_one_user( array $args ) {
	return find_result(
		\WP_User::class,
		get_users(
			// Not attempting to re-enumerate all documented arguments.
			array_merge( // @phpstan-ignore argument.type
				$args,
				[
					'number' => 1,
				]
			)
		)
	);
}

/**
 * Query for and return one site.
 *
 * @param mixed[] $args Query arguments.
 * @return mixed|null A \WP_Site object, an alternate return type if requested
 *                    in $args, or null.
 */
function find_one_site( array $args ) {
	return find_result(
		\WP_Site::class,
		get_sites(
			// Not attempting to re-enumerate all documented arguments.
			array_merge( // @phpstan-ignore argument.type
				$args,
				[
					'number' => 1,
				]
			)
		)
	);
}
