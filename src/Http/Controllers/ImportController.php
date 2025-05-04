<?php

namespace Ducal\DataSynchronize\Http\Controllers;

use Ducal\Base\Http\Controllers\BaseController;
use Ducal\DataSynchronize\Http\Requests\DownloadTemplateRequest;
use Ducal\DataSynchronize\Http\Requests\ImportRequest;
use Ducal\DataSynchronize\Importer\Importer;
use Exception;
use Illuminate\Support\Arr;

abstract class ImportController extends BaseController
{
    abstract protected function getImporter(): Importer;

    public function index()
    {
        return $this->getImporter()->render();
    }

    public function validateData(ImportRequest $request)
    {
        try {
            $result = $this->getImporter()->validate(
                $request->input('file_name'),
                $request->input('offset'),
                $request->input('limit'),
            );

            return $this
                ->httpResponse()
                ->setMessage(Arr::pull($result, 'message'))
                ->setData($result);
        } catch (Exception $e) {
            return $this
                ->httpResponse()
                ->setError()
                ->setMessage($e->getMessage());
        }
    }

    public function import(ImportRequest $request)
    {
        try {
            $result = $this->getImporter()->import(
                $request->input('file_name'),
                $request->input('offset'),
                $request->input('limit'),
            );

            return $this
                ->httpResponse()
                ->setMessage(Arr::pull($result, 'message'))
                ->setData($result);
        } catch (Exception $e) {
            return $this
                ->httpResponse()
                ->setError()
                ->setMessage($e->getMessage());
        }
    }

    public function downloadExample(DownloadTemplateRequest $request)
    {
        return $this->getImporter()->downloadExample($request->input('format'));
    }
}
