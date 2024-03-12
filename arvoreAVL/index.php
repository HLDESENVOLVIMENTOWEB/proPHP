<?php

require_once 'AVLTree.php';

$avl = new AVLTree();
$avl->insert(10);
$avl->insert(20);
$avl->insert(30);
$avl->insert(40);
$avl->insert(50);
$avl->insert(25);

echo "Árvore AVL após inserções:\n";
$avl->print();
