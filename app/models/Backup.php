<?php

require_once __DIR__ . '/../core/Database.php';

class Backup {
    public static function createBackup($backupPath) {
        $db = new Database();
        $conn = $db->connect();

        $tables = $conn->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

        $backupContent = "";
        foreach ($tables as $table) {
            $backupContent .= self::getTableBackup($conn, $table);
        }

        file_put_contents($backupPath, $backupContent);
        return true;
    }

    private static function getTableBackup($conn, $table) {
        $backupContent = "-- Table: $table\n";
        $backupContent .= "DROP TABLE IF EXISTS `$table`;\n";
        $createTable = $conn->query("SHOW CREATE TABLE `$table`")->fetch(PDO::FETCH_ASSOC);
        $backupContent .= $createTable['Create Table'] . ";\n\n";

        $rows = $conn->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($rows)) {
            $backupContent .= "INSERT INTO `$table` VALUES\n";
            $values = [];
            foreach ($rows as $row) {
                $rowValues = array_map(function($value) use ($conn) {
                    return $conn->quote($value);
                }, $row);
                $values[] = "(" . implode(", ", $rowValues) . ")";
            }
            $backupContent .= implode(",\n", $values) . ";\n\n";
        }

        return $backupContent;
    }

    public static function restoreBackup($backupPath) {
        $db = new Database();
        $conn = $db->connect();

        $sql = file_get_contents($backupPath);
        $conn->exec($sql);

        return true;
    }
}