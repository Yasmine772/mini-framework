<?php

namespace Center\MiniFramework\Models;
use Center\MiniFramework\Core\DataBase;
abstract class Model
{
  protected static string $table ='';
  protected array $attributes = [];

  public static function all(): array
  {
      $table = static::$table;
      return DataBase::query("SELECT * FROM $table");
  }
  public static function find(int $id)
  {
      $table = static::$table;
      return DataBase::queryOne("SELECT * FROM $table WHERE id=$id");
  }
  public static function where(string $column, $value): array
  {
      $table = static::$table;
      return Database::query("SELECT * FROM `{$table}` WHERE {$column} = :value", ['value' => $value]);
  }
    public static function create(array $data): int
    {
        $table = static::$table;
        $columns = array_keys($data);
        $placeholders = array_map(fn($col) => ":{$col}", $columns);

        $sql = "INSERT INTO `{$table}` (" . implode(',', $columns) . ") VALUES (" . implode(',', $placeholders) . ")";

        DataBase::execute($sql, $data);

        return DataBase::lastInsertId();
    }


    public static function update(int $id, array $data): int
    {
        $table = static::$table;
        $updateData = [];
        foreach ($data as $key => $value) {
            $updateData[] = "`{$key}` = :{$key}";
        }

        $sql = "UPDATE `{$table}` SET " . implode(',', $updateData) . " WHERE id = :id";

        $data['id'] = $id;

        return Database::execute($sql, $data);
    }

  public static function delete(int $id): bool
  {
      $table = static::$table;
      return Database::execute("DELETE FROM `{$table}` WHERE id = :id", ['id' => $id]);
  }

}