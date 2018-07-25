<?php

/*
    Copyright (C) 2018 Thomas Schneider <thomas.schneider.pub@gmail.com>

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

*/

namespace TS\VisibleChildren;

use XF\AddOn\AbstractSetup;
use XF\Db\Schema\Alter;

class Setup extends AbstractSetup
{

	public function install(array $stepParams = []) {
		
		$this->schemaManager()->alterTable('xf_forum', function(Alter $table) {
                $table->addColumn('ts_show_children', 'tinyint')->setDefault(0);
            }
		);
		
	}
	
	public function uninstall(array $stepParams = []) {
		
		$this->schemaManager()->alterTable('xf_forum', function(Alter $table) {
                $table->dropColumns(['ts_show_children']);
            }
        );
		
	}
}