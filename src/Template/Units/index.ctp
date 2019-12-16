<div class="container-fluid wrapper-div">
    <table class="table table-hover">
        <thead>
            <tr>
            <?php
                foreach ($unitsHeaders as $row):  
                echo "<th scope='col'>".$row."</th>";
                endforeach; 
                echo "<th scope='col'>Actions</th>";

            ?>
            </tr>
        </thead>
        <tbody>
             <?php if($units->count() !== 0):
                foreach ($units as $row):  
                    echo "<tr>";
                    foreach ($unitsHeaders as $column):  
                    echo "<td>".$row->$column."</td>";
                    endforeach; 
                    echo "<td class='actions'>";
			        echo $this->Html->link(
                        'Edit',
                        ['controller' => 'Units', 'action' => 'update', $row->id],
                    );
                    echo ' | ';
			        echo $this->Html->link(
                        'Delete',
                        ['controller' => 'Units', 'action' => 'delete', $row->id],
                        ['confirm' => 'Are you sure you wish to delete this member?'],
                    );
		            echo "</td>";
                endforeach; 
                else:   
                    echo "<tr class='table-danger'><td text-align='center' colspan=".count($unitsHeaders).">No data found!<td></tr>";
                endif;?>
        </tbody>
    </table>
</div>

<div class="container wrapper-div">
<h3> Add new unit: </h3>
    <?php
    echo $this->Form->create("Units",array('url'=>'/Units'));
    echo $this->Form->input('society_id', array('type'=>'select', 'options' => $societies));
    echo $this->Form->input('type', array('type'=>'select', 'options' => $types));
    echo $this->Form->input('rented', ['options'=> array('1'=>'Yes', '0'=>'No')]);
    echo $this->Form->input('parking', array('type'=>'number'));
    echo $this->Form->input('size', array('type'=>'number'));
    echo $this->Form->button('Submit');
    echo $this->Form->end();
    ?> 
</div>