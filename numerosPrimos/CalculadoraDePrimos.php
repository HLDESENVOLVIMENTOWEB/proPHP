<?php
class CalculadoraDePrimos {
    private int $fim;
    private array $primos;

    public function __construct(int $fim) {
        $this->fim = $fim;
        $this->primos = array_fill(0, $this->fim + 1, true);
        $this->calcularPrimos();
    }

    private function calcularPrimos(): void {
        
        // 0 e 1 não são primos.

        $this->primos[0] = $this->primos[1] = false; 

        for ($p = 2; $p * $p <= $this->fim; $p++) {
            if ($this->primos[$p]) {
                for ($i = $p * $p; $i <= $this->fim; $i += $p) {
                    $this->primos[$i] = false;
                }
            }
        }
    }

    public function somaPrimos(int $inicio, int $fim): int {
        $soma = 0;
        for ($p = max($inicio, 2); $p <= $fim; $p++) {
            if ($this->primos[$p]) {
                $soma += $p;
            }
        }
        return $soma;
    }
}