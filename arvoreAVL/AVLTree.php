<?php
class AVLTree {
    private ?Node $root = null;

    private function getHeight(?Node $node): int {
        if ($node === null) {
            return 0;
        }

        return $node->height;
    }

    private function getBalance(?Node $node): int {
        if ($node === null) {
            return 0;
        }

        return $this->getHeight($node->left) - $this->getHeight($node->right);
    }

    private function rightRotate(Node $y): Node {
        $x = $y->left;
        $T2 = $x->right;

        $x->right = $y;
        $y->left = $T2;

        $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;
        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;

        return $x;
    }

    private function leftRotate(Node $x): Node {
        $y = $x->right;
        $T2 = $y->left;

        $y->left = $x;
        $x->right = $T2;

        $x->height = max($this->getHeight($x->left), $this->getHeight($x->right)) + 1;
        $y->height = max($this->getHeight($y->left), $this->getHeight($y->right)) + 1;

        return $y;
    }

    private function insertNode(?Node $node, $value): Node {
        if ($node === null) {
            return new Node($value);
        }

        return $node;
    }

    public function insert($value): void {
        $this->root = $this->insertNode($this->root, $value);
    }

    private function printTree(?Node $node, string $prefix = '', bool $isLeft = true): void {
        if ($node !== null) {
            echo $prefix . ($isLeft ? "|-- " : "\\-- ") . $node->value . "\n";
            $this->printTree($node->left, $prefix . ($isLeft ? "|   " : "    "), true);
            $this->printTree($node->right, $prefix . ($isLeft ? "|   " : "    "), false);
        }
    }

    public function print(): void {
        $this->printTree($this->root);
    }
}
