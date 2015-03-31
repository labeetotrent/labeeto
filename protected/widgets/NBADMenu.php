<?php
Yii::import('zii.widgets.CMenu');

class NBADMenu extends CMenu
{
	protected function renderMenuRecursive($items,$sub=false)
	{
		error_reporting(0);
        $count=0;
		if($sub==false)
			echo '<li class="collapseMenu"><a href="#"><i class="icon-double-angle-left"></i>hide menu<i class="icon-double-angle-right deCollapse"></i></a></li>
			<li class="divider-vertical firstDivider"></li>';

		foreach($items as $item)
		{
			$countSub=0;
			if(isset($item['items']) && count($item['items']))
				$countSub =count($item['items']);

			$count++;
			$options=isset($item['itemOptions']) ? $item['itemOptions'] : array();
			$class=array();
			if($item['active'] && $this->activeCssClass!='')
				$class[]=$this->activeCssClass;
			if($count===1 && $this->firstItemCssClass!='')
				$class[]=$this->firstItemCssClass;
			if($count===$n && $this->lastItemCssClass!='')
				$class[]=$this->lastItemCssClass;
			if($class!==array())
			{
				if(empty($options['class']))
					$options['class']=implode(' ',$class);
				else
					$options['class'].=' '.implode(' ',$class);
			}

			echo CHtml::openTag('li', $options);
			
			$itemlabel = '' ;
			if($sub==false){
				$itemlabel = '<i';
				if(isset($item['icon'])) $itemlabel .= ' class="' . $item['icon'] . '"';
				$itemlabel .= '></i>';
			}				
			$itemlabel .= ' '.$item['label'] ;

			if(isset($item['url']))
			{
				//@Minh:				
				$label=$this->linkLabelWrapper===null ? $itemlabel : '<'.$this->linkLabelWrapper.'>'.$itemlabel.'</'.$this->linkLabelWrapper.'>';
				$menu=CHtml::link($label,$item['url'],isset($item['linkOptions']) ? $item['linkOptions'] : array());
			}
			else{

				if($countSub>0 && $sub==false)
					$itemlabel .= '<span class="label label-pressed">'.$countSub.'</span>';
				
				$label=$this->linkLabelWrapper===null ? $itemlabel : '<'.$this->linkLabelWrapper.'>'.$itemlabel.'</'.$this->linkLabelWrapper.'>';
				$menu=CHtml::link($label,'#',array('class'=>'dropdown-toggle','data-toggle'=>'dropdown'));

			}
			
			if(isset($this->itemTemplate) || isset($item['template']))
			{
				$template=isset($item['template']) ? $item['template'] : $this->itemTemplate;
				echo strtr($template,array('{menu}'=>$menu));
			}
			else
				echo $menu;
			
			if(isset($item['items']) && count($item['items']))
			{
				$this->submenuHtmlOptions['class'] = 'dropdown-menu';
				echo "\n".CHtml::openTag('ul',$this->submenuHtmlOptions)."\n";
				$this->renderMenuRecursive($item['items'],true);
				echo CHtml::closeTag('ul')."\n";
			}
			echo CHtml::closeTag('li')."\n";
			if($sub==false){
				echo "\n".CHtml::openTag('li',array('class'=>'divider-vertical'))."\n";
				echo CHtml::closeTag('li')."\n";
			}
		}
	}
	
	protected function isItemActive($item,$route)
	{
		if(isset($item['url']) && is_array($item['url']) && !strcasecmp(trim('admin/'.$item['url'][0],'/'),$route))
		{
			if(count($item['url'])>1)
			{
				foreach(array_splice($item['url'],1) as $name=>$value)
				{
					if(!isset($_GET[$name]) || $_GET[$name]!='admin/'.$value)
						return false;
				}
			}
			return true;
		}
		return false;
	}
}