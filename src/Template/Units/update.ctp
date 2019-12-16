<div class="edit-form">
<?php
    echo $this->Form->create("Units",array('url'=>'/units/update/'.$id));
    echo $this->Form->input('ID:',['value'=>$id, 'disabled'=>'true']);
    
    echo $this->Form->input('society_id', array('type'=>'select', 'options' => $societies, 'value'=>$unit->society));
    echo $this->Form->input('type', array('type'=>'select', 'options' => $types, 'value'=>$unit->type));
    echo $this->Form->input('rented', ['options'=> array('1'=>'Yes', '0'=>'No', 'value'=>$unit->rented)]);
    echo $this->Form->input('parking', array('type'=>'number', 'value'=>$unit->parking));
    echo $this->Form->input('size', array('type'=>'number', 'value'=>$unit->size ));
    
    echo $this->Form->button('Submit');
    echo $this->Form->end();
?>
</div>
<div class="edit-actions">
	<!-- <h4><?php echo __('Actions:'); ?></h4> -->
    <?php echo $this->Form->postLink(__('Delete'), 
        ['action' => 'delete', $this->Form->value('unit.id')],
        ['confirm' => 'Are you sure you wish to delete this member?', 'class' => 'btn btn-danger']); ?>
	<?php echo $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-primary']); ?>
</div>

