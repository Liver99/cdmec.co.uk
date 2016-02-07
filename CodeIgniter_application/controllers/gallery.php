<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('facebook');
    }

    public function index() {
        $data = $this->getData('gallery');
        
        $data['albums'] = $this->_getAlbums();
        
        $this->load->view('templates/header', $data);
        $this->load->view('pages/gallery', $data);
        $this->load->view('templates/footer');
    }

    public function album($id) {
        $data = $this->getData('gallery');

        $data['albumInfo'] = $this->_getAlbumInfo($id);
        $data['photos'] = $this->_getPhotos($id);

        $this->load->view('templates/header', $data);
        $this->load->view('pages/gallery', $data);
        $this->load->view('templates/footer');
    }


    // Graph API reference: https://developers.facebook.com/docs/graph-api/reference/v2.0
    // Graph API explorer:  https://developers.facebook.com/tools/explorer/
    private function _getAlbums() {
        $albums = array();
        $fbquery = $this->facebook->api('cdmec/albums?fields=name,cover_photo&limit=999', 'GET');
        foreach($fbquery['data'] as $album) {
            if (substr($album['name'], 0, 9) == "Gallery: ") {
                $album['name'] = substr($album['name'], 9);                           // chop "Gallery: " off front of name
                $album['cover_photo'] = $this->_getPhotoURL($album['cover_photo']);   // convert cover photo id number into image source url 
                array_push($albums, $album);
            }
        }
        return $albums;
    }

    private function _getPhotoURL($photoID) {     // gets source url of photo of given ID
        $fbquery = $this->facebook->api($photoID.'?fields=source', 'GET');
        return $fbquery['source'];
    }

    private function _getAlbumInfo($id) {               // Get name and discription of album with given ID
        $fbquery = $this->facebook->api($id.'?fields=name,description,link', 'GET');
        $fbquery['name'] = substr($fbquery['name'], 9);// strip "Gallery: " from front of name
        return $fbquery;
    }

    private function _getPhotos($id) {                  // Get all photos names & source URLs in album with given ID
        $fbquery = $this->facebook->api($id.'/photos?fields=name,source&limit=999', 'GET');
        return $fbquery['data'];
    }
}