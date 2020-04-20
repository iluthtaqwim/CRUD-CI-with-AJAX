<?php
class Crud extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged_in') != true) {
            redirect('auth', 'refresh');
        }
        $this->load->model('Kelas_model', 'kelas');
        $this->load->model('Siswa_model', 'siswa');
    }

    function index()
    {
        $data['kelas'] = $this->kelas->getAll();
        $data['siswa'] = $this->siswa->getAll();
        $this->load->view('head_dt');
        $this->load->view('crud_ajax/index', $data);
    }

    function create()
    {
        $siswa = array(
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl'),
            'alamat' => $this->input->post('alamat'),
            'password' => $this->input->post('password'),

        );

        $this->siswa->add($siswa);
        $respone = array(
            'status' => true,
            'lokasi' => base_url() . "index.php/crud",
        );
        echo json_encode($respone);
    }

    function update_siswa()
    {
        $siswa = array(
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl'),
            'alamat' => $this->input->post('alamat'),
            'password' => $this->input->post('password'),

        );

        $this->siswa->update($this->input->post('hidden_id'), $siswa);
        $respone = array(
            'status' => true,
            'lokasi' => base_url() . "index.php/crud",
        );
        echo json_encode($respone);
    }

    function update()
    {
        $id_siswa = $this->input->post('id');
        $siswa = array(
            'nis' => $this->input->post('nis'),
            'nama' => $this->input->post('nama'),
            'tgl_lahir' => $this->input->post('tgl'),
            'alamat' => $this->input->post('alamat'),
            'password' => $this->input->post('password'),

        );
        if ($_POST['action'] == 'fetch_single') {

            $result = $this->siswa->getFetch($id_siswa);
        }
        echo json_encode($result);


        if ($_POST['action'] == 'update') {


            $this->siswa->update($id_siswa, $siswa);

            $respone = array(

                'status' => true,
                'lokasi' => base_url() . 'index.php/crud'
            );
            echo json_encode($respone);
        }
    }
    function delete()
    {
        if ($_POST["action"] == "delete") {

            $id_siswa = $this->input->post('id');
            $this->siswa->delete($id_siswa);
            $respone = array(
                'status' => true,
                'lokasi' => base_url() . 'index.php/crud'
            );
            echo json_encode($respone);
        }
    }

    // Controller Table

    function addKls()
    {

        $params = array(

            'tingkat' => $this->input->post('tingkat'),
            'ruang' => $this->input->post('ruang'),
            'jumlah_siswa' => $this->input->post('jml')
        );

        $this->kelas->add($params);

        $respone = array(
            'status' => true,
            'lokasi' => base_url() . 'index.php/crud'
        );
        echo json_encode($respone);
    }


    function updateKls()
    {

        $params = array(

            'tingkat' => $this->input->post('tingkat'),
            'ruang' => $this->input->post('ruang'),
            'jumlah_siswa' => $this->input->post('jml')
        );

        $this->kelas->updateKelas($this->input->post('hidden_id_kls'), $params);


        $respone = array(

            'status' => true,
            'lokasi' => base_url() . 'index.php/crud'
        );
        echo json_encode($respone);
    }

    function update_kelas()
    {
        $id_kelas = $this->input->post('id');
        $params = array(

            'tingkat' => $this->input->post('tingkat'),
            'ruang' => $this->input->post('ruang'),
            'jumlah_siswa' => $this->input->post('jml')
        );
        if ($_POST['action'] == 'fetch') {

            $result = $this->kelas->get_kls($id_kelas);
        }
        echo json_encode($result);


        if ($_POST['action'] == 'update') {


            $this->siswa->update($id_kelas, $params);

            $respone = array(

                'status' => true,
                'lokasi' => base_url() . 'index.php/crud'
            );
            echo json_encode($respone);
        }
    }

    function deleteKls()
    {

        if ($this->input->post('action') == "delete") {

            $id_kelas = $this->input->post('id');
            $this->kelas->delete($id_kelas);
            $respone = array(
                'status' => true,
                'lokasi' => base_url() . 'index.php/crud'
            );
            echo json_encode($respone);
        }
    }
}
