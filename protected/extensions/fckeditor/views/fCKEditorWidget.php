<?php
/*
 * Created on 01.01.2009
 *
 * Copyright: Christian Kütbach
 *
 * GNU LESSER GENERAL PUBLIC LICENSE
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU lesser General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * Requirements:
 * The FCK-Editor have to be installed and configured. The Editor itself is
 * not included to this extension.
 *
 * This extension have to be installed into:
 * <Yii-Application>/protected/extensions/fckeditor
 *
 * Usage:
 * see-> readme.txt
 */

require_once($fckeditor);

if (!empty($model) && !empty($attribute))
{
	$oFCKeditor = new FCKeditor(get_class($model).'['.$attribute.']');
	$oFCKeditor->Value = $model->$attribute;
}
elseif (!empty($name))
{
    $oFCKeditor = new FCKeditor($name);
    $oFCKeditor->Value = isset($value) ? $value : null;
}
$oFCKeditor->BasePath = $fckBasePath;
$oFCKeditor->Width  = $width;
$oFCKeditor->Height = $height;
$oFCKeditor->ToolbarSet = $toolbarSet;
if (isset($config) && is_array($config))
{
	foreach ($config as $key=>$value)
	{
		$oFCKeditor->Config[$key] = $value;
	}
}
$oFCKeditor->Create();
?>
