<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class FileService
{
    /**
     * @var string
     */
    protected string $file;
    /**
     * @var string
     */
    protected string $extension;
    /**
     * @var string
     */
    protected string $path;
    /**
     * @var string
     */
    protected string $size;

    /**
     * @var File
     */
    protected File $model;

    /**
     * @var Request
     */
    protected Request $request;

    /**
     * @var string
     */
    protected string $disk;

    /**
     * @var string
     */
    protected string $fileName;

    public function __construct()
    {
        $this->model = new File();
    }

    /**
     * @param Request $request
     * @param string $name
     * @param string $disk
     * @return $this
     */
    public function setParams(Request $request, string $name, string $disk = 'avatar'): self
    {
        $this->request = $request;
        $this->fileName = $name;
        $this->disk = $disk;

        return $this;
    }

    /**
     * @param string $disk
     * @return $this
     */
    public function setDisk(string $disk = 'avatar'): self
    {
        $this->disk = $disk;

        return $this;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function findFile($id): ?File
    {
        return $this->model->find($id);
    }

    /**
     * @param int|null $id
     * @return File|null
     */
    public function storeFile(int $id = null): ?File
    {
        if ($this->request->hasFile($this->fileName)) {
            $this->file = $this->request->file($this->fileName);
            $this->setExtension($this->request->file($this->fileName)->getClientOriginalExtension());
            $this->setSize($this->request->file($this->fileName)->getSize());

            return is_null($id)
                ? $this->save()
                : $this->fresh($id);
        }

        return null;
    }

    /**
     * @param Request $request
     * @param string $name
     * @param string $disk
     * @return Collection
     */
    public function storeFiles(): Collection
    {
        $files = collect([]);
        if ($this->request->hasFile($this->fileName)) {
            if (is_array($this->request->file($this->fileName))) {
                $this->isArray = true;
                foreach ($this->request->file($this->fileName) as $file) {
                    $this->file = $file;
                    $this->setExtension($file->getClientOriginalExtension());
                    $this->setSize($file->getSize());
                    $files->push($this->save());
                }
            }
        }

        return $files;
    }

    /**
     * Function save stream file
     *
     * @param string $stream
     * @return File
     */
    public function saveFromBinary(string $stream): File
    {
        $filename = $this->makeFilename();
        Storage::disk($this->disk)->put($filename, $stream);

        return $this->record($filename);
    }

    /**
     * Function delete file from storage and remove record in DB
     *
     * @param File $file
     */
    public function remove(File $file): void
    {
        if ($file && Storage::disk($file->disk)->exists($file->name)) {
            Storage::disk($file->disk)->delete($file->name);
            $file->delete();
        }
    }

    /**
     * @param string $disk
     * @return File
     */
    protected function save(): File
    {
        $filename = $this->makeFilename();
        Storage::disk($this->disk)->putFileAs('/', $this->file, $filename);

        return $this->record($filename);
    }

    /**
     * @param int $id
     * @return File
     */
    protected function fresh(int $id): File
    {
        $record = $this->model->find($id);
        $this->remove($record);

        return $this->save();
    }

    /**
     * @param string $filename
     * @return string
     */
    protected function makeFilename(): string
    {
        return pathinfo($this->extension, PATHINFO_FILENAME) . '_' . time() . '.' . $this->extension;
    }

    /**
     * @param $filename
     * @return File
     */
    protected function record(string $filename): File
    {
        return $this->model->create([
            'disk'   => $this->disk,
            'name'   => $filename,
            'type'   => $this->extension,
            'size'   => $this->size,
            'active' => true,
        ]);
    }
}
