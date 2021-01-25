<?php

namespace App\Utils;

use App\Exception\UploadedFileException;
use App\Exception\UploadedFileNoFileException;

/**
 * Class UploadedFile
 *
 * Classe que gestiona la pujada de fitxers al servidor mitjançant formularis
 */
class UploadedFile
{
    /**
     * @var array
     *
     * Array del fitxer pujat. $_FILES['nom_del_camp_del_formuari']
     */
    private $file;
    /**
     * @var string
     *
     * Nom amb que es guardarà el fitxer.
     */
    private $fileName;
    /**
     * @var int
     *
     * Mida màxima en bytes del fitxer, 0 indica que no hi ha límit.
     */

    private int $maxSize;
    /**
     * @var array
     *
     * Array amb els MimeType acceptats. Per exemple ['image/jpg', 'image/gif', image/png']. Si l'array és buit
     * s'accepten tots els tipus.
     */
    private array $acceptedTypes;

    /**
     * UploadedFile constructor. Comprova que s'ha pujat un fitxer, si no llançarà una excepció
     * UploadFileNoFileException.
     * En qualsevol altre error en la pujada llançarà l'excepció UploadFileException.
     *
     * El paràmetre $inputName rebrà la clau de $_FILES en que s'emmagatzemen les dades del fitxer pujat.
     *
     * El paràmetre $maxSize indica la grandària màxima en bytes permesa. És opcional, serà 0 per defecte.
     * Si és 0 la grandària és ilimitada.
     *
     * El paràmetre $acceptedTypes és opcional. Contindrà els mimetype (tipus de fitxers) permesos. Per defecte
     * estarà buit, en eixe cas es podrà pujar qualsevol tipus de fitxer.
     *
     * @param string $inputName
     * @param int $maxSize
     * @param array $acceptedTypes
     * @throws UploadedFileException
     * @throws UploadedFileNoFileException
     */
    public function __construct(string $inputName, int $maxSize = 0, array $acceptedTypes = array())
    {
        $this->file = $_FILES[$inputName];
        if (empty($this->file))
            throw new UploadedFileException("Upload file not found");

        if ($this->file["error"] === UPLOAD_ERR_NO_FILE)
            throw new UploadedFileNoFileException("No file uploaded");


        $this->fileName = $this->file["name"];
        $this->acceptedTypes = $acceptedTypes;
        $this->maxSize = $maxSize;

        if ($this->file["error"] !== UPLOAD_ERR_OK)
            throw new UploadedFileException("Error handling uploaded file");

    }

    /**
     * @return bool
     *
     * Comprova que el fitxer s'haja pujat correctament, que no supera el limit de grandària i és del tipus indicat.
     * Si no passa la validació llançarà una excepció.
     * @throws UploadedFileException
     */
    public function validate(): bool
    {
        $imageSize = $this->file['size'];
        $imageType = $this->file['type'];
        if ($this->maxSize === 0 || $imageSize < $this->maxSize) {
            if (count($this->acceptedTypes) === 0 || in_array($imageType, $this->acceptedTypes))
                return true;
            else
                throw new UploadedFileException("El tipus de la imatge ($imageType) no és del tipus
                        adequat:" . implode(", ", $this->acceptedTypes));
        } else
            throw new UploadedFileException("La grandària de la imatge ($imageSize) 
            supera el límit establert: $this->maxSize");
    }

    /**
     * @return string
     *
     * Tornarà el nom del fitxer.
     */
    public function getFileName(): string
    {
        return $this->fileName;
    }

    /**
     * @param string $directory
     * @param string $fileName
     * @return bool
     *
     * Guarda el fitxer en la ubicació indicada.
     * Si no s'indica nom es guardarà amb el mateix nom que s'ha penjat.
     * Si s'indica es guardarà en eixe nom, l'extensió s'obtindrà de forma automàtica a partir del nom del que
     * s'ha pujat.
     *
     * Exemple: $path = '/public/images/', $fileName = 'prova.png'
     *
     * Torna true si s'ha pogut moure la imatge a la ubicació indicada.
     */
    public function save(string $directory, $fileName = ""): bool
    {
        if (!is_uploaded_file($this->file['tmp_name'])) {
            return false;
        }
        if (strlen($fileName) === 0) {
            $fileName = $this->file["name"];

        } else {
            $this->fileName = $fileName . $this->getExtension();
        }

        if (move_uploaded_file($this->file["tmp_name"], $directory . $this->fileName))
            return true;
        else
            return false;
    }

    /**
     * Extrau del nom de fitxer pujat la seua extensió
     * @return string
     */
    private function getExtension(): string
    {
        $file = $this->file["name"];
        $extensionArray = explode(".", $file);
        $extension = end($extensionArray);
        return $extension ? ".$extension" : "";
    }
}