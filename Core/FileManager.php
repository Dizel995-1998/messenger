<?php

namespace Core;

class FileManager
{
    protected array $allowFileType = ['jpg', 'png'];
    protected string $userFile;

    public function __construct(string $userFile)
    {
        $this->userFile = $userFile;
    }

    public function getFileSize() : int
    {
        return (int) $_FILES[$this->userFile]['size'];
    }

    public function getFileType() : string
    {
        return end(explode('.', $_FILES[$this->userFile]['name']));
    }

    protected function verificationFileType() : bool
    {
        return in_array($this->getFileType(), $this->allowFileType);
    }

    public function downloadFile() : bool
    {
        if ($this->verificationFileType()) {

            move_uploaded_file();
        } else {
            return false;
        }
        return true;
    }
}