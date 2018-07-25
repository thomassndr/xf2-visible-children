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

namespace TS\VisibleChildren\XF\Finder;

class Thread extends XFCP_Thread {
	
	public function inChildren(\XF\Entity\Forum $forum, array $limits = []) {
		
		$limits = array_replace([
			'visibility' => true,
			'allowOwnPending' => false,
		], $limits);
		
		/** @var \XF\Repository\Node $nodeRepo */
		$nodeRepo = $this->em->getRepository('XF:Node');
		$children = $nodeRepo->findChildren($forum->Node)->fetch();
		$childrenIds = [$forum->Node->node_id];
		
		if(count($children) > 0)
			foreach($children as $child)
				$childrenIds[] = $child->node_id;
				
		$this->whereOr([["node_id", $childrenIds]]);
		$this->applyForumDefaultOrder($forum);

		if ($limits['visibility'])
		{
			$this->applyVisibilityChecksInForum($forum, $limits['allowOwnPending']);
		}		
		
		return $this;
		
	}
	
}