<?php

/*
    Copyright (C) 2018 Zeth

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

namespace TS\VisibleChildren\XF\Repository;

class Thread extends XFCP_Thread {
	
	public function findThreadsForForumView(\XF\Entity\Forum $forum, array $limits = [])
	{
		
		/** @var \XF\Finder\Thread $finder */
		$finder = $this->finder('XF:Thread');
		
		if($forum->ts_show_children)
			$finder->inChildren($forum, $limits);
		else
			$finder->inForum($forum, $limits);
		
		$finder->forFullView();

		return $finder;
		
	}
	
}