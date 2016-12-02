<?php
/**
 * Created by PhpStorm.
 * User: lucas
 * Date: 27/09/16
 * Time: 11:26
 */

namespace App\Http;


class JSON_retorno
{
    private $allJSON = array();

    /**
     * @param string $mensaje
     */
    public function setMensaje($mensaje,$tipo,$permanente = 'false')
    {
        $this->allJSON[]=array('mensaje'=>$mensaje,'tipo_mensaje'=>$tipo,'permanente'=>$permanente);
    }


    /**
     * @param string $html
     */
    public function setHtml($id,$html)
    {
        $this->allJSON[]=array('id_content'=>$id,'html'=>$html);
    }


    /**
     * @param string $html_append
     */
    public function setHtmlAppend($id,$html_append)
    {
        $this->allJSON[] = array('id_content'=>$id,'html_append'=>$html_append);

    }


    /**
     * @param string $fadeOut
     */
    public function setFadeOut($id)
    {
        $this->allJSON[] = array('id_content'=>$id,'fadeOut'=>true);
    }


    /**
     * @param string $html_remplace
     */
    public function setHtmlRemplace($id,$html_remplace)
    {
        $this->allJSON[] = array('id_content'=>$id,'html_remplace'=>$html_remplace);
    }

    /**
     * @param array $tab_activo
     */
    public function setTabActivo($tab_activo)
    {
        $this->allJSON[] = array('tab_activo'=>$tab_activo);

    }

    /**
     * @param string $desactivar_tabs
     */
    public function setDesactivarTabs()
    {
        $this->allJSON[] = array('desactivar_tabs'=>'true');
    }

    public function setSelectElement($id)
    {
        $this->allJSON[]= array('id_content'=>$id,'selectElement'=>'true');
    }


    public function getAllJSON(){
         return json_encode($this->allJSON);
    }

}