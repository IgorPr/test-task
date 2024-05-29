<?php

namespace App\Model\Filter;

use Pimcore\Model\Dao\AbstractDao;
use Pimcore\Model\Exception\NotFoundException;

class Dao extends AbstractDao
{
    protected string $tableName = 'filters';
    private string $filterColorsTableName = 'filter_colors';
    private string $сolorsTableName = 'colors';

    public function getById(?int $id = null): void
    {
        if ($id !== null)  {
            $this->model->setId($id);
        }

        $data = $this->db->fetchAssociative(
            'SELECT * FROM ' . $this->tableName . '
            LEFT JOIN filter_colors ON ' . $this->filterColorsTableName . ' . filter_id = ' . $this->tableName . ' . id
            LEFT JOIN ' . $this->сolorsTableName . ' ON ' . $this->filterColorsTableName . ' . color_id = ' . $this->сolorsTableName . ' . id
            WHERE id = ?', [$this->model->getId()]
        );

        if (!$data) {
            throw new NotFoundException("Object with the ID " . $this->model->getId() . " doesn't exists");
        }

        $this->assignVariablesToModel($data);

        $colors = [];

        foreach ($data as $row) {
            if ($row['color_id']) {
                $colors[] = ['id' => $row['color_id'], 'name' => $row['color_name']];
            }
        }

        $this->model->setColors($colors);
    }

    public function save(): void
    {
        $vars = get_object_vars($this->model);

        $buffer = [];

        $validColumns = $this->getValidTableColumns($this->tableName);

        if (count($vars)) {
            foreach ($vars as $k => $v) {
                if (!in_array($k, $validColumns)) {
                    continue;
                }

                $getter = "get" . ucfirst($k);

                if (!is_callable([$this->model, $getter])) {
                    continue;
                }

                $value = $this->model->$getter();

                if (is_bool($value)) {
                    $value = (int)$value;
                }

                $buffer[$k] = $value;
            }
        }

        if ($this->model->getId() !== null) {
            $this->db->update($this->tableName, $buffer, ["id" => $this->model->getId()]);
        } else {
            $this->db->insert($this->tableName, $buffer);
            $this->model->setId($this->db->lastInsertId());
        }

        if ($this->model->getId() !== null) {
            $this->db->delete('filter_colors', ['filter_id' => $this->model->getId()]);

            foreach ($this->model->getColors() as $color) {
                $this->db->insert($this->filterColorsTableName, [
                    'filter_id' => $this->model->getId(),
                    'color_id' => $color['id'],
                ]);
            }
        }
    }

    public function delete(): void
    {
        $this->db->delete($this->tableName, ["id" => $this->model->getId()]);
        $this->db->delete($this->filterColorsTableName, ["filter_id" => $this->model->getId()]);
    }
}
