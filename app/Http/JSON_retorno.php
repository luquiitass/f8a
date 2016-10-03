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
    private $mensaje;
    private $html;
    private $html_append;
    private $fadeOut;
    private $html_remplace;
    private $id_content;
    private $tipo_mensaje;
    private $permanente;

    /**
     * JSON_retorno constructor.
     * @param $mensaje
     * @param $html
     * @param $html_append
     * @param $fadeOut
     * @param $html_remplace
     */
    public function __construct()
    {
        $this->mensaje = "";
        $this->html = "";
        $this->html_append = "";
        $this->fadeOut = "";
        $this->html_remplace = "";
        $this->id_content = "" ;
        $this->tipo_mensaje = "";
        $this->permanente = "";
    }

    /**
     * @return string
     */
    public function getMensaje()
    {
        return array('mensaje'=>$this->mensaje);
    }

    /**
     * @param string $mensaje
     */
    public function setMensaje($mensaje,$tipo,$permanente = 'false')
    {
        $this->tipo_mensaje=$tipo;
        $this->permanente = $permanente;
        $this->mensaje = $mensaje;
    }

    /**
     * @return string
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * @param string $html
     */
    public function setHtml($id,$html)
    {
        $this->id_content = $id;
        $this->html = $html;
    }

    /**
     * @return string
     */
    public function getHtmlAppend()
    {
        return $this->html_append;
    }

    /**
     * @param string $html_append
     */
    public function setHtmlAppend($id,$html_append)
    {
        $this->id_content = $id;
        $this->html_append = $html_append;
    }

    /**
     * @return string
     */
    public function getFadeOut()
    {
        return $this->fadeOut;
    }

    /**
     * @param string $fadeOut
     */
    public function setFadeOut($id)
    {
        $this->id_content = $id;
        $this->fadeOut = true;
    }

    /**
     * @return string
     */
    public function getHtmlRemplace()
    {
        return $this->html_remplace;
    }

    /**
     * @param string $html_remplace
     */
    public function setHtmlRemplace($id,$html_remplace)
    {
        $this->id_content = $id;
        $this->html_remplace = $html_remplace;
    }

    public function getAllJSON(){
        $retorno = array();
        foreach ($this as $key => $value){
            if ($value != '')
            {
                $retorno[$key]=$value;
            }
        }
        return json_encode($retorno);
    }


}