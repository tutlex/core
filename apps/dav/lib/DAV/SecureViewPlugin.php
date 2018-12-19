<?php
/**
 * @author Piotr Mrowczynski piotr@owncloud.com
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

namespace OCA\DAV\DAV;

use OCP\ILogger;
use Sabre\DAV\Exception\Forbidden;
use Sabre\DAV\Server;
use Sabre\DAV\ServerPlugin;
use Sabre\HTTP\RequestInterface;
use Sabre\HTTP\ResponseInterface;

/**
 * Sabre plugin for the the file secure-view:
 */
class SecureViewPlugin extends ServerPlugin {
	const NS_OWNCLOUD = 'http://owncloud.org/ns';

	/** @var \Sabre\DAV\Server $server */
	private $server;

	/** @var \OCP\ILogger */
	private $logger;

	/**
	 * SecureViewPlugin plugin
	 *
	 * @param ILogger $logger
	 */
	public function __construct(ILogger $logger) {
		$this->logger = $logger;
	}

	/**
	 * This initializes the plugin.
	 *
	 * This function is called by Sabre\DAV\Server, after
	 * addPlugin is called.
	 *
	 * This method should set up the required event subscriptions.
	 *
	 * @param Server $server
	 * @return void
	 */
	public function initialize(Server $server) {
		$this->server = $server;
		//priority 90 to make sure the plugin is called before
		//Sabre\DAV\CorePlugin::httpGet
		$this->server->on('method:GET', [$this, 'checkSecureView'], 90);
	}

	/**
	 *
	 * @param RequestInterface $request request object
	 * @param ResponseInterface $response response object
	 * @throws \Sabre\DAV\Exception\Forbidden
	 * @return boolean
	 */
	public function checkSecureView(
		RequestInterface $request, ResponseInterface $response
	) {
		$path = $request->getPath();
		$this->logger->warning('checkSecureView in {path}', [ 'app' => 'richdocuments', 'path' => $path ]);

		$response->setHeader('Content-Length', '0');
		$response->setStatus(204);
		return false;
	}
}
