<?php

require_once __DIR__ . '/../models/Backup.php';

class BackupController {
    public function index() {
        require_once __DIR__ . '/../views/backup/index.php';
    }

    public function create() {
        $backupPath = __DIR__ . '/../../backups/backup_' . date('Y-m-d_H-i-s') . '.sql';
        Backup::createBackup($backupPath);

        header('Location: /accounting_app/public/backup');
        exit();
    }

    public function restore() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $backupFile = $_FILES['backup_file'];
            $backupPath = __DIR__ . '/../../backups/uploaded_backup.sql';

            move_uploaded_file($backupFile['tmp_name'], $backupPath);
            Backup::restoreBackup($backupPath);

            header('Location: /accounting_app/public/backup');
            exit();
        }
    }
}