
<div class="container-fluid wrapper-div">
    <table class="table table-hover">
        <thead>
            <tr>
            <?php
                // TODO: Header names are currently fetched and rendered as is, convert camel case to sentence case before render
                foreach ($complaintsHeaders as $row):  
                echo "<th scope='col'>".$row."</th>";
                endforeach; 
                echo "<th scope='col'>Actions</th>";
            ?>
            </tr>
        </thead>
        <tbody>
             <?php if($complaints->count() !== 0):
                foreach ($complaints as $row):  
                    echo "<tr>";
                    foreach ($complaintsHeaders as $column):  
                    echo "<td>".$row->$column."</td>";
                    endforeach; 
                    echo "<td class='actions'>";
			        echo $this->Html->link(
                        'Edit',
                        ['controller' => 'Complaints', 'action' => 'update', $row->id],
                    );
                    echo ' | ';
			        echo $this->Html->link(
                        'Delete',
                        ['controller' => 'Complaints', 'action' => 'delete', $row->id],
                        ['confirm' => 'Are you sure you wish to delete this complaint?'],
                    );
		            echo "</td>";
                endforeach; 
                else:   
                    echo "<tr class='table-danger'><td text-align='center' colspan=".count($complaintsHeaders).">No data found!<td></tr>";
                endif;?>
        </tbody>
    </table>
</div>

<div class="container wrapper-div">
    <h3> Add new complaint: </h3>
    <?php
    echo $this->Form->create("Users",array('url'=>'/Complaints'));
    echo $this->Form->input('user', ['options'=>$members]);
    echo $this->Form->input('title');
    echo $this->Form->input('description');
    echo $this->Form->button('Submit');
    echo $this->Form->end();
    ?> 
</div>