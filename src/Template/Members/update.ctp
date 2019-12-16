<div class="edit-form">
<?php
    echo $this->Form->create("Members",array('url'=>'/members/update/'.$id));
    echo $this->Form->input('ID:',['value'=>$id, 'disabled'=>'true']);
    
    echo $this->Form->input('society_id', array('type'=>'select', 'options' => $societies, 'value'=>$member->societyId));
    echo $this->Form->input('house_id', array('type'=>'select', 'options' => $units, 'value'=>$member->houseId));
    echo $this->Form->input('member_name', ['value'=>$member->name]);
    echo $this->Form->input('isOwner', array('options'=> array('0'=>'No', '1'=>'Yes',), 'value'=>$member->isOwner));
    echo $this->Form->input('onCommitte', array('options'=> array('0'=>'No', '1'=>'Yes',), 'value'=>$member->onCommitte ));
    
    echo $this->Form->button('Submit');
    echo $this->Form->end();
?>
</div>
<div class="edit-actions">
	<!-- <h4><?php echo __('Actions:'); ?></h4> -->
    <?php echo $this->Form->postLink(__('Delete'), 
        ['action' => 'delete', $this->Form->value('member.id')],
        ['confirm' => 'Are you sure you wish to delete this member?', 'class' => 'btn btn-danger']); ?>
	<?php echo $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
</div>

