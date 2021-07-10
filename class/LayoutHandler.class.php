<?php

// classe que desenha a tela com base nos ambientes setados em ../json/layouts.json
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
