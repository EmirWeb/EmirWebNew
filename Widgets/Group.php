<?php
DomManager::addCss('CSS/Widgets/Group.css');
class Group {
	private static $TITLE = "Title";
	private static $ROW = "Row";
	private static $GROUP = "Group";
	private static $LABEL = "Label";
	private static $TEXT = "Text";
	
	static function getGroups($groups){
		if (empty($groups)){
			return;
		}

		$ret = '';
		
		foreach ($groups as $key => $group){			
			if (isset($group[self::$TITLE])){
				$title = $group[self::$TITLE];
			}

			if (isset($group[self::$ROW])){
				$rows = $group[self::$ROW];
			}

			$groupToEcho = '';
				
			if (!empty($title)){
				$groupToEcho = '<div class="' . self::$TITLE . '">' . $title . '</div>';
			}

			if (!empty($rows)){
				foreach ($rows as $key => $row){
					if (isset($row[self::$LABEL])){
						$label = $row[self::$LABEL];
					}
					if (isset($row[self::$TEXT])){
						$text = $row[self::$TEXT];
					}
					$rowToEcho = '';
						
					if (!empty($label)){
						$rowToEcho = '<div class="' . self::$LABEL . '">' . $label . '</div>';
					}

					if (!empty($text)){
						$rowToEcho .= $text;
					}

					if (!empty($rowToEcho)){
						$groupToEcho .= '<div class="' . self::$ROW . '">' . $rowToEcho . '</div>';
					}
				}
			}
			if (!empty($groupToEcho)){
				$ret.= '<div class="' . self::$GROUP . '">' . $groupToEcho . '</div>' . "\n";
			}

		}
		return $ret;
	}
}
?>
