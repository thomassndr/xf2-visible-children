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

namespace TS\VisibleChildren\XF\Admin\Controller;

use XF\Mvc\FormAction;
use XF\Mvc\ParameterBag;

class Forum extends XFCP_Forum {
		
	protected function saveTypeData(FormAction $form, \XF\Entity\Node $node, \XF\Entity\AbstractNode $data) {
		
		parent::saveTypeData($form, $node, $data);
		$show_children = $this->filter(["ts_show_children" => "bool"]);
		$data->bulkSet($show_children);
		
	}
	
}