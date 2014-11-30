<div class="col-md-12 info-block" question-id="<?=$customQuestion->id;?>">
    <div class="col-md-12 name">
        <div class="col-md-10">
            <?=$customQuestion->question;?>
        </div>
        <div class="col-md-2">
            <i class="fa fa-pencil-square-o pull-right edit-info-block"></i>
        </div>
    </div>
    <div class="col-md-12 value view">
        <?=$customQuestion->answer->answer;?>
    </div>
    <div class="col-md-12 value edit hidden-element">
        <textarea class="value-textarea"><?=$customQuestion->answer->answer;?></textarea>
    </div>
    <div class="col-md-12 edit-buttons hidden-element">
        <div class="col-md-6">
            <button type="submit" class="btn btn-default btn-sm btn-save-st col-md-12 custom-save">Save</button>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-default btn-sm btn-cancel-st col-md-12">Cancel</button>
        </div>
    </div>
</div>