<?php

/*
 * DateTimeI18NBehavior
 * Automatically converts date and datetime fields to I18N format
 * 
 * Author: Ricardo Grana <rickgrana@yahoo.com.br>, <ricardo.grana@pmm.am.gov.br>
 * Version: 1.1
 * Requires: Yii 1.0.9 version 
 */

class DateTimeI18NBehavior  extends CActiveRecordBehavior
{
	public $dateOutcomeFormat = 'Y-m-d';
	public $dateTimeOutcomeFormat = 'Y-m-d H:i:s';

	public $dateIncomeFormat = 'yyyy-MM-dd';
	public $dateTimeIncomeFormat = 'yyyy-MM-dd hh:mm:ss';

	public function beforeSave($event){


	}
    public function afterSave($event){
        if (defined('IS_CRON')) return true;


        return true;
    }
    public function afterDelete($event){
        if(defined('IS_CRON')) return true;


        return true;
    }

	public function afterFind($event){
        if (defined('IS_CRON')) return true;


		return true;
	}
}