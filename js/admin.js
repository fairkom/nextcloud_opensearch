/*
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

/** global: OCA */
/** global: opensearch_elements */
/** global: opensearch_settings */


$(document).ready(function () {


	/**
	 * @constructs OpenSearchAdmin
	 */
	var OpenSearchAdmin = function () {
		$.extend(OpenSearchAdmin.prototype, opensearch_elements);
		$.extend(OpenSearchAdmin.prototype, opensearch_settings);

		opensearch_elements.init();
		opensearch_settings.refreshSettingPage();
	};

	OCA.FullTextSearchAdmin.openSearch = OpenSearchAdmin;
	OCA.FullTextSearchAdmin.openSearch.settings = new OpenSearchAdmin();

});
