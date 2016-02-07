<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Navigation {
    var $menu = array();    //The array holding all navigation elements
    var $mainNav;           // The HTML string for main nav bar
    var $subNav;            // The HTML string for sub nav bar
    var $outputHTML;        // string to be returned if no sub, array if there is a sub
    
    function init(){
        $CI =& get_instance();
 
        $this->menu = array(
            1 =>    array(
                'text'      =>  'Home', 
                'link'      =>  base_url(),
                'attributes' => '',
                'show_condition'=>  1,
                'parent'    =>  0
            ),
            2 =>    array(
                'text'      =>  'About',
                'link'      =>  base_url('about'),
                'attributes' => '',
                'show_condition'=>  1,
                'parent'    =>  0
            ),
                3 =>    array(
                    'text'      =>  'History',
                    'link'      =>  base_url('about/history'),
                    'attributes' => '',
                    'show_condition'=>  0,      // hidden from navigation bar
                    'parent'    =>  2
                ),
                4 =>    array(
                    'text'      =>  'Membership',    
                    'link'      =>  base_url('about/membership'),
                    'attributes' => '',
                    'show_condition'=>  1,
                    'parent'    =>  2
                ),
                5 =>    array(
                    'text'      =>  'Committee',    
                    'link'      =>  base_url('about/committee'),
                    'attributes' => '',
                    'show_condition'=>  1,
                    'parent'    =>  2
                ),
            6 =>    array(
                'text'      =>  'Railway',    
                'link'      =>  base_url('railway'),
                'attributes' => '',
                'show_condition'=>  1,
                'parent'    =>  0
            ),
                7 =>    array(
                    'text'      =>  'Public Running',    
                    'link'      =>  base_url('railway/public-running'),
                    'attributes' => '',
                    'show_condition'=>  1,
                    'parent'    =>  6
                ),
                8 =>    array(
                    'text'      =>  'Raised Track',    
                    'link'      =>  base_url('railway/raised-track'),
                    'attributes' => '',
                    'show_condition'=>  1,
                    'parent'    =>  6
                ),
                9 =>    array(
                    'text'      =>  'Ground Level Track',    
                    'link'      =>  base_url('railway/ground-level-track'),
                    'attributes' => '',
                    'show_condition'=>  1,
                    'parent'    =>  6
                ),
                10 =>    array(
                    'text'      =>  'Gauge One Layout',    
                    'link'      =>  base_url('railway/gauge-one-layout'),
                    'attributes' => '',
                    'show_condition'=>  0,      // hidden from navigation bar
                    'parent'    =>  6
                ),
            11 =>    array(
                'text'      =>  'Meetings',
                'link'      =>  base_url('meetings'),
                'attributes' => '',
                'show_condition'=>  1,
                'parent'    =>  0
            ),        
                12 =>    array(
                    'text'      =>  'Spring 2016 Program (.pdf)',    
                    'link'      =>  base_url('files/Spring_Programme_2016.pdf'),
                    'attributes' => 'target="_blank"',
                    'show_condition'=>  1,
                    'parent'    =>  11
                ),
                13 =>    array(
                    'text'      =>  'Facebook Events Page',    
                    'link'      =>  'http://www.facebook.com/CDMEC/events',
                    'attributes' => 'target="_blank"',
                    'show_condition'=>  1,
                    'parent'    =>  11
                ),
            14 =>    array(
                'text'      =>  'Parties', 
                'link'      =>  base_url('parties'),
                'attributes' => '',
                'show_condition'=>  1,
                'parent'    =>  0
            ),
            15 =>    array(
                'text'      =>  'Gallery', 
                'link'      =>  base_url('gallery'),
                'attributes' => '',
                'show_condition'=>  1,
                'parent'    =>  0
            ),
            16 =>    array(
                'text'      =>  'Projects', 
                'link'      =>  base_url('projects'),
                'attributes' => '',
                'show_condition'=>  0,
                'parent'    =>  0
            ),
            17 =>    array(
                'text'      =>  'Contact',  
                'link'      =>  base_url('contact'),
                'attributes' => '',
                'show_condition'=>  1,
                'parent'    =>  0
            ),                  
        ); 
    }
        
    /*
     * load - Return HTML navigation string for main nav bar
     */
    public function load($currentPage = NULL, $currentSubPage = NULL) {
        $this->init();
        $mainNav = '';
        $subNav = NULL;
        $outputHTML = '';

        foreach ($this->menu as $i=>$arr) {     // $i is array index of $this->menu, loop through each element of $this->menu
            if (is_array($this->menu[$i])) {    // must be by construction but let's keep the errors home
                if ($this->menu[$i]['show_condition'] && $this->menu[$i]['parent'] == 0 ) { //are we allowed to see this menu and is it in main nav?
                    
                    //  Set for current nav item, else construct link html
                    //  Binary safe string comparison
                    if (strcasecmp($this->menu[$i]['text'], $currentPage) == 0) {   // broken, doesn't work with urls with hyphens/text with spaces
                        $subNav = $this->hasChildren($i) ? $i : NULL;               // if currentPage menu item has children, set subNav to $i, else null
                        $mainNav .= '<a href="'.$this->menu[$i]['link'].'" class="current">'.$this->menu[$i]['text'].'</a>'; // add 
                    } else {
                        $mainNav .= '<a href="'.$this->menu[$i]['link'].'">'.$this->menu[$i]['text'].'</a>';
                    }

                    if ($i < count($this->menu) && $this->menu[$i]['parent'] == 0)    // dont add seperator after last link
                        $mainNav .= '<span>|</span>';
                }
            } else {
                die (sprintf('menu nr %s must be an array', $i));
            }
        }

        // checks to see if a sub navigation html string is required
        if($subNav) {
            $subNav = $this->getChildren($subNav, $currentSubPage);
        } else {
            $subNav = "&nbsp;";
        }

        $outputHTML = array("main" => $mainNav, "sub" => $subNav);
        return $outputHTML;
    }
    
    private function hasChildren($menu_id) {
        foreach ($this->menu as $i=>$arr){
            if ($this->menu[$i]['show_condition'] && $this->menu[$i]['parent'] == $menu_id) {
                return TRUE;
            }
        }
        return FALSE;
    }


    /**
     *
     * getChildren - build an html string of the menu children
     *
     * @access private
     *
     * @return HTML or boolean
     *
     */
    private function getChildren($el_id, $currentSubPage) {
        $html = '';
        foreach ($this->menu as $i=>$arr) {
            if ($this->menu[$i]['show_condition'] && $this->menu[$i]['parent'] == $el_id) { //are we allowed to see this menu?

                if (strcasecmp($this->menu[$i]['text'], $this->getTitle($currentSubPage)) == 0) {
                    $html .= '<a href="'.$this->menu[$i]['link'].'" class="current" '.$this->menu[$i]['attributes'].'>'.$this->menu[$i]['text'].'</a>';
                } else {
                    $html .= '<a href="'.$this->menu[$i]['link'].'" '.$this->menu[$i]['attributes'].'>'.$this->menu[$i]['text'].'</a>';
                }

                if ($this->menu[$i+1]['parent'] != 0 && $this->menu[$i+1]['show_condition'])    // dont add seperator after last link
                    $html .= '<span>|</span>';
            }
        }
        return $html;
    }

    private function getTitle($string) {
        $string = str_replace("-", " ", $string);   // replace hyphens with spaces
        $string = ucwords($string);                 // uppercase first letter of each word
        return $string;
    }
}