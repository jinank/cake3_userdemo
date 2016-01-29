<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Controller\Component\RequestHandlerComponent;
/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class UsersController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

	public function beforeFilter(Event $event){
		$this->Auth->allow(['index','view']);
	}

    /**
     * Dashboard
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function dashboard(){
        $this->set('title','Title');
    } 
    /**
     * Displays a List of Users
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function index(){
        $this->set('title','Title');
        $users = $this->Users->find('all');
        $this->set(compact('users'));

    }
    /**
     * ADD USER
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function add(){
    	$this->set('title','Title');
        if ($this->request->is('post')){
            $data = $this->request->data;

            $users = TableRegistry::get('Users');
            $result = $users->newEntity($data);
            if($users->save($result)){
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }else{
                $this->Flash->error(__('Unable to add the user.'));
                return $this->redirect(['action' => 'add ']);
            }
            
        }
    } 
    /**
     * Edit User
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function edit($id = null){
        $this->set('title','Title');
        $user = $this->Users->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('User has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your user.'));
        }

        $this->set('user', $user);
    } 
    /**
     * Delete User
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function delete($id){
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
        }
    }
    /**
     * Login
     *
     * @return void|\Cake\Network\Response
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function login(){
    		$this->viewBuilder()->layout('login');
		    $this->set('title','Login');

		    if ($this->request->is('post')) {
				$user = $this->Auth->identify();
	            if ($user) {
	                $this->Auth->setUser($user);
	                $this->redirect(array('controller'=>'users','action' => 'dashboard'));
                    return $this->redirect($this->Auth->redirectUrl());
	            }
	            $this->Flash->error('Your username or password is incorrect.');
	        }
		    
    }

    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
}
