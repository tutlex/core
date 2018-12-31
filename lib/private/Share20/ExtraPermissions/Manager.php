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

use OCP\Share\ExtraPermissions\IManager;

/**
 * This class is the communication hub for all sharing related operations.
 */
class Manager implements IManager {

	/**
	 * @var array
	 */
	private $registeredExtraPermissionsMap;

	/**
	 * Manager constructor.
	 *
	 */
	public function __construct() {
		$this->registeredExtraPermissionsMap = array();
	}

	public function registerExtraPermission($app, $permission, $permissionLabel, $permissionNotification) {
		$this->registeredExtraPermissionsMap[$app][$permission]['label'] = $permissionLabel;
		$this->registeredExtraPermissionsMap[$app][$permission]['notification'] = $permissionNotification;
	}

	public function getExtraPermissionApps() {
		return \array_keys($this->registeredExtraPermissionsMap);
	}

	public function getExtraPermissionKeys($app) {
		if (array_key_exists($app, $this->registeredExtraPermissionsMap)) {
			return \array_keys($this->registeredExtraPermissionsMap[$app]);
		}
		return [];
	}

	public function getExtraPermissionLabel($app, $permission) {
		if (array_key_exists($app, $this->registeredExtraPermissionsMap) &&
			array_key_exists($permission, $this->registeredExtraPermissionsMap[$app])) {
			return $this->registeredExtraPermissionsMap[$app][$permission]['label'];
		}
		return null;
	}

	public function getExtraPermissionNotification($app, $permission) {
		if (array_key_exists($app, $this->registeredExtraPermissionsMap) &&
			array_key_exists($permission, $this->registeredExtraPermissionsMap[$app])) {
			return $this->registeredExtraPermissionsMap[$app][$permission]['notification'];
		}
		return null;
	}
}
