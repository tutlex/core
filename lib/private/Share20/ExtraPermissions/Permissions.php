<?php
/**
 * @author Piotr Mrowczynski <piotr@owncloud.com>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OC\Share20\ExtraPermissions;

class Permissions {

	/** @var array */
	private $permissions;

	public function __construct() {
		$this->permissions = json_decode('{}', true);
	}

	public function addExtraPermission($app, $permission) {
		return $this->permissions[$app][$permission] = true;
	}

	public function hasExtraPermission($app, $permission) {
		return array_key_exists($app, $this->permissions) &&
			array_key_exists($permission, $this->permissions[$app]);
	}

	public function serialize() {
		return json_encode($this->permissions);
	}

	public function load($extraPermissions) {
		$this->permissions = json_decode($extraPermissions, true);
	}
}
