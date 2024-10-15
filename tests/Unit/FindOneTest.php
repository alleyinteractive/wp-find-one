<?php
/**
 * Class file for FindOneTest
 *
 * (c) Alley <info@alley.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package wp-find-one
 */

namespace Alley\WP\Tests\Unit;

use Mantle\Testkit\Test_Case;

use function Alley\WP\find_one_comment;
use function Alley\WP\find_one_post;
use function Alley\WP\find_one_site;
use function Alley\WP\find_one_term;
use function Alley\WP\find_one_user;

/**
 * Unit tests for the `find_one()` functions.
 */
final class FindOneTest extends Test_Case {
	/**
	 * Test that `find_one_post()` finds an expected \WP_Post object.
	 */
	public function test_find_one_post_finds_post() {
		$post_id = self::factory()->post->create(
			[
				'post_status' => 'draft',
			]
		);

		$actual = find_one_post(
			[
				'p'           => $post_id,
				'post_status' => 'draft',
			]
		);

		$this->assertInstanceOf( \WP_Post::class, $actual );
		$this->assertSame( $post_id, $actual->ID );
	}

	/**
	 * Test that `find_one_term()` finds an expected \WP_Term object.
	 */
	public function test_find_one_term_finds_term() {
		$term_id = self::factory()->term->create(
			[
				'name' => 'data1',
			]
		);

		$actual = find_one_term(
			[
				'hide_empty' => false,
				'name'       => 'data1',
			]
		);

		$this->assertInstanceOf( \WP_Term::class, $actual );
		$this->assertSame( $term_id, $actual->term_id );
	}

	/**
	 * Test that `find_one_comment()` finds an expected \WP_Comment object.
	 */
	public function test_find_one_comment_finds_comment() {
		$url = 'https://alley.co';

		$comment_id = self::factory()->comment->create(
			[
				'comment_author_url' => $url,
			]
		);

		$actual = find_one_comment(
			[
				'comment_author_url' => $url,
			]
		);

		$this->assertInstanceOf( \WP_Comment::class, $actual );
		$this->assertSame( $comment_id, (int) $actual->comment_ID );
	}

	/**
	 * Test that `find_one_user()` finds an expected \WP_User object.
	 */
	public function test_find_one_user_finds_user() {
		$user_id = self::factory()->user->create(
			[
				'user_login' => 'data1',
			]
		);

		$actual = find_one_user(
			[
				'login' => 'data1',
			]
		);

		$this->assertInstanceOf( \WP_User::class, $actual );
		$this->assertSame( $user_id, $actual->ID );
	}

	/**
	 * Test that `find_one_site()` finds an expected \WP_Site object.
	 */
	public function test_find_one_site_finds_site() {
		if ( ! is_multisite() ) {
			$this->markTestSkipped( __METHOD__ . ' requires Multisite' );
		}

		// WordPress < 5.0 doesn't ensure paths are wrapped in slashes.
		$path = '/data1/';

		$blog_id = self::factory()->blog->create(
			[
				'path' => $path,
			]
		);

		$actual = find_one_site(
			[
				'path__in' => [ $path, '/data2/' ],
			]
		);

		$this->assertInstanceOf( \WP_Site::class, $actual );
		$this->assertSame( $blog_id, (int) $actual->blog_id );
	}
}
