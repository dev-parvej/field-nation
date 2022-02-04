<?php

class FieldNation extends ArrayObject
{
    public function __set($name, $value)
    {
        $this[$name] = $value;
    }

    public function __get($name)
    {
        /*
         * We can further check and return an error if we need to
         * For now it seems okay
         */
        return $this[$name];
    }

    public function displayAsTable()
    {
        $headers = '';
        $values = '';
        foreach ($this->getIterator()->getArrayCopy() as $key => $value) {
            $title = ucfirst($key);
            $headers .= "<th>$title</th>";
            $values .= "<td>$value</td>";
        }
        return "<table><thead><tr>$headers</tr></thead><tbody><tr>$values</tr></tbody></table>";
    }
}

$fieldNation = new FieldNation();
$fieldNation->name = 'FieldNation';
$fieldNation->type = 'A software company';
$fieldNation->stability = 'Stable';
$fieldNation->description = 'A very long description';

echo $fieldNation->displayAsTable();