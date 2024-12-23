<?php

declare(strict_types=1);

/**
 * FullTextSearch_OpenSearch - Use OpenSearch to index the content of your nextcloud
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Maxence Lange <maxence@artificial-owl.com>
 * @copyright 2018
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\FullTextSearch_OpenSearch\Controller;

use Exception;
use OCA\FullTextSearch_OpenSearch\AppInfo\Application;
use OCA\FullTextSearch_OpenSearch\Service\ConfigService;
use OCP\AppFramework\Controller;
use OCP\AppFramework\Http;
use OCP\AppFramework\Http\DataResponse;
use OCP\IRequest;

/**
 * Class SettingsController
 *
 * @package OCA\FullTextSearch_OpenSearch\Controller
 */
class SettingsController extends Controller {

    /**
     * Constructor method for the class.
     *
     * @param IRequest $request The request object handling HTTP requests.
     * @param ConfigService $configService The configuration service for managing application settings.
     * @return void
     */
    public function __construct(
        /**
         *
         */ IRequest              $request,
            private ConfigService $configService,
    )
    {
        parent::__construct(Application::APP_NAME, $request);
    }

    /**
     * Retrieves administrative settings for the application.
     *
     * @return DataResponse The response object containing configuration data and an HTTP status code.
     */
	final public function getSettingsAdmin(): DataResponse {
		$data = $this->configService->getConfig();

		return new DataResponse($data, Http::STATUS_OK);
	}

    /**
     * Updates the settings for the administrator and saves the provided configuration data.
     *
     * @param array $data An associative array containing configuration data to be set.
     * @return DataResponse Returns a DataResponse object containing the updated administrator settings.
     */
	final public function setSettingsAdmin(array $data): DataResponse {

        $errors = $this->configService->checkConfig($data);

        if (empty($errors)) {
            $this->configService->setConfig($data);
            return $this->getSettingsAdmin();
        }else{
            return new DataResponse($errors, Http::STATUS_BAD_REQUEST);
        }
	}
}
