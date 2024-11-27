<?php

namespace GX4\Trait;

trait FileSaveTrait
{
    public function saveFile($object, $data, $input_name, $target_path)
    {
        $dados_file = json_decode(urldecode($data->$input_name));

        if (isset($dados_file->fileName))
        {
            $pk = $object->getPrimaryKey();

            $target_path.= '/' . $object->$pk;
            $target_path = str_replace('//', '/', $target_path);

            $source_file = $dados_file->fileName;
            $target_file = strpos($dados_file->fileName, $target_path) === FALSE ? $target_path . '/' . $dados_file->fileName : $dados_file->fileName;
            $target_file = str_replace('tmp/', '', $target_file);

            return $target_file;
        }
    }
}