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

    private $allJSON = array();

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
        if ($this->mensaje == "") {
            $this->tipo_mensaje = $tipo;
            $this->permanente = $permanente;
            $this->mensaje = $mensaje;
        }else{
            $this->newJSON();
        }
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
        if ($this->id_content == '') {
            $this->id_content = $id;
            $this->html = $html;
        }else{
            $this->newJSON();
        }
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
        if ($this->id_content ==''){
            $this->id_content = $id;
            $this->html_append = $html_append;
        }else{
            $this->newJSON();
        }
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
        if ($this->id_content ==''){
            $this->id_content = $id;
            $this->fadeOut = true;
        }else{
            $this->newJSON();
        }
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
        if ($this->id_content ==''){
            $this->id_content = $id;
            $this->html_remplace = $html_remplace;
        }else{
            $this->newJSON();
        }
    }










    public function getAllJSON(){
        $ultimo = array();
        foreach ($this as $key => $value){
            if ($value != '' && $key!="allJSON") {
                $retorno[$key] = $value;
            }
        }
        array_push($this->allJSON,$retorno);

        return json_encode($this->allJSON);
    }

    public function newJSON(){
        $retorno = array();
        foreach ($this as $key => $value){
            if ($value != '' && $key!="allJSON") {
                $retorno[$key] = $value;
            }
        }
        $this->allJSON[]=$retorno;

        $this->clear();
    }


    public function clear()
    {
        foreach ($this as $key => $value){
            if ($value != '' && $key != "allJSON" )
            {
                $this->{$key} = "";
            }
        }
    }

}