<?php 
    namespace App\Controller;
    use App\Controller\AppController;
    use Cake\ORM\TableRegistry;
    use Cake\Datasource\ConnectionManager;

    class MembersController extends AppController{
        // Actions
        public function index(){
            $members = TableRegistry::get('members');
            $membersHeaders = $members->schema()->columns();
            $membersQuery = $members->find('all');
            
            $societies = TableRegistry::get('society_list');
            $societiesQuery = $societies->find('list')->select('id');
            $this->set('societies', $societiesQuery);

            $homes = TableRegistry::get('homes');
            $homesQuery = $homes->find('list')->select('id');
            $this->set('homes', $homesQuery);
            
            $this->set('members', $membersQuery);
            $this->set('membersHeaders', $membersHeaders);


            if($this->request->is('post')){
                $member_name = $this->request->data('member_name');
                $society_id = $this->request->data('society_id');
                $house_id = $this->request->data('house_id');
                $is_owner = $this->request->data('is_owner');
                $on_committe = $this->request->data('on_committe');
                $members_table = TableRegistry::get('members');
                $member = $members_table->newEntity();
                $member->name = $member_name;
                $member->societyId = (int)$society_id;
                $member->houseId = (int)$house_id;
                $member->isOwner = (int)$is_owner;
                $member->onCommitte = (int)$on_committe;
                echo $member;
                if($members_table->save($member))
                $this->redirect(array('action' => 'index'));
            }
        }   
        public function delete($id = null) {
            $members = TableRegistry::get('members');

            $member = $members->get($id); 
            if ($members->delete($member)) {
                echo "Member deleted successfully.";
                $this->setAction('index');
            } else {
                echo "Unable to process your request, try again.";
                $this->setAction('index');
            }
            return $this->redirect(array('action' => 'index'));
        }
        public function update($id) {
            if ($this->request->is('post')){
                $member_name = $this->request->data('member_name');
                $society_id = $this->request->data('society_id');
                $house_id = $this->request->data('house_id');
                $is_owner = $this->request->data('is_owner');
                $on_committe = $this->request->data('on_committe');

                $members_table = TableRegistry::get('members');
                
                $member = $members_table->get($id);
                $member->name = $member_name;
                $member->societyId = (int)$society_id;
                $member->houseId = (int)$house_id;
                $member->isOwner = (int)$is_owner;
                $member->onCommitte = (int)$on_committe;
             
                if ($members_table->save($member))
                echo "Member is udpated";
                $this->redirect(array(
                    'controller'=>'Members',  
                    'action' => 'update/'.$id)
                     );
            } else {
                $members = TableRegistry::get('members');

                $societies = TableRegistry::get('society_list');
                $societiesQuery = $societies->find('list')->select('id');
                $this->set('societies', $societiesQuery);

                $homes = TableRegistry::get('homes');
                $homesQuery = $homes->find('list')->select('id');
                $this->set('units', $homesQuery);

                $types = TableRegistry::get('hometypes');
                $typesQuery = $types->find('list')->select('id');
                $this->set('types', $typesQuery);
                
                $member = $members->get($id);
                $this->set('id', $id);
                $this->set('member', $member);
            }
        } 
    }
?>