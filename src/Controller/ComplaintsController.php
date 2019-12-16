<?php 
    namespace App\Controller;
    use App\Controller\AppController;
    use Cake\ORM\TableRegistry;
    use Cake\Datasource\ConnectionManager;

    class ComplaintsController extends AppController{
        // Actions
        public function index(){
            $complaint = TableRegistry::get('complaints');
            $complaintsHeaders = $complaint->schema()->columns();
            $complaintQuery = $complaint->find('all');
            $this->set('complaints', $complaintQuery);
            $this->set('complaintsHeaders', $complaintsHeaders);

            $members = TableRegistry::get('members');
            $membersQuery = $members->find('list')->select('id');
            $this->set('members', $membersQuery);

            if($this->request->is('post')){
                $user = $this->request->data('user');
                $title = $this->request->data('title');
                $description = $this->request->data('description');
                $status = 0;
                $complaints_table = TableRegistry::get('complaints');
                $complaint = $complaints_table->newEntity();
                $complaint->user = $user;
                $complaint->description = $description;
                $complaint->title = $title;
                $complaint->status = $status;
                if($complaints_table->save($complaint))
                $this->redirect(array('action' => 'index'));
            }
        }   

        public function delete($id = null) {
            $complaints = TableRegistry::get('complaints');

            $complaint = $complaints->get($id); 
            if ($complaints->delete($complaint)) {
                echo "Complaint deleted successfully.";
                $this->setAction('index');
            } else {
                echo "Unable to process your request, try again.";
                $this->setAction('index');
            }
            return $this->redirect(array('action' => 'index'));
        }
        public function update($id = null) {
            if($this->request->is('post')){
                $user = $this->request->data('user');
                $title = $this->request->data('title');
                $description = $this->request->data('description');
                $status = $this->request->data('status');

                $complaints = TableRegistry::get('complaints');
                
                $complaint = $complaints->get($id);
                $complaint->user = $user;
                $complaint->description = $description;
                $complaint->title = $title;
                $complaint->status = $status;
                if($complaints->save($complaint))
                echo "Member is udpated";
                $this->redirect(array(
                    'controller'=>'Complaints',  
                    'action' => 'update/'.$id)
                     );
            } else {
                $complaints = TableRegistry::get('complaints');

                $members = TableRegistry::get('members');
                $membersQuery = $members->find('list')->select('id');
                $this->set('members', $membersQuery);
                
                $complaint = $complaints->get($id);
                $this->set('id', $id);
                $this->set('complaint', $complaint);
            }
        } 
    }
?>