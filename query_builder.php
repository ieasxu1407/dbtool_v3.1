<?php
declare(strict_types=1);

/**
 * Small allowlist-based SQL query builder.
 * Values are always parameters; identifiers and operators are validated separately.
 */
final class DBTQueryBuilder
{
    private string $driver;
    private array $allowedTables;
    private array $allowedColumns;
    private string $sql = '';
    private array $bindings = [];

    public function __construct(string $driver, array $allowedTables, array $allowedColumns)
    {
        if (!in_array($driver, ['mysql', 'sqlsrv'], true)) {
            throw new InvalidArgumentException('Unsupported driver');
        }
        $this->driver = $driver;
        $this->allowedTables = array_fill_keys($allowedTables, true);
        $this->allowedColumns = array_fill_keys($allowedColumns, true);
    }

    private function identifier(string $name, array $allowlist, string $kind): string
    {
        if (!isset($allowlist[$name]) || !preg_match('/^[A-Za-z_][A-Za-z0-9_$]{0,127}$/D', $name)) {
            throw new InvalidArgumentException('Unrecognized ' . $kind . ' identifier');
        }
        return $this->driver === 'mysql'
            ? '`' . str_replace('`', '``', $name) . '`'
            : '[' . str_replace(']', ']]', $name) . ']';
    }

    private function table(string $name): string
    {
        return $this->identifier($name, $this->allowedTables, 'table');
    }

    private function column(string $name): string
    {
        return $this->identifier($name, $this->allowedColumns, 'column');
    }

    private function operator(string $operator): string
    {
        $operator = strtoupper(trim($operator));
        $allowed = ['=', '!=', '<>', '<', '<=', '>', '>=', 'LIKE', 'NOT LIKE'];
        if (!in_array($operator, $allowed, true)) {
            throw new InvalidArgumentException('Unrecognized query operator');
        }
        return $operator;
    }

    /** Build a SELECT and replace, rather than append to, all previous builder state. */
    public function select(string $table, array $columns, array $where = [], ?string $sortColumn = null, string $sortDirection = 'ASC'): array
    {
        $this->sql = '';
        $this->bindings = [];
        $tableSql = $this->table($table);
        if (!$columns) {
            throw new InvalidArgumentException('At least one column is required');
        }
        $selectColumns = [];
        foreach ($columns as $column) $selectColumns[] = $this->column((string)$column);
        $sql = 'SELECT ' . implode(', ', $selectColumns) . ' FROM ' . $tableSql;
        $conditions = [];
        foreach ($where as $condition) {
            if (!is_array($condition) || count($condition) !== 3) {
                throw new InvalidArgumentException('Invalid WHERE condition');
            }
            [$name, $op, $value] = array_values($condition);
            $conditions[] = $this->column((string)$name) . ' ' . $this->operator((string)$op) . ' ?';
            $this->bindings[] = $value;
        }
        if ($conditions) $sql .= ' WHERE ' . implode(' AND ', $conditions);
        if ($sortColumn !== null) {
            $direction = strtoupper(trim($sortDirection));
            if (!in_array($direction, ['ASC', 'DESC'], true)) {
                throw new InvalidArgumentException('Unrecognized sort direction');
            }
            $sql .= ' ORDER BY ' . $this->column($sortColumn) . ' ' . $direction;
        } elseif (trim($sortDirection) !== '' && strtoupper(trim($sortDirection)) !== 'ASC') {
            throw new InvalidArgumentException('Sort direction requires a recognized sort column');
        }
        $this->sql = $sql;
        return ['sql' => $this->sql, 'bindings' => $this->bindings];
    }
}
