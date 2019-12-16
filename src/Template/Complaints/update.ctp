<div class="edit-form">
<?php
    echo $this->Form->create("Complaints",array('url'=>'/complaints/update/'.$id));
    echo $this->Form->input('ID:',['value'=>$id, 'disabled'=>'true']);
    
    echo $this->Form->input('user', ['type'=>'select', 'options' => $members, 'value'=>$complaint->user]);
    echo $this->Form->input('description', ['value'=>$complaint->description]);
    echo $this->Form->input('title', ['value'=>$complaint->title]);
    echo $this->Form->input('status',  ['options'=> array('0'=>'Fresh', '1'=>'In progress', '2'=>'Resolved'), 'value'=>$complaint->status]);
    
    echo $this->Form->button('Submit');
    echo $this->Form->end();
?>
</div>
<div class="edit-actions">
	<!-- <h4><?php echo __('Actions:'); ?></h4> -->
    <?php echo $this->Form->postLink(__('Delete'), 
        ['action' => 'delete', $this->Form->value('complaint.id')],
        ['confirm' => 'Are you sure you wish to delete this member?', 'class' => 'btn btn-danger']); ?>
	<?php echo $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
</div>

