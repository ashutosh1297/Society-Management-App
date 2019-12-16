<div class="container-fluid wrapper-div">
    <table class="table table-hover">
        <thead>
            <tr>
            <?php
                foreach ($membersHeaders as $row):  
                echo "<th scope='col'>".$row."</th>";
                endforeach;
                echo "<th scope='col'>Actions</th>";
            ?>
            </tr>
        </thead>
        <tbody>
             <?php if($members->count() !== 0):
                foreach ($members as $row):  
                    echo "<tr>";
                    foreach ($membersHeaders as $column):  
                    echo "<td>".$row->$column."</td>";
                    endforeach; 
                    echo "<td class='actions'>";
			        echo $this->Html->link(
                        'Edit',
                        ['controller' => 'Members', 'action' => 'update', $row->id],
                    );
                    echo ' | ';
			        echo $this->Html->link(
                        'Delete',
                        ['controller' => 'Members', 'action' => 'delete', $row->id],
                        ['confirm' => 'Are you sure you wish to delete this member?'],
                    );
		            echo "</td>";
                endforeach; 
                else:
                    // TODO: extend headers to one more col i.e. Actions on all pages and center text
                    echo "<tr class='table-danger'><td text-align='center' colspan=".count($membersHeaders).">No data found!<td></tr>";
                endif;?>
        </tbody>
    </table>
</div>

<div class="container wrapper-div">
    <h3> Add new member: </h3>
    <?php
    echo $this->Form->create("Members",['url'=>'/Members']);
    echo $this->Form->input('member_name', ['placeholder'=>"Enter member's name"]);
    echo $this->Form->input('society_id', array('type'=>'select', 'options' => $societies,));
    echo $this->Form->control('house_id', ['options' => $homes]);
    echo $this->Form->input('is_owner', ['options'=> array('1'=>'Yes', '0'=>'No')]);
    echo $this->Form->input('on_committe', ['options'=> array('1'=>'Yes', '0'=>'No')]);

    echo $this->Form->button('Submit');
    echo $this->Form->end();
    ?> 
</div>