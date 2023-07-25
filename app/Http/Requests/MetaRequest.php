<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @mixin FormRequest
 */
trait MetaRequest {
    protected function compileMetaRules(array $metaItems) {
        $rules = [];
        foreach ($metaItems as $item)
            $rules += $this->compileItemRules($item);
        return $rules;
    }

    private function compileItemRules(array $item) {
        if ($item['type'] == 'string' || $item['type'] == 'textarea')
            return $this->compileStringRules($item);
        elseif ($item['type'] == 'file')
            return $this->compileFileRules($item);
        elseif ($item['type'] == 'array')
            return $this->compileArrayRules($item);
        elseif ($item['type'] == 'object')
            return $this->compileObjectRules($item);
        else
            throw new \RuntimeException("The object type '{$item['type']}' is not supported.");
    }

    private function compileStringRules(array $item) {
        $rule = [];
        if (array_key_exists('required', $item) && $item['required'])
            $rule[] = 'required';
        else
            $rule[] = 'nullable';
        $rule[] = 'string';
        $rule = array_merge($rule, $item['rules']);
        return [$item['name'] => $rule];
    }

    private function compileFileRules(array $item) {
        $rule = [];
        $required = (array_key_exists('required', $item) && $item['required']);
        if ($required)
            $rule[] = 'required_without:' . $item['name'] . '_old';
        else
            $rule[] = 'nullable';
        $rule[] = 'file';
        $rule = array_merge($rule, $item['rules']);
        return [
            $item['name'] => $rule,
            "{$item['name']}_old" => ['nullable', 'string', "regex:/^{$item['path']}\\/[a-zA-Z0-9]+\\.[a-zA-Z0-9]{1,5}$/"],
        ];
    }

    private function compileArrayRules(array $item) {
        $item['item_schema']['name'] = "{$item['name']}.*";
        return [$item['name'] => ($item['required'] ?? false) ? ['required', 'array'] : ['sometimes', 'nullable', 'array']] + $this->compileItemRules($item['item_schema']);
    }

    private function compileObjectRules(array $item) {
        $rules = [];
        foreach($item['item_schema'] as $subItem) {
            $subItem['name'] = "{$item['name']}.{$subItem['name']}";
            $rules += $this->compileItemRules($subItem);
        }
        return $rules;
    }

    protected function compileMetaAttributeLabels(array $metaItems) {
        $labels = [];
        foreach ($metaItems as $item)
            $labels += $this->compileItemLabels($item);
        return $labels;
    }

    private function compileItemLabels(array $item) {
        if ($item['type'] == 'string' || $item['type'] == 'textarea')
            return $this->compileFieldLabels($item);
        elseif ($item['type'] == 'file')
            return $this->compileFileLabels($item);
        elseif ($item['type'] == 'array')
            return $this->compileArrayLabels($item);
        elseif ($item['type'] == 'object')
            return $this->compileObjectLabels($item);
        else
            throw new \RuntimeException("The object type '{$item['type']}' is not supported.");
    }

    private function compileFieldLabels(array $item) {
        return [$item['name'] => $item['label']];
    }

    private function compileFileLabels(array $item) {
        return [
            $item['name'] => $item['label'],
            $item['name'] . '_old' => '"' . $item['label'] . '" قدیمی',
        ];
    }

    private function compileArrayLabels(array $item) {
        $item['item_schema']['name'] = "{$item['name']}.*";
        return [$item['name'] => $item['label']] + $this->compileItemLabels($item['item_schema']);
    }

    private function compileObjectLabels(array $item) {
        $labels = [];
        foreach($item['item_schema'] as $subItem) {
            $subItem['name'] = "{$item['name']}.{$subItem['name']}";
            $labels += $this->compileItemLabels($subItem);
        }
        return $labels;
    }

    protected function parseValidated(array $data, array $metaItems) {
        $newData = [];
        foreach ($metaItems as $item)
            $newData += $this->parseItemData($data, $item, true);
        return $newData;
    }

    private function parseItemData(array $data, array $item, $initialRun = false) {
        $type = $item['type'];
        if ($type != 'file' && !array_key_exists($item['name'], $data))
            return [];
        if ($type == 'string' || $type == 'textarea')
            return $this->parseStringData($data, $item);
        elseif ($type == 'file')
            return $this->parseFileData($data, $item);
        elseif ($type == 'array')
            return $this->parseArrayData($data, $item, $initialRun);
        elseif ($type == 'object')
            return $this->parseObjectData($data, $item, $initialRun);
        else
            throw new \RuntimeException("The object type '{$item['type']}' is not supported.");
    }

    private function parseStringData(array $data, array $item) {
        return [$item['name'] => $data[$item['name']]];
    }

    private function parseFileData(array $data, array $item) {
        if (!empty($data[$item['name']]))
            return [$item['name'] => $data[$item['name']]->store($item['path'], 'public')];
        elseif (!empty($data[$item['name'] . '_old']))
            return [$item['name'] => $data[$item['name'] . '_old']];
        else
            return [];
    }

    private function parseArrayData(array $data, array $item, $jsonEncode = false) {
        $newData = [];
        foreach ($data[$item['name']] as $idx => $subData) {
            $newData = array_merge($newData, $this->parseItemData($data[$item['name']], $item['item_schema'] + ['name' => $idx]));
        }
        return [$item['name'] => ($jsonEncode ? json_encode($newData) : $newData)];
    }

    private function parseObjectData(array $data, array $item, $jsonEncode = false) {
        $newData = [];
        foreach ($item['item_schema'] as $subItem)
            $newData = array_merge($newData, $this->parseItemData($data[$item['name']], $subItem));
        return [$item['name'] => ($jsonEncode ? json_encode($newData) : $newData)];
    }
}
