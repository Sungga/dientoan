<?php
require_once 'App/Controllers/ControllerBase.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controller = new ControllerBase();

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'themSV':
        $controller->themSV();
        break;
    case 'edit':
        $controller->edit($_GET['id']);
        break;
    case 'suaSV':
        $controller->suaSV($_GET['id']);
        break;
    case 'xoaSV': // Thêm hành động xóa
        $controller->xoaSV($_GET['id']);
        break;
    default:
        $controller->index();
        break;
}