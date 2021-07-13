<?php

/**
 * 
 * LayoutHandler = handler the layout that is show if the path exist in '/json/layouts.json'
 * 
 * @param setScreen = path of environments (ex: '../../forms/spaceStation')
 * @method getScreen = draw the screen with environment passed
 * @return void
 * 
 **/ 

class LayoutHandler
{
    public $setScreen;

    public function getScreen()
    {
        if($this->setScreen != "" || $this->setScreen != null)
        {
            if (file_exists("../../layout/navbar1.layout.php"))
            {

                $titles = file_get_contents("../../json/titles.json");
                $dataTitles = json_decode($titles, true);

                $layouts = file_get_contents("../../json/layouts.json");
                $dataLayouts = json_decode($layouts, true);


                $_GET['title'] = $dataTitles[$this->setScreen];
                include_once "../../layout/navbar1.layout.php";
                include_once "../../layout/". $dataLayouts[$this->setScreen];
                include_once "../../layout/navbar2.layout.php";
            }
            elseif(file_exists("../layout/navbar1.layout.php"))
            {
                $titles = file_get_contents("../json/titles.json");
                $dataTitles = json_decode($titles, true);

                $layouts = file_get_contents("../json/layouts.json");
                $dataLayouts = json_decode($layouts, true);


                $_GET['title'] = $dataTitles[$this->setScreen];
                include_once "../layout/navbar1.layout.php";
                include_once "../layout/". $layouts[$this->setScreen];
                include_once "../layout/navbar2.layout.php";
            }
        }
        
    }
}

?>
