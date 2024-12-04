<?php

namespace App\Services\File;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class FileService
{
    /**
     * @var string
     */
    protected UploadedFile $file;
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
     * @param UploadedFile $file
     * @param string $name
     * @param string $disk
     * @param int|null $id
     * @return File
     */
    public function setUploadFile(UploadedFile $file, string $name, string $disk = 'avatar', int $id = null)
    {
        $this->fileName = $name;
        $this->disk = $disk;

        $this->setFile($file);
        $this->setExtension($file->getClientOriginalExtension());
        $this->setSize($file->getSize());

        return is_null($id)
            ? $this->save()
            : $this->fresh($id);
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

    /**
     * @param UploadedFile $file
     * @return $this
     */
    public function setFile(UploadedFile $file): self
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @param string $extension
     * @return $this
     */
    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @param string $size
     * @return $this
     */
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
            $this->setFile($this->request->file($this->fileName));
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
                foreach ($this->request->file($this->fileName) as $file) {
                    $this->setFile($file);
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
     * @param File $file
     * @return \Symfony\Component\HttpFoundation\StreamedResponse|void
     */
    public function downloadFile(File $file)
    {
        if ($file && Storage::disk($file->disk)->exists($file->name)) {
            return Storage::disk($file->disk)->download($file->name);
        }
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
     * @param array $files
     * @return void
     */
    public function removeFiles(Collection $files): void
    {
        $files->each(function ($item) {
            $this->remove($item);
        });
    }

    /**
     * @param int $id
     * @return File|null
     */
    public function makeCopyFile(int $id): ?File
    {
        $file = $this->model->find($id);

        if ($file && Storage::disk($file->disk)->exists($file->name)) {
            $this->setExtension($file->type);
            $this->setDisk($file->disk);
            $this->setSize($file->size);
            $filename = $this->makeFilename();
            Storage::disk($file->disk)->copy($file->name, $filename);

            return $this->record($filename);
        }

        return null;
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
        return pathinfo($this->extension, PATHINFO_FILENAME) . '_' . now()->format("Hisu") . '.' . $this->extension;
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
