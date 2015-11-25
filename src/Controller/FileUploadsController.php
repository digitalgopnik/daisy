<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * FileUploads Controller
 *
 * @property \App\Model\Table\FileUploadsTable $FileUploads
 */
class FileUploadsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->loadModel('GroupsUsers');
        $groups = $this->GroupsUsers->find()->select(['group_id'])->where(['user_id' => $this->request->session()->read('user_id')])->hydrate(false);

        $this->loadModel('Groups');
        $this->set('groups', $this->Groups->find());

        $this->set('group_uploads', $this->paginate($this->FileUploads->find()->where(['group_id IN' => $groups])));
        $this->set('file_uploads', $this->paginate($this->FileUploads->find()->where(['user_id' => $this->request->session()->read('user_id')])));

        $this->set('_serialize', ['file_uploads']);

        // TODO: Gruppenuploads holen
        //$this->set('')
    }

    /**
     * @param null $id
     *
     * View file method
     *
     * Display data string of file upload
     */
    public function view_file($app_name, $file_name) {
        $this->autoRender = false;
        $this->viewBuilder()->layout('ajax');
        $file_upload = $this->FileUploads->find()->where(['FileUploads.app_name' => $app_name, 'FileUploads.filename' => $file_name])->first();
        // header("Content-length: $size");
        header("Content-type: application/$file_upload->type");
        header("Content-Disposition: attachment; filename=$file_name.$file_upload->type");

        $image = imagecreatefromstring($file_upload->data);

        ob_start();
        imagejpeg($image, null, 80);
        $data = ob_get_contents();
        ob_end_clean();
        echo $data;
        return;

    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Users');
        $this->loadModel('Groups');
        $this->set('groups', $this->Groups->find());
        $file_upload = $this->FileUploads->newEntity();
        if ($this->request->is('post')) {
            $file = $this->request->data['file'];
            if (isset($this->request->data['group_id']) && $this->request->data['group_id']!='') {
                $group_id = $this->request->data['group_id'];
                $group_folder = $this->Groups->get($group_id);
            } else {
                $group_id = "";
                $user_folder = $this->Users->get($this->request->session()->read('user_id'));
            }
            if (isset($group_folder)) {
                $destination = $group_folder->folder_path . "/" . $file['name'];
            } else {
                $destination = $user_folder->user_path . "/" . $file['name'];
            }

            unset($this->request->data);
            $new_file_upload = [
                'user_id' => $this->request->session()->read('user_id'),
                'group_id' => $group_id,
                'src' => $destination,
                'filename' => $file['name'],
                'type' => $file['type']
            ];
            $file_upload = $this->FileUploads->patchEntity($file_upload, $new_file_upload);
            $file_upload_save = $this->FileUploads->save($file_upload);
            if ($file_upload_save) {

                $destination_path = WWW_ROOT.$destination;

                move_uploaded_file($file['tmp_name'], $destination_path);

                $this->Flash->success(__('Datei erfolgreich hochgeladen.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Datei wurde nicht erfolgreich hochgeladen.'));
            }
        }
        $this->set(compact('file_upload'));
        $this->set('_serialize', ['file_upload']);
    }

    /**
     * Upload file method
     *
     * @return daisy_url
     */
    public function uploadFile($appname = null, $url = null, $data = null) {
        set_time_limit(0);
        ini_set('memory_limit', '256M');
        // ini_set('max_allowed_packet', 4000000000);
        $this->viewBuilder()->layout('ajax');
        $this->autoRender = false;

        $this->loadModel('Users');
        $file_upload = $this->FileUploads->newEntity();
        if ($this->request->is(['post', 'put', 'ajax'])) {

            if (!$appname) {
                $appname = $this->request->data['appname'];
            }
            if (!$url) {
                $url = $this->request->data['url'];
            }
            if (!$data) {
                $data = $this->request->data['data'];
            }

            $new_file_upload = [
                'user_id' => $this->request->session()->read('user_id'),
                'group_id' => '',
                'app_name' => $appname,
                'url' => $url,
                'src' => 'db',
                'data' => $data['data'],
                'filename' => isset($data['name']) ? $data['name'] : "",
                'type' => $data['type']
            ];
            $file_upload = $this->FileUploads->patchEntity($file_upload, $new_file_upload);
            $file_upload_save = $this->FileUploads->save($file_upload);

            if ($file_upload_save) {
                $response = ['status' => 'Heilige Mutter Teresa', 'appname' => $appname, 'url' => $url];
            } else {
                $response = ['status' => 'Kacke', 'Warum kacke?' => var_dump($file_upload)];
            }

            $this->set('response', $response);

            $this->render('response');

            return;


        }
    }

    /**
     * Share method
     *
     */
    public function share($id = null) {
        $file_upload = $this->FileUploads->get($id);

        $file = $file_upload;

        $group_id = $this->request->data['group_id'];

        $app_name = "";
        $url = "";
        $filename = "";
        $data = "";
        $type = "";
        if (isset($file->app_name)) {
            $app_name = $file->app_name;
        }
        if (isset($file->url)) {
            $url = $file->url;
        }
        if (isset($file->filename)) {
            $filename = $file->filename;
        }
        if (isset($file->data)) {
            $data = $file->data;
        }
        if (isset($file->type)) {
            $type = $file->type;
        }

        $new_file_upload = [
            'user_id' => $this->request->session()->read('user_id'),
            'group_id' => $group_id,
            'app_name' => $app_name,
            'url' => $url,
            'src' => 'db',
            'filename' => $filename,
            'data' => $data,
            'type' => $type
        ];
        $file_upload = $this->FileUploads->patchEntity($file_upload, $new_file_upload);
        $file_upload_save = $this->FileUploads->save($file_upload);
        if ($file_upload_save) {
            $response = ['status' => 'Heilige Mutter Teresa'];
        } else {
            $response = ['status' => 'Kacke', 'Warum kacke?' => var_dump($file_upload)];
        }

        $this->set('response', $response);

        $this->render('response');

        return;

    }

    /**
     * Delete method
     *
     * @param string|null $id File Upload id.
     * @return void Redirects to index.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file_upload = $this->FileUploads->get($id);
        if ($this->FileUploads->delete($file_upload)) {
            $this->Flash->success(__('The file upload has been deleted.'));
        } else {
            $this->Flash->error(__('The file upload could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function get_user_id() {
        $this->viewBuilder()->layout('ajax');
        $this->autoRender = false;

        if ($this->request->session()->read('user_id')>0) {
            $this->set('response', ['status' => 'success', 'user_id' => $this->request->session()->read('user_id')]);
            $this->render('response');
        } else {
            $this->set('response', ['status' => 'failed']);
            $this->render('response');
        }

    }
}
