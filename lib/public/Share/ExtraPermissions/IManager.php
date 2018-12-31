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
namespace OCP\Share\ExtraPermissions;

/**
 * Interface IManager
 *
 * @package OCP\Share\ExtraPermissions
 * @since 11.0.0
 */
interface IManager {

	/**
	 * @param $app
	 * @param $permission
	 * @param $permissionLabel
	 * @param $permissionNotification
	 * @since 11.0.0
	 */
	public function registerExtraPermission($app, $permission, $permissionLabel, $permissionNotification);

	/**
	 * @return string[]
	 * @since 11.0.0
	 */
	public function getExtraPermissionApps();

	/**
	 * @param string $app
	 * @return string[]
	 * @since 11.0.0
	 */
	public function getExtraPermissionKeys($app);

	/**
	 * @param string $app
	 * @param string $permission
	 * @return string
	 * @since 11.0.0
	 */
	public function getExtraPermissionLabel($app, $permission);

	/**
	 * @param string $app
	 * @param string $permission
	 * @return string
	 * @since 11.0.0
	 */
	public function getExtraPermissionNotification($app, $permission);

}
