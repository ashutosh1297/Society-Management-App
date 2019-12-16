<div class="edit-form">
<?php
    echo $this->Form->create("Society",array('url'=>'/societies/update/'.$id));
    echo $this->Form->input('ID:',['value'=>$id, 'disabled'=>'true']);
    
    echo $this->Form->input('name', ['value'=>$society->name]);
    echo $this->Form->input('society_address', ['value'=>$society->address]);
    echo $this->Form->input('chairman_name', ['value'=>$society->chairman]);
    echo $this->Form->input('society_contact', ['type'=>'number', 'value'=>$society->phone]);
    
    echo $this->Form->button('Update');
    echo $this->Form->end();
?>
</div>
<div class="edit-actions">
	<!-- <h4><?php echo __('Actions:'); ?></h4> -->
    <?php echo $this->Form->postLink(__('Delete'), 
        ['action' => 'delete', $this->Form->value('society.id')],
        ['confirm' => 'Are you sure you wish to delete this member?', 'class' => 'btn btn-danger']); ?>
	<?php echo $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
</div>

