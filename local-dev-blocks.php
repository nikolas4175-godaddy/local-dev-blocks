<?php

/**
 * Plugin Name:       Local Dev Blocks
 * Description:       A simple plugin for building multiple WP blocks in a dev environment
 * Requires at least: 6.5
 * Requires PHP:      7.4
 * Version:           0.1.0
 * Author:            Nik McLaughlin
 * Plugin ID:         did:plc:abc123
 * GitHub Plugin URI: nikolas4175-godaddy/local-dev-blocks
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       local-dev-blocks
 */

/**
 * Automatically registers all blocks contained in the /blocks/ sub-directory.
 */
add_action('init', function () {

	// This is where blocks are compiled to by the `npm run build` command
	foreach (glob(__DIR__ . '/build/*') as $filename) {

		// use `_` prefix to exclude blocks from being registered
		if ('_' !== substr(basename($filename), 0, 1)) {
			register_block_type_from_metadata($filename);
		}
	}
});
