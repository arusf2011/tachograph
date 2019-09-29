<?php
    $f3=Base::instance();
    session_start();
    require_once './app/functions.php';
    $id = $_SESSION['company_id'];
    $f3->set('result',$db->exec('DELETE FROM companies WHERE id = '.$id));
    $result = $f3->get('result');
    if($result == true)
    {
        unset($_SESSION['company_id']);
        header('Location: ./../delcompany_success');
        exit();
    }
    else
    {
        header('Location: ./companies/1');
        exit();
    }