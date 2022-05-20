# Find One

The `find_one()` family of functions are wrappers for common WordPress retrieval functions like `get_posts()` or `get_terms()` that reduce the return value of those retrieval functions into a single result.

For example, to find one item in a `person` post type:

```php
<?php

use function Alley\WP\find_one_post;

// Returns a \WP_Post or null.
$person = find_one_post( 
    [
        'meta_key'   => 'twitter',
        'meta_value' => '@potatomaster',
        'post_type'  => 'person',
    ] 
);
```

which is equivalent to:

```php
<?php

$person = \get_posts( 
    [
        'meta_key'         => 'twitter',
        'meta_value'       => '@potatomaster',
        'post_type'        => 'person',
        'posts_per_page'   => 1,
        'suppress_filters' => false,
    ] 
);

if ( ! empty( $person[0] ) ) {
	$person = $person[0];
}
```

Taxonomy terms can be searched for similarly:

```php
<?php

use function Alley\WP\find_one_term;

// Returns a \WP_Term or null.
$category = find_one_term( 
    [
        'slug'     => 'potatomaster',
        'taxonomy' => 'category',
    ] 
);
```

which is equivalent to:

```php
<?php

$category = \get_terms( 
    [
        'number'   => 1,
        'slug'     => 'potatomaster',
        'taxonomy' => 'category',
    ] 
);

if ( ! empty( $category[0] ) ) {
	$category = $category[0];
}
```

The underlying `find_result()` function accepts a `$class` of object to search for and the array of query results:

```php
<?php

use function Alley\WP\find_result;

// Returns a \WP_Network or null.
$network = find_result( \WP_Network::class, \get_networks() );
```

Helper functions are available for all core WordPress data types that have meta tables:

* `find_one_comment()`
* `find_one_post()`
* `find_one_site()`
* `find_one_term()`
* `find_one_user()`
