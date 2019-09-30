<?php 

require_once 'vendor/autoload.php';

Class ViewPDF{

    public function generateIdentification($data) 
    {
        error_reporting(0);
        $content = array();
        $stylesheet = file_get_contents('css/styles.css');

        //echo "<pre>";

        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'format' => 'Letter',
            'orientation' => 'P',
            'debug' => true,
            'allow_output_buffering' => true
        ]);

        // echo "<pre>";
        // var_dump($data);exit;


        for($i = 0; $i <= 1; ++$i) {
            if ($data['data']['membership'][$i] === "gideon") {
                if ($data['data']['roles'][$i] === "host") {
                    $content  = '<img src="images/Host_ID_Gideons.jpg" width="240" height="350" /><img src="images/Host_ID_Gideons.jpg" width="240" height="350" />';
                } else if($data['data']['roles'][$i] === "cohost") {
                    $content  = '<img src="images/Co-Host_ID_Gideons.jpg" width="240" height="350" /><img src="images/Co-Host_ID_Gideons.jpg" width="240" height="350" />';
                } else {
                    //members
                    $content  = '<img src="images/Gideon_ID_Delegate.jpg" width="240" height="340" /><img src="images/Gideon_ID_Delegate.jpg" width="240" height="340" />';
                }
            } else if ($data['data']['membership'][$i] === "auxiliary"){
    
                if ($data['data']['roles'][$i] === "host") {
                    $content  = '<img src="images/Host_ID_Auxiliary.jpg" width="240" height="340" /><img src="images/Host_ID_Auxiliary.jpg" width="240" height="340" />';
    
                } else if($data['data']['roles'][$i] === "cohost") {
                    $content  = '<img src="images/Co_Host_ID_Auxiliary.jpg" width="240" height="340" /><img src="images/Co_Host_ID_Auxiliary.jpg" width="240" height="340" />';
                    
                } else {
                    //members
                    $content  = '<img src="images/Auxiliary_ID_Delegate.jpg" width="240" height="340" /><img src="images/Auxiliary_ID_Delegate.jpg" width="240" height="340" />';
                }
    
            }
            $content  .= "<div class='firstname$i' style='text-align: center;'><span>". $data['data']['firstname'][$i] ."</span></div>";
            $content  .= "<div class='lastname$i' style='text-align: center;'><span>". $data['data']['lastname'][$i] ."</span></div>";
            $content  .= "<div class='campname$i' style='text-align: center;'><span>".$data['data']['campname'][$i] ."</span></div>";

            $content  .= "<div class='firstnameBack$i' style='text-align: center;'><span>".$data['data']['firstname'][$i] ."</span></div>";
            $content  .= "<div class='lastnameBack$i' style='text-align: center;'><span>". $data['data']['lastname'][$i] ."</span></div>";
            $content  .= "<div class='campnameBack$i' style='text-align: center;'><span>". $data['data']['campname'][$i] ."</span></div>";
            $content  .= "<br><br><br>";

            $mpdf->WriteHTML($stylesheet, 1);
            $mpdf->WriteHTML($content, \Mpdf\HTMLParserMode::HTML_BODY);
        }    
        
        return $mpdf->Output();
    }

}