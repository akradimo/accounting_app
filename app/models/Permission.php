<?php

require_once __DIR__ . '/../core/Database.php';

class Permission {
    public static function create($roleId, $module, $access) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            INSERT INTO permissions (role_id, module, access)
            VALUES (:role_id, :module, :access)
        ");
        $stmt->execute([
            'role_id' => $roleId,
            'module' => $module,
            'access' => $access
        ]);

        return $conn->lastInsertId();
    }

    public static function findByRole($roleId) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            SELECT * FROM permissions
            WHERE role_id = :role_id
        ");
        $stmt->execute(['role_id' => $roleId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function update($id, $access) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            UPDATE permissions
            SET access = :access
            WHERE id = :id
        ");
        $stmt->execute([
            'id' => $id,
            'access' => $access
        ]);

        return $stmt->rowCount();
    }

    public static function delete($id) {
        $db = new Database();
        $conn = $db->connect();

        $stmt = $conn->prepare("
            DELETE FROM permissions
            WHERE id = :id
        ");
        $stmt->execute(['id' => $id]);

        return $stmt->rowCount();
    }
}