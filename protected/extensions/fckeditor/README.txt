Copyright: Christian Kütbach


GNU LESSER GENERAL PUBLIC LICENSE

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU lesser General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU lesser General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

Requirements:
The FCK-Editor have to be installed and configured. The Editor itself is
not included to this extension.

This extension have to be installed into:
{{{
<Yii-Application>/protected/extensions/fckeditor
}}}
Usage:
{{{
<?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
	"model"=>$pages,				# Data-Model
	"attribute"=>'content',			# Attribute in the Data-Model
	"height"=>'400px',
	"width"=>'100%',
	"toolbarSet"=>'Basic', 			# EXISTING(!) Toolbar (see: fckeditor.js)
	"fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
									# Path to fckeditor.php
	"fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
									# Relative Path to the Editor (from Web-Root)
	"config" => array("EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
									# Additional Parameters
) ); ?>
}}}
